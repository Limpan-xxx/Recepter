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
	 border-radius: 4px;
}

.skickat:hover
{
	 background-color: #FA8C38;
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
	border-radius: 4px;
	transition: 0.4;
}

#button:hover
{
	background-color: #FA8C38;
}

.form_speciall
{
	text-align: center;
}

#input_speciall1
{
	width: 60px;
	height: 40px;
}

#input_speciall2
{
	background-color: #168039;
	color: white;
	padding: 12px 16px;
	cursor: pointer;
	border: none;
	border-radius: 4px;
}

#input_speciall2:hover
{
	background-color: #FA8C38;
}


</style>

<div class="container">
	<a href=. type=button id=button>Tillbaka</a>
	<form autocomplete="off" method=post>
		<input  type=text placeholder="Namn" name=receptnamn id=receptname></input>
		<p align=center>Skriv ner Ingredienser:</p>
			<hr>

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


	// första gången
if(! isset($_POST['kontroll']) && ! isset($_POST['skickat']))
{
	echo "Hur många ingredienser finns det i ditt recept?<br>
		<form autocomplete=off class=form_speciall method=post>
			<input id=input_speciall1 type=number name=input min=1 max=35></input>
			<input id=input_speciall2 type=submit name=kontroll value=✓></input>
		</form>";
}

// andra gången
if( isset($_POST['kontroll']))
{ 
	$input = $_POST['input'];
	?><input type=hidden name=safe_keeper value=<?= $input ?>></input>

	<?php for($i = 1; $i <= $input; $i++) { ?>
			<input autocomplete="off" type=text placeholder="Ingrediens" name=<?= "ingrediens".$i ?>>
			<input autocomplete="off" type=number placeholder=Mängd id=mangd name=<?= "mangd".$i ?>>
			<select class="custom_select"  name=<?= "unit".$i ?>>
				<option value=0>Enhet</option>
				<option value="dl">dl</option>
				<option value="liter">liter</option>
				<option value="kg">kg</option>
				<option value="g">g</option>
				<option value="styck">styck</option>
				<option value="tsk">tsk</option>
				<option value="msk">msk</option>
			</select><br>
	<?php }	?>


		<hr>
		<input type=submit class=skickat name=skickat value='Spara'>
		</form> 
	</div>

	<?php
}
	// gör något med x och y endast om man tryckte på knappen
	// annars visas bara formuläret

// tredje gången
if(isset($_POST['skickat']))
{
	$ok =1;
 	$safe_keeper = $_POST['safe_keeper'];

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

	for($i = 1; $i <= $safe_keeper; $i++)
	{
		
		$ingrediens = $_POST['ingrediens'.$i];
		$mangd = $_POST['mangd'.$i];
		$unit = $_POST['unit'.$i];

		if($ingrediens != "")
		{
			saveingrediens($ingrediens, $mangd, $unit, $rid, $conn);
		}	

	}
	
	?> 
		<script>

			window.location.replace("index.php");

		</script>
<?php
}

?>
