<?php include_once 'loader.php' ; ?>

<?php get_header() ; ?>
<div class="col-sm-4 center">
<form action="<?php echo LOGIN_PROCESS ; ?>" method="post">
	<label for="email">email:</label>
	<input type="email" name="email" id="email" required>
	<br>

	<label for="password">Password</label>
	<input type="password" name="password" id="password" required>
	<br>

	<input type="submit" name="submit" value="Login">
</form>
</div>

<?php get_footer() ; ?>