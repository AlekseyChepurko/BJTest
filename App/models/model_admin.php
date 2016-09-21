<?

class Model_Admin extends Model
{

	
	public function get_data()
	{	
		$DBUser = "cm92579_mysql";
		$DBPass = "1234";

		$DB = new mysqli('localhost', $DBUser, $DBPass,'cm92579_mysql');
		if ($DB->connect_errno)
			echo "Connection to Database failed";
		$res = array();
		if ($cur = $DB->query("SELECT * FROM messages ORDER BY creation_time DESC")) {
		    /* assoc_array extracting */
		    while ($message = $cur->fetch_assoc()) {
		    	array_push($res, $message);
		    }

		    $cur->free();
		}

		return $res;
	}

	public function confirm()
	{	
		$DBUser = "cm92579_mysql";
		$DBPass = "1234";

		$DB = new mysqli('localhost', $DBUser, $DBPass,'cm92579_mysql');
		if ($DB->connect_errno)
			echo "Connection to Database failed";

		$DB_Id = $_POST["DB_Id"]; 
		var_dump($DB_Id);
		$DB->query("UPDATE messages SET AdminCheck=1  WHERE Id=".$DB_Id);
	}

	public function edit(){
		$DBUser = "cm92579_mysql";
		$DBPass = "1234";

		$DB = new mysqli('localhost', $DBUser, $DBPass,'cm92579_mysql');
		if ($DB->connect_errno)
			echo "Connection to Database failed";

		$message_text = $_POST["message_text"];
		$DB_Id = $_POST["DB_Id"]; 
		$DB->query("UPDATE messages SET AdminChange=1, message='".$message_text."' WHERE Id=".$DB_Id)
;	}
}