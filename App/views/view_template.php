<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>BJTest</title>

	<!-- Latest compiled and minified bootstrqap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/Assets/css/main.css">
</head>
<body>
	<div class="container">
		
		<header>
			<h1><a href="/" class="submit__button btn btn-lg btn-primary btn-block">BJ Test Task</a></h1>
		
		</header>

		<?php include 'App/views/'.$content_view; ?>

		<footer>
			Test task for BJ company. 2016.
		</footer>

	</div>

	<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
	<!-- Latest compiled and minified bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>