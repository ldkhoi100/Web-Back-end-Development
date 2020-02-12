<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stop Watch</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2 style="color: red;">Stop Watch</h2>
    <?php include './StopWatch.php';
    include './function.php';

    // start the timer
    StopWatch::start();

    $array = createRandomArray(8000);

    $arraySorted = selectionSort($array);
    ?>
</body>

</html>