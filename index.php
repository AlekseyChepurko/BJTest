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
	// $messages = ;
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

		<div class="message">
			<div class="author">Alex</div>
			<div class="creation_time">11.11.11 00:00</div>
			<div class="author_email">aleks-chep@gmail.com</div>
			<div class="message_body">Hello, my name is Alex</div>
		</div>
	</div>	
</body>
</html>

