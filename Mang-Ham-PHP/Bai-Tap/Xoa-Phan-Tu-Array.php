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
        Phần tử cho trước:
        <?php
        if (isset($_POST['delete'])) {
            $element = $_POST['element'];
        }
        $array = array(10, 4, 6, 7, 8, 16, 5, 2, 35, 23, 17);
        echo implode(",",$array);
        ?>
        <p>Nhập phần tử cần xóa: <input type="text" value="<?php echo isset($element) ? $element : "" ?>"
                name='element'></p>
        <input type="submit" value="Delete" name='delete'>
    </form>
    <?php
    $array = [10, 4, 6, 7, 8, 16, 5, 2, 35, 23, 17];
    $position = null;
    if (isset($_POST['delete'])) {
        $element = $_POST['element'];
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] == $element) {
                $position = $i;
            }
        }
        for ($i = $position; $i < count($array) - 1; $i++) {
            $array[$i] = $array[$i + 1];
        }
        unset($array[count($array) - 1]); // Xóa phần tử cuối cùng
        echo 'Sau khi xóa phần tử ' . $element . ':<br>';
        echo implode(",",$array);
    }
    ?>
</body>

</html>