<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        tr,
        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $rows = $_POST['rows'];
        $cols = $_POST['cols'];
        $first = $_POST['first'];
        $last = $_POST['last'];
    }
    ?>
    <form action="" method='POST'>
        <p>Nhập số dòng: <input type="text" name='rows' value='<?php echo isset($rows) ? $rows : '10'; ?>'></p>
        <p>Nhập số cột: <input type="text" name='cols' value='<?php echo isset($cols) ? $cols : '10'; ?>'></p>
        <p>Nhập độ dài số ngẫu nhiên:</p>
        <p>Từ số: <input type="text" name='first' value='<?php echo isset($first) ? $first : '1'; ?>'></p>
        <p>Đến số: <input type="text" name='last' value='<?php echo isset($last) ? $last : '100'; ?>'></p>
        <input type="submit" value="Check" name='submit'>
    </form>
    <br>
    <?php
    function checkIsvalid($number)
    {
        return is_numeric($number) && !empty($number);
    }

    if (isset($_POST['submit'])) {
        $rows = $_POST['rows'];
        $cols = $_POST['cols'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $array = [];
        $max = null;
        $position = null;
        $totalMain = 0;
        $totalExtra = 0;
        if (!checkIsvalid($rows) || !checkIsvalid($cols) || !checkIsvalid($first) || !checkIsvalid($last)) {
            echo 'Wrong number';
        } else {
            echo '<table>';
            for ($i = 0; $i < $rows; $i++) {
                echo '<tr>';
                $array[$i] = array();
                for ($j = 0; $j < $cols; $j++) {
                    $number = rand($first, $last);
                    array_push($array[$i], $number);
                    echo '<td>' . $array[$i][$j] . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
            // Max value
            for ($i = 0; $i < $rows; $i++) {
                for ($j = 0; $j < $cols; $j++) {
                    if ($i == $j) {
                        $totalMain += $array[$i][$j];
                    }
                }
            }
            for ($i = 0; $i < $rows; $i++) {
                for ($j = 0; $j < $cols; $j++) {
                    if ($j == $cols - $i - 1) {
                        $totalExtra += $array[$i][$j];
                    }
                }
            }
            echo 'Tổng đường chéo chính: ' . $totalMain . '<br>';
            echo 'Tổng đường chéo phụ: ' . $totalExtra . '<br>';
        }
    }
    ?>
</body>

</html>