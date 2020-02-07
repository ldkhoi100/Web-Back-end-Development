<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    include "./CircleComparator.php";

    $circleOne = new CircleComparator('circleOne', 8);
    $circleTwo = new CircleComparator('circleTwo', 2);
    $circleThree = new CircleComparator('circleThree', 4);

    $test = $circleOne->compareTo($circleTwo);
    echo ('Comparable: <br>');
    echo $test;
    ?>
</body>

</html>