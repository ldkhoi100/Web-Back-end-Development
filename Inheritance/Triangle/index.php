<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .login {
        height: 180px;
        width: 230px;
        margin: 0;
        padding: 10px;
        border: 1px solid;
    }
    </style>
</head>

<body>
    <?php include 'class_Triangle.php';
    if (isset($_POST['submit'])) {
        $first = $_POST['first'];
        $second = $_POST['second'];
        $third = $_POST['third'];
        $color = $_POST['color'];
    }
    ?>
    <form action="" method="POST">
        <p>Nhập cạnh thứ nhất <input type="text" name="first" value='<?php echo isset($first) ? $first : '10' ?>'> *</p>
        <p>Nhập cạnh thứ hai <input type="text" name="second" value='<?php echo isset($second) ? $second : '10' ?>'> *
        </p>
        <p>Nhập cạnh thứ ba <input type="text" name="third" value='<?php echo isset($third) ? $third : '10' ?>'> * </p>
        <p>Màu sắc <input type="text" name="color" value='<?php echo isset($color) ? $color : 'red' ?>'> *</p>
        <p>* is require</p>
        <input type="submit" value="Tính toán" name='submit'>
    </form>
    <?php
    function checkValue($number)
    {
        return !empty($number) && $number < 0 && is_numeric($number);
    }

    if (isset($_POST['submit'])) {
        $first = $_POST['first'];
        $second = $_POST['second'];
        $third = $_POST['third'];
        $color = $_POST['color'];

        if (checkValue($first) || checkValue($second) || checkValue($third)) {
            echo 'Wrong value';
        } else {
            $triangle = new Triangle($first, $second, $third, $color);
            echo $triangle->toString();
    ?>
    <div class='login' style="background-color: <?php echo $color; ?>;"></div>
    <?php
        }
    }
    ?>
</body>

</html>