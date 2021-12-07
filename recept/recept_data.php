<?php

function saveingrediens($ingrediens, $mangd, $unit, $conn)
{		
    $stmt = $conn->prepare("INSERT INTO inkopslista (Ingrediens, Mangd, Enhet) VALUES (:Ingrediens, :Mangd , :Enhet)");
    $stmt->bindParam(':Ingrediens', $ingrediens);
    $stmt->bindParam(':Mangd', $mangd);
    $stmt->bindParam(':Enhet', $unit);
    $stmt->execute(); 
}


$id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Recepter";
$sql = "SELECT * FROM  ";

$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt2 = $conn->prepare("SELECT * FROM ingredienser WHERE receptID=:Id");
$stmt2->execute(array(':Id' => $id));

while ($row = $stmt2->fetch())
{
    echo $row["Ingrediens"]." ".$row["Mangd"]." ".$row["Enhet"]."<br>";
    saveingrediens($row["Ingrediens"], $row["Mangd"], $row["Enhet"], $conn);
}



?>