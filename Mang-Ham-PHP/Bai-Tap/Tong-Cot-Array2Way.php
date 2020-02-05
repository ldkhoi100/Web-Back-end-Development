<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    table{
        border-collapse: collapse;
    }
    tr,td{
        border: 1px solid black;
        text-align: center;
    }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $rows = $_POST['rows'];
            $cols = $_POST['cols'];
            $first = $_POST['first'];
            $last = $_POST['last'];
            $totalcol = $_POST['totalcol'];
        }
    ?>
    <form action="" method='POST'>
    <p>Nhập số dòng: <input type="text" name='rows' value='<?php echo isset($rows) ? $rows:'10'; ?>'></p>
    <p>Nhập số cột: <input type="text" name='cols' value='<?php echo isset($cols) ? $cols:'10'; ?>'></p>
    <p>Nhập độ dài số ngẫu nhiên:</p>
    <p>Từ số: <input type="text" name='first' value='<?php echo isset($first) ? $first:'1'; ?>'></p>
    <p>Đến số: <input type="text" name='last' value='<?php echo isset($last) ? $last:'100'; ?>'></p>
    <p>Nhập cột cần tính tổng: <input type="text" name='totalcol' value='<?php echo isset($totalcol) ? $totalcol:'1'; ?>'></p>
    <input type="submit" value="Check" name='submit'>
    <input type="submit" value="Check2" name='submit2'>
    </form>
    <br>
    <?php
        include '../../../Library/Matrix-2-Way/Creat-Matrix.php';
        include '../../../Library/Matrix-2-Way/Show-Matrix.php';
        include '../../../Library/Matrix-2-Way/Total-1-Col.php';
    ?>
    <?php
        if(isset($_POST['submit'])){
            $rows = $_POST['rows'];
            $cols = $_POST['cols'];
            $first = $_POST['first'];
            $last = $_POST['last'];
            $totalcol = $_POST['totalcol'];

            $creatArr = creatMatrix($array, $rows, $cols);
            echo '<table>';
            $showArr = showMatrix($creatArr, $rows, $cols);
            echo '</table>';
            $TotalCOLS = totalColsArray($creatArr, $rows, $cols, $totalcol);
            echo "<br> Tổng cột $totalcol là: " .$TotalCOLS;
        }        
    ?>
</body>
</html>