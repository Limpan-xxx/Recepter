<html>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

<body>
    <div class='container'>
    <a href =. type=button id=button>Tillbaka</a>
        <div class='rubrik'>
            <h1>Inköpslista</h1>
        </div>
        <div class='innehall'>
            <div class='ingredienser'>
                <?php

                $ingr  = array();

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Recepter";
    
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt2 = $conn->query("SELECT * FROM inkopslista");
                while ($row = $stmt2->fetch())
                {
                    $found = false;

                    for($i = 0; $i < count($ingr); $i++)
                    {
                        if(strcasecmp($row["Ingrediens"], $ingr[$i][0]) == 0 && $row["Enhet"] == $ingr[$i][1])
                        {
                            $ingr[$i] = array($row["Ingrediens"], $row["Enhet"],$row["Mangd"] + $ingr[$i][2]);
                            $found = true;
                        }
                        
                    }
                    if(!$found)
                    {
                        $ingr[] = array($row["Ingrediens"], $row["Enhet"],$row["Mangd"]);
                    }
                }
                
                for($i = 0; $i < count($ingr); $i++)
                {
                    echo $ingr[$i][0]." ".$ingr[$i][2]." ".$ingr[$i][1]."<button class=tom data-arg1='". $ingr[$i][0]."' data-arg2='".$ingr[$i][1]."'>x</button>"."<p>";
                }
               ?>
            </div>
         </div>
        <?php
            
        ?>
    </div>

    <script>
	
        const buttons = document.getElementsByClassName('tom');

            for(var i = 0; i < buttons.length; i++)
            {
                var button = buttons[i];
                button.addEventListener('click', function(ev)
                {
                    var ingrediens = ev.target.getAttribute('data-arg1');
                    var enhet = ev.target.getAttribute('data-arg2');
                    ev.stopPropagation();
                    ev.preventDefault();
                    $.get("delete_inkopslista.php?ingrediens="+ ingrediens+"&enhet="+enhet, function()
                    {
                        location.reload();
                    }
                    );
                    
                }, false);
            }
    </script>


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
        border-radius: 4px;
    }

    #button:hover
    {
        background-color: #FA8C38;
    }

    .tom
    {
        background-color: none;
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
        color: #fff;
    }

    @media screen and (max-width)
    {
        
    }
</style>

</html>

