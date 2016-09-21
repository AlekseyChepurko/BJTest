<div class="messages">
	<?php
		foreach($data as $message)
		{
			echo
			(
		    	'<div class="admin message col-md-4 ');
		    	if($message[AdminCheck]==0)
		    		echo('unwatched');
		    	else
		    		echo('watched');
		    	echo('">
					<div class="author_wrap">
						<h2 class="author">
							'.$message[author].'
						</h2>
					</div>
					<h3 class="author_email">'.$message[email].'</h3>
					
					<textarea required rows="15" class="message_text form-control" name="message">'
						.$message[message].
					'</textarea>
				
					<img src="/imgs/'.$message[img].'" alt="">
					<h5 class="creation_time">'.$message[creation_time].'</h5>
					');
		    	
		    	if($message[AdminCheck]==0){
		    		echo('
		    			<div class="admin_btn__wrap">
			    			<a class="btn btn-success admin_btn_confirm" DB_Id="'.$message[id].'"> Confirm
				    			<i class="fa fa-check" ></i>
				    		</a>
							
							<a class="btn admin_btn_edit  btn-warning" DB_Id="'.$message[id].'" value="Edit">Save changes 
								<i class="fa fa-pencil"></i>
							</a>

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
		$cur_id = $(this).attr("DB_Id");
		$.post({
			url: "/admin/confirm",
			data: "DB_Id="+$cur_id,
			success: function(data){
				$cur.parent().find(".alert-success").removeClass("hidden");
				$cur.parent().find(".admin_btn_edit").addClass("hidden");
				
			},
			fail: function(err){
				console.log(err);
				$cur.parent().parent().find(".alert-danger").removeClass("hidden");
			}
		});
	});

	$('.admin_btn_edit').click(function(){
		$cur_id = $(this).attr("DB_Id");
		$data = $(this).parent().parent().find(".message_text").val();
		$.post({
			url: "/admin/edit",
			data: "message_text="+$data+"&DB_Id="+$cur_id,
			success: function(data){
				console.log(data);
				
			},
			fail: function(err){
				console.log(err);
				$cur.parent().parent().find(".alert-danger").removeClass("hidden");
			}
		});
	});
</script>