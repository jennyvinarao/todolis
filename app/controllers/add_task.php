<?php

require_once './connection.php';

$name = $_GET['name'];

$sql = "INSERT INTO  tasks(name) VALUES ('$name')";

//mysqli_query function expects 2 arguments. First is the connection to your db variable and the second is your mysql query variable.

$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
	echo 'new task added successfully';
	header("Location: ../views/index.php");
} else {
	echo 'error' . $sql . "<br>" . mysqli_error($conn);
}

//close a previously opened database connection
mysqli_close($conn);



?>