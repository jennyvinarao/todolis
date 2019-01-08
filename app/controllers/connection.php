<?php

$host ="db4free.net";
$username = "jennyvinarao";
$password = "r0se@123";
$dbname = "todolis";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('Connection failed:' . mysqli_error($conn));
}

echo 'connected successfully';


