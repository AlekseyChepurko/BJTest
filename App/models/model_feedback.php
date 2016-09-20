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
		if ($cur = $DB->query("SELECT * FROM messages WHERE AdminCheck='1'")) {
		    /* assoc_array extracting */
		    while ($message = $cur->fetch_assoc()) {
		    	array_push($res, $message);
		    }

		    $cur->free();
		}

		return $res;
	}

	public function set_data($message_params)
	{	

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
				`AdminChange`) 

				VALUES 
				(NULL,
				'".$message_params["name"]."',
				CURRENT_TIMESTAMP,
				'".$message_params["email"]."', 
				'".$message_params["message"]."', 
				'NULL', 
				NULL);
			");
		
	}
}