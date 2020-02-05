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
        $array = array(3,4,2,6,8,9,12,14,17,18,19,23,25,27,29,43,45,67,89,91);
        if(isset($_POST['submit'])){
            $findNumber = $_POST['findNumber'];
        }
    ?>

    <form action="" method='POST'>
        <p>Mảng gồm 20 số nguyên: 
        <?php
            foreach($array as $value){
                echo $value .', ';
            }
        ?></p>
        <p>Tìm số nguyên trong phần tử số: <input type="text" name='findNumber' value='<?php echo isset($findNumber) ? $findNumber:''; ?>'></p>
        <input type="submit" value="Find" name='submit'>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $findNumber = $_POST['findNumber'];
            $bool = 0;
            for($i = 0; $i<count($array); $i++){
                if($findNumber == $i){
                    echo "<br> Giá trị của phần tử có chỉ số $findNumber là " . $array[$i];
                    $bool = 1;
                }
            }
            if($bool == 0){
                echo '<br> Chỉ số vượt quá giới hạn của mảng';
            }
        }
    ?>
</body>
</html>