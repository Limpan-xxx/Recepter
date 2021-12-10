<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Recepter";

$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['skit'];

$delete = mysqli_query($db,"delete from inkopslista where")

?>