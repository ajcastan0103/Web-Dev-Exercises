<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPS530 Lab08a</title>
</head>
<body>
    <?php
    $num1 = $_POST['m'];
    $num2 = $_POST['n'];
    if(($num1 >= 3 and $num1 <= 12) and ($num2 >= 3 and $num2 <= 12)){
        echo "<h1 style='text-align:center;
	font-size: 2.8em;
        font-family: sans-serif;'>$num1 X $num2 Multiplication Table</h1>";
echo "<div style='display:flex;justify-content:center;'>
	<table border =\"1\" 
    style='
    margin: 25px 0;
    font-size: 3.0em;
    font-family: Arial, Helvetica, sans-serif;
    min-width: 400px;
    background-color: white;
    color: black;
    border-radius: 10px;
    border: 1px solid black;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);'>";
	for ($row=1; $row <= $num1; $row++) { 
		echo "<tr style='width:25px;'> \n";
		for ($col=1; $col <= $num2; $col++) { 
		   $p = $col * $row;
		   echo "<td style='width:25px;text-align:center;'>$p</td> \n";
		   	}
	  	    echo "</tr>";
		}
		echo "</table></div>";
    }
    else{
        echo "Both numbers must be between 3 and 12.";
    }
    ?>
</body>
</html>
