<?php include './function.php';
$array = [];
$error[] = null;

if (isset($_POST['submit'])) {
    $rows = (int) ($_POST['rows']);
    $cols = (int) ($_POST['cols']);
    $inputCol = $_POST['inputCol'];

    // Call Function creat and show Matrix
    $creatArr = creatMatrix($array, $rows, $cols);
    $showMatrix = showMatrix($creatArr, $rows, $cols);

    // Try/Catch events
    if (!isValid($rows)) {
        try {
            throw new Exception('Vui lòng nhập số dòng cần hiển thị');
        } catch (Exception $e) {
            $error[0] = $e->getMessage();
        }
    }
    if (!isValid($cols)) {
        try {
            throw new Exception('Vui lòng nhập số cột cần hiển thị');
        } catch (Exception $e) {
            $error[1] = $e->getMessage();
        }
    }
    if (!isValid($inputCol) || $inputCol > $cols) {
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
        <p>Nhập số dòng: <input type="text" name='rows' value='<?php echo isset($rows) ? $rows : '10'; ?>'>
            <span><?= $error[0] ?? '' ?></span>
        </p>
        <p>Nhập số cột: <input type="text" name='cols' value='<?php echo isset($cols) ? $cols : '10'; ?>'>
            <span><?= $error[1] ?? '' ?></span>
        </p>
        <p>Nhập vị trí của cột cần tính tổng: <input type="text" name='inputCol'
                value='<?php echo isset($inputCol) ? $inputCol : '1'; ?>'>
            <span><?= $error[2] ?? '' ?></span>
        </p>
        <input type="submit" value="Check" name='submit'>
    </form>
    <br />

    <!-- Show Matrix -->
    <table>
        <?= isset($showMatrix) ? $showMatrix : '' ?>
    </table>

    <!-- Show Total of Col Matrix -->
    <span><?= (isset($TotalCOLS) && Isvalid($rows) && Isvalid($cols)) ? "<br> Tổng cột $inputCol là: " . $TotalCOLS : '' ?></span>
</body>

</html>