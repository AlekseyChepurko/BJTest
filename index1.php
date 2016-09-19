<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BJ Test</title>
</head>

<? 	
	$DBUser = "mysql";
	$DBPass = "";

	$DB = new mysqli('bjtest', $DBUser, $DBPass,'BJTest');
	if ($DB->connect_errno) {
		echo "Connection to Database failed";
	}

		


	// var_dump($messages);
?>
<body>

	<div class="header__wrap">
		Test task for BJ company
	</div>
	
	<div class="create__wrap">
		<p class="vreate__message">Enter you message and our admin will think its publication</p>
		<form action="enter_message.php" class="message__from">
			<p class="field_name">
				<input required type="text" class="nickname" placeholder="Name">
			</p>

			<p class="field_name">
				<input required type="email" class="email" placeholder="e-mail">
			</p>

			<p class="field_name">
				<input required type="text" class="message" name="message" placeholder="message">
			</p>

			<input type="submit" class="submit__button" value="Enter">
		</form>	
	</div>

	<div class="messages__wrap">
		<div class="messages__head">
			<h1 class="messages__title">Messages</h1>
		</div>
		<?	
			echo $messgaes;
			
			if ($result = $DB->query("SELECT * FROM messages WHERE AdminCheck='1'")) {

				    /* assoc_array extracting */
				    while ($message = $result->fetch_assoc()) {
				        echo(
				        	'<div class="message">
								<div class="author">'.$message[author].'</div>
								<div class="creation_time">'.$message[creation_time].'</div>
								<div class="author_email">'.$message[email].'</div>
								<div class="message_body">'.$message[message].'</div>
							</div>'
						);
				    }

				    /* удаление выборки */
				    $result->free();
				}
		?>
	</div>	
</body>
</html>

