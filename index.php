<!DOCTYPE html>
<html lang="en">
<head>
	<title>To-Do-List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
</head>
<body>
	<form action="../controllers/add_task.php" method="GET">
		<h2>My To do List</h2>
		<input type="text" name="name">
		<button type="submit" id="addTaskBtn">Add Task</button>
	</form>


	<script>
	
	$('#addTaskBtn').click(function(){
		const newTask = $('#newTask').val();

		$ajax({
			method:'GET',
			url: './app/controllers/add_task.php',
			data: {name:newTask},
		}).done(
			console.log('added task')
		);
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