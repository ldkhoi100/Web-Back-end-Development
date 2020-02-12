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
    $array = [];
    for ($i = 0; $i < 300000; $i++) {
        for ($j = 0; $j < 300000; $j++) {
            $number = rand(1, 100000);
            array_push($array, $number);
        }
    }
    //$result = sort($array);
    // foreach ($array as $value) {
    //     echo $value . ', ';
    // }

    // check how long 2 seconds is...
    echo 'Elapsed time: ' . StopWatch::elapsed() . ' seconds';
    ?>
</body>

</html>