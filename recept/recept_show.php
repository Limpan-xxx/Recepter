<html>
<body>
    <div class='container'>

        <div class='rubrik'>
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
            ?>
            <hr>
        </div>
        <div class='innehall'>
            <?php
            $stmt2 = $conn->prepare("SELECT * FROM ingredienser WHERE receptID=:Id");
            $stmt2->execute(array(':Id' => $id));
            $ingredienslist = $stmt->fetchAll();

            while ($row = $stmt2->fetch())
            {
                echo $row["Ingrediens"]." ";
            }

            ?>
        </div>
    </div>
</body>

<style>
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

    body
    {
        font-family: Arial, Helvetica, sans-serif;
	    background-color: #168039;
    }

    .rubrik
    {
        text-align: center;
        font-size: 30px;
    }

    .innehall
    {
        margin-left: 5px; 
        font-size: 15px;
        
    }
</style>

</html>