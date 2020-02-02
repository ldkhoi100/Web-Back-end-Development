<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minimum array</title>
    <style>
    form{
        border: 1px solid black;
        width: 500px;
        padding: 15px;
    }
    </style>
</head>
<body>
    <h1 style='color:red;'>Minimum array</h1>
    <?php
    if(isset($_POST['submit'])){
        $number = $_POST['number'];
    }
    ?>
    <form action="" method='POST'>
        <p>Nhập số lượng phần tử cần hiển thị: <input type="text" name='number' value='<?php echo isset($number) ? $number:""; ?>'/></p>
        <input type="submit" value="Kiểm tra" name='submit'>
    </form>
    <br>
    <?php
    if(isset($_POST['submit'])){
        $number = $_POST['number'];
        $array = [];
        for($i = 0 ; $i <= $number ; $i++){
            $numb = rand(1,10);
            array_push($array, $numb);
        }
        $min = null;
        $position = null;
        for($i = 0 ; $i < count($array) ; $i++){
            if($min == null){
                $min = $array[$i];
            }
            else{
                if($min > $array[$i]){
                    $min = $array[$i];
                }
            }
        }
        $total = 0;
        for($i = 1 ; $i < count($array) ; $i++){
            if($array[$i] == $min){
                $position .= $i+1 . ', ';
                $total++;
            }
        }
        echo '<b style="color:blue;"><u>Mảng gồm ' . $number. ' phần tử là: </u></b><br><br>';
        for($i = 1; $i<count($array); $i++){
            echo $array[$i-1];
            echo ', ';
            if($i % 10 === 0){
                echo '<br>';
            }
        }
        echo '<br><br>';
        echo 'Phần tử nhỏ nhất: ' .$min. '<br>';
        echo 'Tại vị trí: ' .rtrim($position, ", "). '<br>';
        echo 'Số lượng của phần tử nhỏ nhất: ' .$total;
    }
        
    ?>
</body>
</html>