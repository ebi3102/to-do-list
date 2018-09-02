<?php include_once 'loader.php' ; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>To-do list web applictaion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="jumbotron">

				<form action='insertDb.php' method="post" class="form-horizontal">

					<div class="form-group">
						<label for="task" class="control-label col-sm-2">write your task:</label>
						<input type="text" name="task" id="task" placeholder="write your task" class="col-sm-10" required><br>
					</div>

					<div class="form-group">
						<label for="date" class="control-label col-sm-2" >Select date:</label>
						<input type="date" name="date" id="date" class="col-sm-4"><br>


						<label for="priority" class="control-label col-sm-3">How the task is importand? </label>
						<select name="priority" id="priority" class="col-sm-3">

							<option value="very-important">Very Important</option>
							<option value="important">Important</option>
							<option value="not-important">Not Important</option>

						</select><br>
					</div>

					<div class="form-group">
						<input type="submit" name="submit" value="submit" class="btn-success btn-lg btn-block">
					</div>

				</form>

			</div>
		</div>
	</section><hr>

	<section style="margin-bottom: 10px;">
		<?php //Task lists ?>
		<?php
			$conn = $conn->dbConnection() ;
			$sql = "SELECT task_id, task_description, task_priority , task_date FROM tasks ";
			$result = $conn->query($sql);


			if( $result->num_rows > 0 )  :
		?>
		<div class="container">
			<div class="table-responsive">          
	  			<table class="table table-hover">
					<tr>
						<th>check</th>
						<th>Priority</th>
						<th>Date</th>
						<th>Task</th>
					</tr>

					<form action="deleteDb.php" method="post">
						
					<?php
						    // output data of each row
						    while($row = $result->fetch_assoc()): ?>

						    	<tr>
						    		<td>				    			
						    			<input type="checkbox" name="tasksCheck[]" id=' <?php echo $row['task_id'] ?> ' value='<?php echo $row['task_id'] ?>'>
						    		</td>
						    		<label for=' <?php echo $row['task_id']; ?> '>
						    			<td>
						    				<?php echo $row['task_date']; ?>
						    			</td>
						    			<td>
						    				<?php echo $row['task_priority']; ?>
						    			</td>
						    			<td>
						    				<?php echo $row['task_description'] ?>
						    			</td>
						    		</label>
						    	</tr>

						    	
						    	<?php endwhile; ?>

				</table>
			<div>
		</div>

		<input type="submit" name="submit" value="Delete" class="btn-success btn-lg btn-block">
		</form>

		<?php
		 	else:
				echo "There is no task";
			endif;
			$conn->close();	 ?>



	</section>



</body>
</html>