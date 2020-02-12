<?php
function isValid($number)
{
    return empty($number) && !is_integer($number);
}
?>

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
        $array = [];
        $max = null;
        $position = null;
        $total = 0;
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
                if ($max == null) {
                    $max = $array[$i][$j];
                } else {
                    if ($max < $array[$i][$j]) {
                        $max = $array[$i][$j];
                    }
                }
            }
        }
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($max == $array[$i][$j]) {
                    $total++;
                    $position .= '[' . $i . ',' . $j . ']' . ', ';
                }
            }
        }
        echo 'Giá trị lớn nhất: ' . $max . '<br>';
        echo 'Số lượng: ' . $total . '<br>';
        echo 'Tại vị trí: ' . rtrim($position, ', ');
    }
    ?>
    <form action="" method='POST'>
        <p>Nhập số dòng: <input type="text" name='rows' value='<?= isset($rows) ? $rows : null; ?>'></p>
        <p>Nhập số cột: <input type="text" name='cols' value='<?= isset($cols) ? $cols : null; ?>'></p>
        <p>Nhập độ dài số ngẫu nhiên:</p>
        <p>Từ số: <input type="text" name='first' value='<?php echo isset($first) ? $first : '1'; ?>'></p>
        <p>Đến số: <input type="text" name='last' value='<?php echo isset($last) ? $last : '100'; ?>'></p>
        <input type="submit" value="Check" name='submit'>
    </form>
</body>

</html>