<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">

    <title>Document</title>
    <style>
        body{
            max-width: 1100px;
        }
        *{
            font-family: Arial;
            margin: 0 auto;
        }
        .item{

            background-color: palegreen;
            margin: 20px;
            padding: 10px;
            border-radius: 10px;


        }
        .name{
            vertical-align: top;
            width: 20%;
            max-width: 250px;
            display: inline-block;
        }
        .props{
            vertical-align: top;
            width: 57%;
            display: inline-block;
        }
        .price{
            vertical-align: top;
            width: 10%;
            max-width: 150px;
            display: inline-block;
            font-weight: bold ;
            text-align: right;
            font-size: large;
            margin-right: 15px;
        }
        .image{
            width: 10%;
            display: inline-block;
        }
        .bin-button{
            align: right;
            padding: 10px;
            margin: 5px;
            border-radius: 8px;
            border-width: 1px;
            border-color: green;
        }

    </style>
</head>
<body>
<h1>Веб-приложение гр. 609-21з</h1>

    <?php
    echo "<h2>Интернет-магазин</h2>";
    try {
        $conn = new PDO("mysql:host=localhost;dbname=myshop;charset=utf8mb4", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e) {
        echo "Ошибка подключения к БД: " . $e->getMessage(), $e->getCode( );
        die();
    }
    $result = $conn->query("SELECT * FROM items");

    while ($row = $result->fetch()){
?>
        <div class="item">
            <div class="image">
                <img src="images/item.png" width="60px">
            </div>
            <div class="name">
                <?=$row['name']?>
            </div>
            <div class="props">
                <?=$row['properties']?>
            </div>
            <div class="price">
                <?=$row['price']?>
                <i class="fas fa-ad"></i>
                <input type="button" class="bin-button" value="В корзину"/>
            </div>





        </div>
<?php

     }
    ?>


</body>
</html>