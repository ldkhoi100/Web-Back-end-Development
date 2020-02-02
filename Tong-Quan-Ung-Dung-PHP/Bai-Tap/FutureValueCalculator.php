<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Future Value Calculator</title>
    <style>
        table{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="" method='POST'>
    <!-- Đầu tư lấy lãi -->
    <h2 align='center' style='color:red;'>Investment interest</h2>
    <table align='center'>
    <tr><td>Inventment Amount:</td><td><input type="text" placeholder='USD' name='invest'> USD</td></tr>
    <tr><td>Yearly Interest Rate:</td><td><input type="text" placeholder='%' name='yearrate'> %</td></tr>
    <tr><td>Number of Years:</td><td><input type="text" placeholder='Year' name='year'> Years</td></tr>
    <tr><td></td><td><input type="submit" value="Calculator"></td></tr>
    </table>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $invest = $_POST['invest'];
            $yearrate = $_POST['yearrate'];
            $year = $_POST['year'];
            if(empty($invest)|| empty($yearrate) || empty($year) || !is_numeric($invest) || !is_numeric($yearrate) || !is_numeric($year)){
                echo 'Wrong number';
            }
            else{
            echo '<div align="center">';
            echo 'Số tiền đầu tư: ' .$invest.'<br>';
            echo 'Lãi suất mỗi năm: ' .$yearrate.'%<br>';
            echo 'Số năm đầu tư: ' .$year.'<br>';
            echo '<h3>Tổng tiền vốn lẫn lãi sau ' .$year.' năm: ' .$invest*(1+($yearrate/100))**$year.' USD</h3>';
            echo '</div>';
            }
        }
    ?>
</body>
</html>