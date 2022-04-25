<html>
<style>
    body
    {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #04AA6D;
    }

    *
    {
    box-sizing: border-box;

    }



    input[type=text]
    {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;

    }


    hr
    {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    .skickat
    {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 178px;
    opacity: 0.9;

    }

    .skickat:hover
    {
    background-color: white;
    color: black;
    padding: 16px 20px;
    border: #04AA6D solid 1px;
    cursor: pointer;
    width: 178px;
    opacity: 0.9;
    }


    .container
    {
    padding: 50px;
    background-color: white;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 500px;
    }
</style>
<body>

<hr>
 <div class="container">
    <h1 align="center">Registrera</h1>
	<p align="center">Registrera dig här:</p>
		<hr>

	<form method=post>
	<label for="name" style="\text-align:center\"><b>Förnamn</b></label><br>
	<input type=text placeholder="Namn" name=name><br>

	<label for="lastname"style="\text-align:center\"><b>Efternamn</b></label><br>
	<input type=text placeholder=Efternmn name=lastname><br>

	<label for="bithdate"><b>Födelseår</b></label><br>
	<input type=text placeholder="Födelseår"name=birthdate><br>

	<label for="mail"><b>Mail</b></label><br>
	<input type=text placeholder="Mail" name=mail><br>

	<label for="mail2"><b>Upprepa mail</b></label><br>
	<input type=text placeholder="Upprepa mail" name=mail2><br>

	<hr>
	<input type=submit class=skickat name=skickat value='Registrera'>

	</form> 
</div>


</body>
</html>