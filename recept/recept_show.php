<html>
<body>
    <div class='container'>
    <a href=. type=button id=button>Tillbaka</a>

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
            <div class='ingredienser'>
                <?php
                $stmt2 = $conn->prepare("SELECT * FROM ingredienser WHERE receptID=:Id");
                $stmt2->execute(array(':Id' => $id));
                $ingredienslist = $stmt->fetchAll();

                while ($row = $stmt2->fetch())
                {
                    echo $row["Ingrediens"]." ".$row["Mangd"]." ".$row["Enhet"]."<br>";
                }

               ?>
            </div>
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
        font-size: 25px;
    }

    .ingredienser
    {
        width: auto;
	    padding: 15px;
	    margin: 5px 0 22px 0;
	    display: inline-block;
	    border: none;
	    background: #f1f1f1;

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
        transition: 0.4s;
    }

    #button:hover
    {
        background-color: #FA8C38;
    }
</style>

</html>