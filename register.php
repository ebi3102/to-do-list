<?php include_once 'loader.php' ; ?>

<?php get_header() ; ?>

<form action="<?php echo INSERT_USER ?>" method="post">

	<label for='email'>Emali:</label>
	<input type="email" name="email" id="email" placeholder="example@email.com" required>
	<br>

	<label for="firstName">First Name:</label>
	<input type="text" name="firstName" id="firstName" placeholder="John">
	<br>

	<label for="lastName">Last Name:</label>
	<input type="text" name="lastName" id="lastName" placeholder="Mackey">
	<br>

	<label for="password">Password</label>
	<input type="password" name="password" id="password" required>
	<br>

	<input type="submit" name="submit" value="Register">

</form>

<?php get_footer(); ?>


