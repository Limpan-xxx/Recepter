<?php 

	header('Content-Type: text/html; charset=utf-8');

?>

<style>
 body
{
	font-family: Arial, Helvetica, sans-serif;
	background-color: #168039;
}

* 
{
	box-sizing: border-box;

}



input[type=text]
{
	 width: auto;
	 padding: 15px;
	 margin: 5px 0 22px 0;
	 display: inline-block;
	 border: none;
	 background: #f1f1f1;

}

input[type=number]
{
	 width: 90px;
	 padding: 15px;
	 margin: 5px 0 22px 0;
	 display: inline-block;
	 border: none;
	 background: #f1f1f1;


}
#receptname
{
	margin-left: 158px;
	height: 70px;
	width: 400px;
	font-size: 30px;
}
.skickat
{
	 background-color: #168039;
	 color: white;
	 padding: 16px 20px;
	 border: none;
	 cursor: pointer;
	 width: 178px;
}

.skickat:hover
{
	 background-color: #165d80;
	 color: #fff;
	 padding: 16px 20px;
	 cursor: pointer;
	 width: 178px;
	 transition: all 0.3s ease;
}


.container
{
	 padding: 50px;
	 background-color: white;
	 display: block;
	 margin-left: auto;
	 margin-right: auto;
	 margin-top: 30px;
	 margin-bottom: 30px;
	 width: 800px;
}
.custom_select
{
	background-color: #168039;
	color: white;
	padding: 8px 16px;
	cursor: pointer;
}
	#button
{
    background-color: #168039;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	font-size: 14px;
	text-decoration: none;
}


</style>


 <div class="container">
 <a href=. type=button id=button>Tillbaka</a>
 <form method=post>
    <input type=text placeholder="Namn" name=receptnamn id=receptname></input>
	<p align=center>Skriv ner Ingredienser:</p>
		<hr>

<?php for($i = 1; $i <= 7; $i++) { ?>
		<input type=text placeholder="Ingrediens" name=<?= "ingrediens".$i ?>>
		<input type=number placeholder="Mängd" id=mangd name=<?= "mangd".$i ?>>
		<select class="custom_select" name=<?= "unit".$i ?>>
			<option value=0>Enhet</option>
			<option value="dl">dl</option>
			<option value="liter">liter</option>
			<option value="kg">kg</option>
			<option value="g">g</option>
			<option value="styck">styck</option>
		</select><br>
<?php }	?>


	<hr>
	<input type=submit class=skickat name=skickat value='Spara'>
	</form> 
</div>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Recepter";

function saveingrediens($ingrediens, $mangd, $unit, $receptID, $conn)
{		
		$stmt = $conn->prepare("INSERT INTO ingredienser (Ingrediens, Mangd, Enhet, receptID) VALUES (:Ingrediens, :Mangd , :Enhet , :receptID)");
		$stmt->bindParam(':Ingrediens', $ingrediens);
		$stmt->bindParam(':Mangd', $mangd);
		$stmt->bindParam(':Enhet', $unit);
		$stmt->bindParam(':receptID', $receptID);
		$stmt->execute(); 
}

// gör något med x och y endast om man tryckte på knappen
// annars visas bara formuläret

if(isset($_POST['skickat']))
{
	$ok =1;

	$rn = $_POST['receptnamn'];
	$rid = uniqid();
	// Spara recept

	// för varje Ingrediens
    // spara Ingrediens


	
	$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $conn->prepare("INSERT INTO recept (Id, Namn) VALUES (:Id, :Namn)");
	$stmt->bindParam(':Namn', $rn);
	$stmt->bindParam(':Id', $rid);
	$stmt->execute(); 
	


for($i = 1; $i <= 7; $i++)
{
	
	$ingrediens = $_POST['ingrediens'.$i];
	$mangd = $_POST['mangd'.$i];
	$unit = $_POST['unit'.$i];

	if($ingrediens != "")
	{
		saveingrediens($ingrediens, $mangd, $unit, $rid, $conn);
	}

}	
	

	

}
?>