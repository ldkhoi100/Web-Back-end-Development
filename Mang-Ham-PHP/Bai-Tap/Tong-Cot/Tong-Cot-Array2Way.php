<?php include './function.php';

session_start();
$array = [];
$error[] = null;
$rows = null;
$cols = null;

if (isset($_GET['reset'])) {
    session_destroy();
    header('location:Tong-Cot-Array2Way.php');
}

if (isset($_POST['submit'])) {
    $_SESSION['row'] = $rows;
    $_SESSION['col'] = $cols;
    $rows = $_SESSION['row'] ?? $_POST['rows'];
    $_SESSION['row'] = $rows;
    $cols = $_SESSION['col'] ?? $_POST['cols'];
    $_SESSION['col'] = $cols;
    $inputCol = $_POST['inputCol'];

    // Call Function creat and show Matrix
    $creatArr = $_SESSION['matrix'] ?? creatMatrix($array, $rows, $cols);
    $_SESSION['matrix'] = $creatArr;
    $showMatrix = showMatrix($creatArr, $rows, $cols);

    // Try/Catch events
    if (!isValid($rows) && is_string($rows)) {
        try {
            throw new Exception('Vui lòng nhập số dòng cần hiển thị');
        } catch (Exception $e) {
            $error[0] = $e->getMessage();
        }
    }
    if (!isValid($cols) && is_string($cols)) {
        try {
            throw new Exception('Vui lòng nhập số cột cần hiển thị');
        } catch (Exception $e) {
            $error[1] = $e->getMessage();
        }
    }
    if (!isValid($inputCol) || $inputCol > $cols && is_string($inputCol)) {
        try {
            throw new Exception('Vui lòng nhập đúng vị trí cột cần tính');
        } catch (Exception $e) {
            $error[2] = $e->getMessage();
        }
    } else {
        // Calculator total of col if user input col is true
        $TotalCOLS = totalColsArray($creatArr, $rows, $inputCol);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>[*Bài tập] Tính tổng các số ở một cột xác định</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Creat form -->
    <form action="" method='POST'>
        <p>Nhập số dòng: <input type="text" name='rows' value='<?= isset($rows) ? $rows : '20'; ?>'>
            <span><?= $error[0] ?? '' ?></span>
        </p>
        <p>Nhập số cột: <input type="text" name='cols' value='<?= isset($cols) ? $cols : '20'; ?>'>
            <span><?= $error[1] ?? '' ?></span>
        </p>
        <p>Nhập vị trí của cột cần tính tổng: <input type="text" name='inputCol'
                value='<?php echo isset($inputCol) ? $inputCol : '1'; ?>'>
            <span><?= $error[2] ?? '' ?></span>
        </p>
        <input type="submit" value="Check" name='submit'>
    </form>
    <a href="<?= "?reset=ok" ?>"><input type="submit" name="reset" value="reset"></a>

    <br />
    <!-- Show Matrix -->
    <div>
        <table align="center">
            <?= isset($showMatrix) ? $showMatrix : '' ?>
        </table>
    </div>

    <!-- Show Total of Col Matrix -->
    <span><?= (isset($TotalCOLS) && Isvalid($rows) && Isvalid($cols)) ? "<br> Tổng cột $inputCol là: " . $TotalCOLS : '' ?></span>
</body>

</html>