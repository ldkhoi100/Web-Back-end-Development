<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $firstArray = [];
        $secondArray = [];
        $thirdArray = [];

        for($i = 0; $i<10; $i++){
            $number = rand(1, 100);
            array_push($firstArray, $number);
        }
        
        for($i = 0; $i<10; $i++){
            $number = rand(1, 100);
            array_push($secondArray, $number);
        }

        for($i = 0; $i<count($firstArray); $i++){
            array_push($thirdArray, $firstArray[$i]);
        }
        for($i = 0; $i<count($secondArray); $i++){
            array_push($thirdArray, $secondArray[$i]);
        }
        echo 'Mảng số 1 gồm 10 phần tử với số ngẫu nhiên: <br>';
        foreach($firstArray as $value){
            echo $value . ', ';
        }
        echo '<br><br> Mảng số 2 gồm 10 phần tử với số ngẫu nhiên: <br>';
        foreach($secondArray as $value){
            echo $value . ', ';
        }
        echo '<br><br> Mảng số 3 sau khi đã gộp cả 2 mảng trên: <br>';
        foreach($thirdArray as $value){
            echo $value . ', ';
        }
    ?>
</body>
</html>