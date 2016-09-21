<?

class Model_Feedback extends Model
{

	
	public function get_data()
	{	
		$DBUser = "mysql";
		$DBPass = "";

		$DB = new mysqli('bjtest', $DBUser, $DBPass,'BJTest');
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
		
		$file_name = md5($files['img']['name']).".jpg"; // hack to avoid coding problems
		if(!move_uploaded_file($files['img']['tmp_name'], 'imgs/'.$file_name)){
			throw new Exception("Erorr move file ".$files['img']['name'], 1);
		}
		
		$tmp_ar = getimagesize("imgs/".$file_name);
		$tmp_ar = explode('"',$tmp_ar[3]); // $tmp_ar[3] - data adbout width and height in string

		$img_width = $tmp_ar[1];
		$img_height = $tmp_ar[3];
		
		if ($img_width>320 || $img_height>240){
			$tmp_img = new Imagick('C:/OpenServer/domains/BJTest/imgs/'.$file_name);
			$tmp_img->adaptiveResizeImage(320, 240);
			
			$f = 'imgs/'.$file_name;
			$file = fopen($f, w);
			if(!fwrite($file,$tmp_img))
				throw new Exception("Erorr write file ".$files['img']['name'], 1);
		}

		$DBUser = "mysql";
		$DBPass = "";
		$DB = new mysqli('bjtest', $DBUser, $DBPass,'BJTest');
		if ($DB->connect_errno) {
			echo "Connection to Database failed";
		}
		$DB->query("
			INSERT INTO `BJTest`.`messages` (
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