<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stop Watch</title>
</head>

<body>
    <h2>Stop Watch</h2>
    <?php include 'class_StopWatch.php';

    // start the timer
    StopWatch::start();

    // your script - this is an example
    function SelectionSortAscending($mang)
    {
        // Đếm tổng số phần tử của mảng
        $sophantu = count($mang);

        // Lặp để sắp xếp
        for ($i = 0; $i < $sophantu - 1; $i++) {
            // Tìm vị trí phần tử nhỏ nhất
            $min = $i;
            for ($j = $i + 1; $j < $sophantu; $j++) {
                if ($mang[$j] < $mang[$min]) {
                    $min = $j;
                }
            }

            // Sau khi có vị trí nhỏ nhất thì hoán vị
            // với vị trí thứ $i
            $temp = $mang[$i];
            $mang[$i] = $mang[$min];
            $mang[$min] = $temp;
        }

        // Trả về mảng đã sắp xếp
        return $mang;
    }
    $arr = [4, 7, 12, 5, 9, 10, 34, 57, 82, 52, 35, 78, 42, 56, 67];
    SelectionSortAscending($arr);

    // check how long 2 seconds is...
    echo 'Elapsed time: ' . StopWatch::elapsed() . ' seconds';
    ?>
</body>

</html>