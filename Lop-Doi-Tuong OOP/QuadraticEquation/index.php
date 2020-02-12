<?php
include './function.php';

$error[] = null;
$result = null;

if (isset($_POST['result'])) {
    $first = $_POST['first'];
    $second = $_POST['second'];
    $third = $_POST['third'];

    if (!checkIsvalid($first)) {
        try {
            throw new Exception('Hãy nhập đúng số thứ nhất');
        } catch (Exception $e) {
            $error[0] = $e->getMessage();
        }
    }

    if (!checkIsvalid($second)) {
        try {
            throw new Exception('Hãy nhập đúng số thứ hai');
        } catch (Exception $e) {
            $error[1] = $e->getMessage();
        }
    }

    if (!checkIsvalid($third)) {
        try {
            throw new Exception('Hãy nhập đúng số thứ ba');
        } catch (Exception $e) {
            $error[2] = $e->getMessage();
        }
    }
    $result = Calculator_QuadraticEquation($first, $second, $third);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuadraticEquation</title>
</head>

<body>
    <!-- Form nhập số từ người dùng -->
    <form action="" method="POST">
        <p>Nhập số thứ nhất: <input type="text" name="first" id=""
                value="<?php echo isset($first) ? $first : '' ?>"><span><?= $error[0] ?? null ?></span>
        </p>
        <p>Nhập số thứ hai: <input type="text" name="second" id=""
                value="<?php echo isset($second) ? $second : ''; ?>"><span><?= $error[1] ?? null ?></span>
        </p>
        <p>Nhập số thứ ba: <input type="text" name="third" id=""
                value="<?php echo isset($third) ? $third : ''; ?>"><span><?= $error[2] ?? null ?></span>
        </p>
        <input type="submit" value="Kết quả" name='result'>
    </form>

    <!-- Trả về kết quả tính toán -->
    <span><?= isset($result) ? $result : ''; ?></span>
</body>

</html>