<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recepter";

$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$Id = $_GET['id'];

$stmt2 = $conn->prepare("DELETE FROM ingredienser WHERE receptID=:Id");
$stmt2->execute(array(':Id' => $Id));

$stmt2 = $conn->prepare("DELETE FROM recept WHERE Id=:Id");
$stmt2->execute(array(':Id' => $Id));

?>