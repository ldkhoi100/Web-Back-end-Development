<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php include './Triangle.php';
    include './function.php';

    $result = null;
    $error = null;

    if (isset($_POST['submit'])) {
        $first = $_POST['first'];
        $second = $_POST['second'];
        $third = $_POST['third'];
        $color = $_POST['color'];

        if (!checkIsvalid($first) || !checkIsvalid($second) || !checkIsvalid($third) || $color = null) {
            try {
                throw new Exception("Nhập sai, hãy nhập lại đúng số nguyên dương");
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        } else {
            $triangle = new Triangle($first, $second, $third, $color);
            $result = $triangle->toString();
        }
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
    <!-- Show error -->
    <div><?= isset($error) ? $error : ''; ?></div>
    <!-- Show result -->
    <div><?= isset($result) ? $result : ''; ?></div>
    <!-- Show color -->
    <div class='login' style="background-color: <?= isset($color) ? $color : ''; ?>; height:300px; width:200px;">
    </div>
</body>

</html>