<?

class Model_Admin extends Model
{

	
	public function get_data()
	{	
		$DBUser = "mysql";
		$DBPass = "";

		$DB = new mysqli('bjtest', $DBUser, $DBPass,'BJTest');
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
		$DBUser = "mysql";
		$DBPass = "";

		$DB = new mysqli('bjtest', $DBUser, $DBPass,'BJTest');
		if ($DB->connect_errno)
			echo "Connection to Database failed";

		$DB_Id = $_POST["DB_Id"]; 
		$DB->query("UPDATE messages SET AdminCheck=1  WHERE Id=".$DB_Id);
	}

	public function edit(){
		$DBUser = "mysql";
		$DBPass = "";

		$DB = new mysqli('bjtest', $DBUser, $DBPass,'BJTest');
		if ($DB->connect_errno)
			echo "Connection to Database failed";

		$message_text = $_POST["message_text"];
		$DB_Id = $_POST["DB_Id"]; 
		$DB->query("UPDATE messages SET AdminChange=1, message='".$message_text."' WHERE Id=".$DB_Id)
;	}
}