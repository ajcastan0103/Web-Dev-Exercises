<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .div_morning {
            background-image: url("morning.png");
            background-repeat: no-repeat;
            background-size:100% 100%;
            height: 900px;
            width: auto;  
            color: yellow;
        }
        .div_afternoon {
            background-image: url("afternoon.jpg");
            background-repeat: no-repeat;
            background-size:100% 100%;
            height: 900px;
            width: auto;  
            color: orange;
        }
        .div_evening {
            background-image: url("evening.jpg");
            background-repeat: no-repeat;
            background-size:100% 100%;
            height: 900px;
            width: auto;
            color: blue;  
        }
        .div_night {
            background-image: url("night.jpg");
            background-repeat: no-repeat;
            background-size:100% 100%;
            height: 900px;
            width: auto;    
            color: purple;        
        }
        .div_center {
            font-family: Arial, Helvetica, sans-serif;
            padding: 150px 0;
            text-align: center;
            font-size: 6.0em;
        }
        .div_fixed {
            font-family: Arial, Helvetica, sans-serif;
            opacity: 0.7;
            position: fixed;
            bottom: 0;
            right: 0;
            width: 300px;
            border: 2px solid #000000;
            font-size: 1.5em;
            
        }
        .center {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 2.0em;
        }
    img {
        position: absolute;
        top: 0px;
        right: 0px;
        opacity: 0.5;
    }
    </style>
    <title>Lab08</title>
</head>
<body>
    <h1 style= " font-family: Arial, Helvetica, sans-serif; text-align:center;"> Lab08 </h1>
    <h2 style= " font-family: Arial, Helvetica, sans-serif;"> Q1 </h2>
    <?php

    if(date('G') >= 5 &&  date('G') < 12){
        echo "<div class = 'div_morning'>";
        echo "<h1 class = 'center'>Good Morning!</h1>";
        echo "</div>";
    }
    elseif(date('G') >= 12 &&  date('G') < 18){
        echo "<div class = 'div_afternoon'>";
        echo "<h1 class = 'center'>Good Afternoon!</h1>";
        echo "</div>";
    }
    elseif(date('G') >= 18 &&  date('G') < 22){
        echo "<div class = 'div_evening'>";
        echo "<h1 class = 'div_center'>Good Evening!</h1>";
        echo "</div>";
    }
    else{
        echo "<div class = 'div_night'>";
        echo "<h1 class = 'center'>Good Night!</h1>";
        echo "</div>";
    }
    ?>
    <h1 style= "font-family: Arial, Helvetica, sans-serif;">Q2</h1>
    <h2>Enter two numbers, both between 3 and 12.</h2>
    <form action="lab08table.php" method="post" target="_blank"> 
        m: <input type="number" name="m" >
        n: <input type="number" name="n">
        </br>
        <input type="submit" value="Create mxn table">
    </form>
    <?php
    $counter = 0;
    if(isset($_COOKIE['count'])){
        $counter = $_COOKIE['count'];
        $counter ++;
    }   
    if(isset($_COOKIE['last_visit'])){
    $last_visit = $_COOKIE['last_visit'];
    }   
    setcookie('count', $counter);
    setcookie('last_visit', date("H:i:s"));
    if($counter >= 0){
        echo "<div class = 'div_fixed'>";
        echo "Q3- Times page visited:".$counter;
        echo "</div>";
    }
    ?>
    <h2 style= " font-family: Arial, Helvetica, sans-serif;">Q4</h2>
    <h3 style= " font-family: Arial, Helvetica, sans-serif;"> The gif image is in the top right of the page. </h3>
    <h3 style= " font-family: Arial, Helvetica, sans-serif;"> Enter "?image=filename" to the end of the URL to see or change the image. </h3>
    <h3 style= " font-family: Arial, Helvetica, sans-serif;"> Filenames: pumpkin.gif | vampire.gif | witch.gif </h3>
    <?php
    $image = $_GET['image'];
    echo "<img src = '$image'>";
    ?>
</body>
</html>