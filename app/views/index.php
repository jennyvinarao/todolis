<!DOCTYPE html>
<html lang="en">
<head>
	<title>To-Do-List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid p-5 m-5">
	<form action="../controllers/add_task.php" method="GET">
		<div class="form-group">
		<h1>My To do List</h1>
		<div class="input-group-prepend input-group-lg">
		<input type="text" name="name">
		<button type="submit" id="addTaskBtn">Add Task</button>
		</div>
		</div>
	</form>
	</div>

	<script>
	
	$("#addTaskBtn").click(function(){
		const newTask = $('#new-task').val();

		$.ajax({
			method:'GET',
			url: '../controllers/add_task.php',
			data: {name : newTask},
		}).done(
			console.log('added task')
		);
	});

	</script>
	<div class="container	py-5 m-5">
	<h2>Task Lists</h2>
	<ul class="list-group" id="taskList">
		<?php
		require_once '../controllers/connection.php';

		$sql = "SELECT * FROM tasks";
		$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_assoc($result)){?>
		
			<li class="list-group-item" data-id="<?php echo $row['id']; ?>">
				<?php echo $row['name'] . " is task number " . $row['id'];?>
				<div class="btn-group" role="group">
				<button class="deleteBtn btn">Delete</button>				
				<button class="doneBtn btn">Done</button>
				</div>		
			</li>
		

		<?php }?>		

	</ul>
	</div>


	<script>
		$('#taskList').on('click', '.deleteBtn', function(){
			const task_id = $(this).parent().attr('data-id');
			console.log(task_id);

			$.ajax({
				method: 'GET',
				url:'../controllers/remove_task.php',
				data: {id: task_id},
			}).done(data => {
				$(this).parent().fadeOut();
			});
		});

	</script>




<!-- 	<div>
		<h2>To-do's</h2>
		<input type="text" name="toDos">
		<button type="submit">Done</button>
		<button type="submit">Update</button>
		<button type="submit">Detete</button>
	</div> -->



</body>
</html>