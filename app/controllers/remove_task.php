<?php

require_once './connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM tasks WHERE id = $id";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

mysqli_close($conn);



?>