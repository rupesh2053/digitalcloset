<!DOCTYPE html>
<html>
<head>
	<?php include "styles/bootstrap.php" ?>
</head>
<body>
	<div class = "container">
		<form method = "POST" id = "comment-form" action = "add_comment.php">
		<div class = "form-group">
		<input type="text" name="comment_name" class = "form-control" id = "comment_name" placeholder = "Enter Name">
	</div>

	<div class = "form-group">
		<textarea rows = "7" name="comment_content" class = "form-control" id = "comment_content" placeholder = "Enter Your Comment"></textarea>
	</div>

	<div class = "form-group">
		<input type="hidden" name="comment_id" id = "comment_id" value = "0">
		<input type="submit" name = "submit" id = "submit" class = "btn btn-info" value = "Submit"  style = "padding: 10px 30px">
	</div>
  </form>
  <span id = "comment_message"></span><br>
  <div id = "display_comment"></div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#comment_form').on('submit', function(event){
			event.preventDefault();
			var form_data = $(this).serialize();
			$.ajax({
				url:"add_comment.php",
				method:"POST",
				data:form_data,
				dataType:"JSON",
				success:function(data)
				{
					if(data.error != '')
					{
						$('#comment_form')[0].reset();
						$('#comment_message').html(data.error);
					}
				}
			});
		});
	
	load_comment();
	function load_comment()
	{
		$.ajax({
			url: "fetch_comment.php",
			method: "POST",
			success: function(data)
			{
				$('#display_comment').html(data);

			}
		})
	}

	
});
	
</script>
</body>
</html>