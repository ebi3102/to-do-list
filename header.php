<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>To-do list web applictaion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<section>
		<div class="container">
			<div class="jumbotron">
				<h1>Welcome to To-do list Web Application</h1>
				<p>by To-do list app be able manage your tasks.</p>
				<?php
				global $user_login ;
				global $display_name ;
				 if($user_login): ?>
				<p>Welcome <?php echo $display_name; ?></p>
				<div>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="<?php echo LOGOUT_PROCESS ; ?>">logout</a></li>
					</ul>
				</div>
			
			<?php else: ?>

				<div>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="login.php">LogIn</a></li>
						<li><a href="register.php">Register</a></li>
					</ul>
				</div>

			 <?php endif; ?>
			</div>
		</div>
	</section>
	<div class="row">

