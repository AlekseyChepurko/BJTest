<div class="create__wrap">
		<p class="vreate__message">Enter you message and our admin will think about its publication</p>
		<form action="/feedback/push" class="message__from" method="post">
			<p class="field_name">
				<input required type="text" class="nickname" placeholder="Name" name="name">
			</p>

			<p class="field_name">
				<input required type="email" class="email" placeholder="e-mail" name="email">
			</p>

			<p class="field_name">
				<input required type="text" class="message" name="message" placeholder="message">
			</p>

			<input type="submit" class="submit__button" value="Enter">
		</form>	
	</div>

<?php
	foreach($data as $message)
	{
		echo
		(
	    	'<div class="message">
				<div class="author">'.$message[author].'</div>
				<div class="creation_time">'.$message[creation_time].'</div>
				<div class="author_email">'.$message[email].'</div>
				<div class="message_body">'.$message[message].'</div>
	    		<p></p>
			</div>'
		);
	}
?>