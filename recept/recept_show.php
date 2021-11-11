<html>

<?php

$id = $_GET["id"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Recepter";
$sql = "SELECT * FROM  ";

$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM Recept WHERE Id=:Id");
$stmt->execute(array(':Id' => $id));
$receptlist = $stmt->fetchAll();

//echo $recept[1];
//var_dump ($receptlist);
$recept = $receptlist[0];
echo $recept["Namn"]." ";


$stmt2 = $conn->prepare("SELECT * FROM ingredienser WHERE receptID=:Id");
$stmt2->execute(array(':Id' => $id));
$ingredienslist = $stmt->fetchAll();

while ($row = $stmt2->fetch())
{
    echo $row["Ingrediens"]." ";
}

?>

</html>