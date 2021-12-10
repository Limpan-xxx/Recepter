<html>
<body>
    <div class='container'>
    <a href =. type=button id=button>Tillbaka</a>
        <div class='rubrik'>
            <h1>Inköpslista</h1>
        </div>
        <div class='innehall'>
            <div class='ingredienser'>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Recepter";
    
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt2 = $conn->query("SELECT * FROM inkopslista");
                while ($row = $stmt2->fetch())
                {
                    echo $row["Ingrediens"]." ".$row["Mangd"]." ".$row["Enhet"]."<a href=delete.php class=tom>x</a>"."<p>";
                }

               ?>
            </div>
         </div>
        <?php
            
        ?>
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
        font-size: 35px;
        background-color: #168039;
        color: #fff;
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

    .tom
    {
        background-color: black;
        margin-left: 7px;
        font-size: 20px;
        color: #168039;
        border: none;
        cursor: pointer;
        text-decoration: none;
        border-radius: 40px;
        transition: 0.4s;
    }

    .tom:hover
    {
        background-color: red;
    }
</style>

</html>

