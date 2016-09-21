<!-- <link rel="stylesheet" href="/Assets/css/feedback/style.css"> -->
<div class="messages">
	<?php
		foreach($data as $message)
		{
			echo
			(
		    	'<div class="message_main message col-md-4');
			if($message[AdminChange]==1)
				echo(" changed");
			echo('">
		    		<div class="author_wrap">
						<h2 class="author">
							'.$message[author].'
						</h2>
					</div>
					<h3 class="author_email">'.$message[email].'</h3>
					<textarea readonly class="message_body form-control">'.$message[message].'</textarea>');
					if ($message[img] != "NULL")
						echo ('<img src="/imgs/'.$message[img].'" alt="">');
					echo('<h5 class="creation_time">'.$message[creation_time].'</h5>
				</div>'
			);
		}
	?>
</div>

<div class="create__wrap">
		<h2 class="vreate__message">Leave you message and our admin will think about its publication</h2>
		<form action="/feedback/push" class="message__from" method="post" enctype="multipart/form-data">
			<p class="field_name ">
				<input required type="text" class="nickname form-control" placeholder="Name" name="name">
			</p>

			<p class="field_name">
				<input required type="email" class="email form-control" placeholder="e-mail" name="email">
			</p>

			<p class="field_name">
				<input required type="comment" class="message_text form-control" name="message" placeholder="message">
			</p>

			<p class="image">
				<input  type="file" name="img" accept="image/jpeg, image/png, image/gif" id="image_input" >
			</p>
			
			<a href="#" class="btn btn-lg btn-success preview_btn">Preview</a>
			<input type="submit" class="submit__button btn btn-lg btn-primary " value="Send for moderation">
		</form>	
	</div>