

<html lang='sv'>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<head> 
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>Recepter</title> 
	<?php
	printf("<link rel='stylesheet' href='style.css?r=%d'>", rand(1,1000));
	?>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<script>
	function recept_add(id){
		$.get( "recept_data.php", function( data ){
			alert(id);
		});
	}
</script>
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
						<a href="inkopslista.php" class="button">Inköpslista</a>
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
		<?php 
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "Recepter";
			$sql = "SELECT * FROM  ";

			$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->query("SELECT * FROM Recept");
			while ($row = $stmt->fetch()) { 		
		?>
			<a class=namn href="recept_show.php?id=<?= $row['Id']?>">
			<div class=cards_content>
				<button class=add data-arg1='<?= $row['Id']?>'>+</button>
				<h2><?= $row['Namn']?></h2>
				<button class=remove data-arg2='<?=$row['Id']?>'>x</button>
			</div>
			</a>
		<?php } ?>
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

<script>
	
	const adders = document.getElementsByClassName('add');

	for(var i = 0; i < adders.length; i++)
	{
		var adder = adders[i];
		adder.addEventListener('click', function(ev)
		{
			var id = ev.target.getAttribute('data-arg1');
			ev.stopPropagation();
			ev.preventDefault();
			alert("Ingredienserna har lagts till i inköpslistan");
			$.get("recept_data.php?id="+ id , function( data ){
			});
		}, false);
	}
</script>

<script>
	
	const buttons = document.getElementsByClassName('remove');

		for(var i = 0; i < buttons.length; i++)
		{
			var button = buttons[i];
			button.addEventListener('click', function(ev)
			{
				var Id = ev.target.getAttribute('data-arg2');
				ev.stopPropagation();
				ev.preventDefault();
				alert("Du har raderat receptet");
				$.get("delete_recept.php?id="+ Id, function()
				{
					location.reload();
				}
				);
				
			}, false);
		}
    </script>

</body> 
</html>

