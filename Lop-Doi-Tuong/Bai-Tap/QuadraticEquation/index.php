<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuadraticEquation</title>
</head>

<body>
    <?php
    if (isset($_POST['result'])) {
        $first = $_POST['first'];
        $second = $_POST['second'];
        $third = $_POST['third'];
    }
    ?>
    <form action="" method="POST">
        <p>Nhập số thứ nhất: <input type="text" name="first" id="" value="<?php echo isset($first) ? $first : '' ?>"></p>
        <p>Nhập số thứ hai: <input type="text" name="second" id="" value="<?php echo isset($second) ? $second : ''; ?>"></p>
        <p>Nhập số thứ ba: <input type="text" name="third" id="" value="<?php echo isset($third) ? $third : ''; ?>"></p>
        <input type="submit" value="Kết quả" name='result'>
    </form>
    <?php include 'class_QuadraticEquation.php';
    function checkIsvalid($number)
    {
        return is_numeric($number) && !empty($number);
    }

    if (isset($_POST['result'])) {
        $first = $_POST['first'];
        $second = $_POST['second'];
        $third = $_POST['third'];

        if (!checkIsvalid($first) || !checkIsvalid($second) || !checkIsvalid($third)) {
            echo "Error Value";
        } else {
            $quadratic = new QuadraticEquation($first, $second, $third);
            $delta = $quadratic->getDiscriminant();
            if ($delta == 0) { // 1 -8 16
                echo "Phương trình $first(x)^2 + $second(x) + $third có nghiệm kép: <br>";
                echo 'x1 = x2 = ' . $quadratic->getBothRoot();
            } else if ($delta < 0) {  // 3 2 5
                echo 'Phương trình vô nghiệm';
            } else { //1 -5 6
                echo "Phương trình $first(x)^2 + $second(x) + $third có 2 nghiệm: <br>";
                echo 'x1 = ' . $quadratic->getRoot1() . '<br>';
                echo 'x2 = ' . $quadratic->getRoot2() . '<br>';
            }
        }
    }
    ?>
</body>

</html>