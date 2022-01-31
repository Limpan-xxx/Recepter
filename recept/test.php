<html>
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


</style>
<body>

<?php

if( ! isset($_POST['test']))
{
	echo "<form method=post>
			<input type=text name=input></input>
			<input type=submit name=test></input>
		</form>";
}




if( isset($_POST['test']))
{
	$input = $_POST['input'];

    for($i = 0; $i < $input; $i++) 
    {?>

    <?php
    $ingrediens = $_POST['ingrediens'.$i];
    $mangd = $_POST['mangd'.$i];
    $unit = $_POST['unit'.$i];
    ?>

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

    <?php } 
}
?>

</body>
</html>