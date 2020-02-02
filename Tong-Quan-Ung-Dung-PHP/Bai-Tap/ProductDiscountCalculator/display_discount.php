<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    div{
        text-align: center;
        margin: auto;
    }
    </style>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nameProduct = $_POST['nameProduct'];
            $price = $_POST['price'];
            $percent = $_POST['percent'];
            if($nameProduct==null || $price==null || $percent==null || !is_numeric($price) || !is_numeric($percent)){
                echo 'Wrong number';
            }
            else{
            echo '<div>';
            echo '<h2 style="color: blue;">Product Discount Calculator</h2>';
            echo 'Name Product: ' .$nameProduct.'<br>';
            echo 'Price: ' .$price.'$<br>';
            echo 'Discount Percent: ' .$percent.'%<br>';
            echo 'Discount Amount: ' .$price*($percent/100). '$<br>';
            echo 'Discount Price: ' .($price-($price*($percent/100))) .'$';
            echo '</div>';
            }
        }
    ?>
</body>
</html>