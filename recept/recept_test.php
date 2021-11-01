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
.skickat
{
	 background-color: #168039;
	 color: white;
	 padding: 16px 20px;
	 border: none;
	 cursor: pointer;
	 width: 178px;
	 opacity: 0.9;

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


</style>
 <div class="container">
    <h1 align="center">Recept</h1>
	<p align="center">Skriv ner Ingredienser:</p>
		<hr>

	<form method=post>

<?php for($i = 1; $i <= 7; $i++) { ?>
	
		<label style="text-align:center"><b>Ingrediens <?= $i ?></b></label><br>
		<input type=text placeholder="Ingrediens" name=<?= "ingrediens".$i ?>>
		<input type=number placeholder="Mängd" id=mangd name=<?= "mangd".$i ?>>
		<select class="custom_select" name=<?= "unit".$i ?>>
			<option value=0>Enhet</option>
			<option value="dl">dl</option>
			<option value="liter">liter</option>
			<option value="kg">kg</option>
			<option value="g">g</option>
			<option value="styck">styck</option>
		</select>
		<br>
<?php }	?>


	<hr>
	<input type=submit class=skickat name=skickat value='Spara'>

	</form> 
</div>

<?php

function saveingrediens($ingrediens, $mangd, $unit)
{
	echo "saving"." ". $ingrediens." ". $mangd." ". $unit;
	echo "<br>";
}

// gör något med x och y endast om man tryckte på knappen
// annars visas bara formuläret

if(isset($_POST['skickat']))
{
	$ok =1;

	// Spara recept

	// för varje Ingrediens
    // spara Ingrediens

for($i = 1; $i <= 7; $i++)
{
	$ingrediens = $_POST['ingrediens'.$i];
	$mangd = $_POST['mangd'.$i];
	$unit = $_POST['unit'.$i];

	if($ingrediens != "")
	{
		saveingrediens($ingrediens, $mangd, $unit);
	}

}	
	

	

}
?>
