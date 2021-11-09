

<html lang='sv'>
<head> 
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>Recepter - recept</title> 
	<link rel='stylesheet' href='style.css'>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<nav class="navbar">
		<div class="navbar_logo">Recepter</div>
		<div class="navbar_container">
				<div class="search">
					<div class="icon"></div>
					<div class="input">
						<input type="text" placeholder="sök" id="mysearch">
					</div>
					<span class="clear" onclick="document.getElementById('mysearch').value = '' "></span>
				</div>
				<ul class="navbar_menu">
					<li class="navbar_btn">
						<a href=recept.php class="button" style="margin: 10px;"> Lägg till </a>
						<a href="recept.html" class="button">Inköpslista</a>
					</li>
				</ul>
				<div class="navbar_toggle" id="mobile-menu">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</div>
		</div>
	</nav>
	<div class=cards>

		<div clas=cards_content>
			<?php 

				for($row['Namn'] = 0; $row['Namn'] < 1000; $row['Namn']++)

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "Recepter";
				$sql = "SELECT * FROM  ";

				$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $conn->query("SELECT * FROM Recept");
				while ($row = $stmt->fetch()) {
					echo $row['Namn']."<br />\n";
				}

			?>
		</div>

	</div>

	<script>
		const menu = document.querySelector('#mobile-menu')
		const menuLinks = document.querySelector('.navbar_menu')
		
		menu.addEventListener('click', function()
		{
			menu.classList.toggle('is-active');
			menuLinks.classList.toggle('active');
		}
		)
		
		const icon = document.querySelector('.icon');
		const search = document.querySelector('.search');
		icon.onclick = function(){
			search.classList.toggle('active')
		}
	</script>
</body> 
</html>
