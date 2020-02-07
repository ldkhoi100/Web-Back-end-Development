<?php
function creatArr()
{
    $arr = [];
    for ($i = 0; $i < 100; $i++) {
        $arr[$i] = rand(1, 100);
    }
    return $arr;
}

session_start();

if (!$_SESSION['arr']) {
    $arr = creatArr();
} else {
    $arr = $_SESSION['arr'];
}

$error = null;
$findNumber = null;

try {
    if (isset($_POST['submit'])) {
        $findNumber = (int) ($_POST['findNumber']);

        if ($findNumber < 0 || $findNumber >= 100) {
            throw new Exception('Quá giới hạn chỉ số của mảng');
        }
        if (empty($findNumber)) {
            throw new Exception('Không được để trống');
        }
        if (!is_numeric($findNumber)) {
            throw new Exception('Chỉ số phải là một số nguyên');
        }
    } else {
        $arr = creatArr();
        $_SESSION['arr'] = $arr;
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <fieldset style="width: fit-content;">
        <legend>Find Index</legend>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST'>
            <p>Tìm giá trị của mảng ở vị trí: <input type="text" name='findNumber' value='<?= $findNumber ?? null; ?>'>
            </p>
            <input type="submit" value="Find" name='submit'>
            <p><?= $error ?? '' ?></p>
        </form>
    </fieldset>
    <?php for ($i = 0; $i < count($arr); $i++) : ?>
    <span><?= ($i === $findNumber) ? "<span style='color:yellow;background:red;'>$arr[$i]</span>" : $arr[$i] ?? null ?></span>
    <?php endfor ?>

</body>

</html>