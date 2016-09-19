<div class="messages">
	<?php
		foreach($data as $message)
		{
			echo
			(
		    	'<div class="message col-md-4 ');
		    	if($message[AdminCheck]==0)
		    		echo('unwatched jumbotron');
		    	echo('">
					<h2 class="author">'.$message[author].'</h2>
					<h3 class="author_email">'.$message[email].'</h3>
					<form class="message_body" id="message">
						<textarea required rows="15" class="message form-control" value="
						">'.$message[message].'</textarea>
					</form>
					<h5 class="creation_time">'.$message[creation_time].'</h5>');
		    	
		    	if($message[AdminCheck]==0){
		    		echo('
		    			<div class="admin_btn__wrap">
			    			<a class="btn admin_btn_confirm" DB_Id="'.$message[id].'"> Confirm
				    			<i class="fa fa-check" ></i>
				    		</a>
			    			
			    			<i class="fa fa-pencil">
								<input type="submit" form="message" class="btn admin_btn_edit" value="Edit">
			    			</i>
				    		
				    		</a>
							<div class="alert alert-success hidden">
							  <strong>Success!</strong>
							</div>
							<div class="alert alert-danger hidden">
							  <strong>Error!</strong>
							</div>
				    	</div>
		    			');
		    	}
				echo('
					</div>');
		}
	?>
</div>

<script>
	$('.admin_btn_confirm').click(function(){
		$cur = $(this);
		$.post({
			url: "/admin/confirm",
			data: "DB_Id="+$cur.attr("DB_Id"),
			success: function(data){
				$cur.parent().find(".alert-success").removeClass("hidden");
				$cur.parent().find(".fa").addClass("hidden");
				
			},
			fail: function(err){
				console.log(err);
				$cur.parent().parent().find(".alert-danger").removeClass("hidden");
			}
		});
	});
</script>