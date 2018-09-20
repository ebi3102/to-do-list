<?php include_once 'loader.php' ; ?>

<?php get_header() ; ?>

<?php
 	if($user_login) :
  ?>

	<section>
		<div class="container">
			<div class="jumbotron">

				<form action='<?php echo INSERT_TASK ; ?>' method="post" class="form-horizontal">

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
			$sql = "SELECT * FROM tasks WHERE user_id = $user_login ";
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

					<form action="<?php echo DELETE_TASK ; ?>" method="post">
						
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
			$conn->close();
			?>



	</section>

<?php else:
	header("location:index.php");
 endif; ?>
<?php get_footer() ; ?>