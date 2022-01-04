<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Recepter";

$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

$stmt2 = $conn->prepare("DELETE FROM recept WHERE Id=:Id");
$stmt2->execute(array(':Id' => $id));

?>