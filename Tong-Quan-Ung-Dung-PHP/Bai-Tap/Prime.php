<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method='POST'>
    <p>Nhập số lượng số nguyên tố cần hiển thị:</p>
    <p><input type="text" name='number' placeholder='number'></p>
    <p><input type="submit" value="Check" name='check'></p>
    </form>
    <?php
        function primeCheck($number){
            if($number == 1){
                return false;
            }
            for($i=2; $i<=sqrt($number); $i++){
                if($number % $i == 0){
                    return false;
                }
            }
            return true;
        }
        if(isset($_POST['check'])){
            $number = $_POST['number'];
            for($i=1 , $j=0 ; $j<$number ; $i++){
                if(primeCheck($i)){
                    $j++;
                    echo $i .' ';
                }
            }
        }
    ?>
</body>
</html>