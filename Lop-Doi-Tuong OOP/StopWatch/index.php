<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>[Bài tập] Xây dựng lớp StopWatch</title>
    <link rel="stylesheet" href="style.css">

    <?php require './function.php';
    require './class_StopWatch.php'; ?>
</head>

<body>
    <?php $array = createRandomArray(7777); ?>
    <h3>Original Array</h3>
    <table>
        <tr>
            <?= showArray($array) ?>
        </tr>
    </table>
    <?php
    $stopwatch = new StopWatch();
    // Begin record
    $stopwatch->beginRecord();
    $arraySorted = selectionSort($array);
    // End record
    $stopwatch->endRecord();

    echo '<h3>Sort Array min to max</h3><table><tr>' .
        showArray($arraySorted) .
        '</tr></table><br>';

    $startTime = intval($stopwatch->getBeginTime() / 1000);
    $stopTime = intval($stopwatch->getEndTime() / 1000);

    echo '<br>Start time: ' . date('Y/m/d H:i:s', $startTime);
    echo '<br>Stopped Time: ' . date('Y/m/d H:i:s', $stopTime);
    echo '<br>Milisecond time: ' . $stopwatch->getElapsedTime();

    //var_dump($stopwatch->testMicroTime());
    ?>
</body>

</html>