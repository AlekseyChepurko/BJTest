<?

class Model_Feedback extends Model
{

	
	public function get_data()
	{	
		$DBUser = "cm92579_mysql";
		$DBPass = "1234";

		$DB = new mysqli('localhost', $DBUser, $DBPass,'cm92579_mysql');
		if ($DB->connect_errno)
			echo "Connection to Database failed";

		$res = array();
		if ($cur = $DB->query("SELECT * FROM messages WHERE AdminCheck='1' ORDER BY creation_time DESC")) {
		    /* assoc_array extracting */
		    while ($message = $cur->fetch_assoc()) {
		    	array_push($res, $message);
		    }

		    $cur->free();
		}

		return $res;
	}

	public function set_data($message_params, $files)
	{	

		$exploded_file_name = explode(".",$files['img']['name']);
		$file_ext = end($exploded_file_name); 
		$file_name = "NULL";

		if (!empty($files['img']['name']))
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime = finfo_file($finfo, $files['img']['tmp_name']);
			if ($mime == "image/gif" || $mime == "image/jpeg" || $mime == "image/png")
			{

				$file_name = md5($files['img']['name']).".".$file_ext; // hack to avoid coding problems
					if(!move_uploaded_file($files['img']['tmp_name'], 'imgs/'.$file_name)){
						throw new Exception("Erorr move file ".$files['img']['name'], 1);
					}
					
					$tmp_ar = getimagesize("imgs/".$file_name);
					$tmp_ar = explode('"',$tmp_ar[3]); // $tmp_ar[3] - data adbout width and height in string
		
					$img_width = $tmp_ar[1];
					$img_height = $tmp_ar[3];
					
					unset($tmp_ar);

					if ($img_width>320 || $img_height>240){

						if($file_ext != "gif"){
							$tmp_img = new Imagick('http://'.$_SERVER[SERVER_NAME].'/imgs/'.$file_name);
							if($img_width>320)
								$tmp_img->adaptiveResizeImage(320,0);
							if($tmp_img->getimageHeight()>240) // compare with new height
								$tmp_img->adaptiveResizeImage(0, 240);	
								
							$f = 'imgs/'.$file_name;
							$file = fopen($f, w);
							if(!fwrite($file,$tmp_img))
								throw new Exception("Erorr write file ".$files['img']['name'], 1);
						}
						else{
							$tmp_img = new Imagick($_SERVER['DOCUMENT_ROOT'].'/imgs/'.$file_name);
							$tmp_img = $tmp_img->coalesceImages();

							foreach ($tmp_img as $frame) {
								if($img_width>320)
									$frame->adaptiveResizeImage(320,0);
								if($frame->getimageHeight()>240) // compare with new height
									$frame->adaptiveResizeImage(0, 240);
								}
							
							$tmp_img->writeImages($_SERVER['DOCUMENT_ROOT'].'/imgs/'.$file_name, true);

						}
					}
			}

		$DBUser = "cm92579_mysql";
		$DBPass = "1234";

		$DB = new mysqli('localhost', $DBUser, $DBPass,'cm92579_mysql');
		if ($DB->connect_errno)
			echo "Connection to Database failed";
		$DB->query("
			INSERT INTO `messages` (
				`id`, 
				`author`, 
				`creation_time`, 
				`email`, 
				`message`, 
				`AdminCheck`, 
				`AdminChange`,
				`img`) 

				VALUES 
				(NULL,
				'".$message_params["name"]."',
				CURRENT_TIMESTAMP,
				'".$message_params["email"]."', 
				'".$message_params["message"]."', 
				NULL, 
				NULL,
				'".$file_name."');
			");
		
		
	}
}