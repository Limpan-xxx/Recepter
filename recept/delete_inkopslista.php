<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Recepter";

$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$ingrediens = $_GET['ingrediens'];
$enhet = $_GET['enhet'];

$stmt2 = $conn->prepare("DELETE FROM inkopslista WHERE Ingrediens=:ingrediens AND Enhet=:enhet");
$stmt2->execute(array(':ingrediens' => $ingrediens, ':enhet' => $enhet));

?>