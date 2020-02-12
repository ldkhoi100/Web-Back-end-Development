<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php include './MoveablePoint.php';

    $point = new MoveablePoint();
    $point->setXSpeed(5);
    $point->setySpeed(10);

    print_r($point->move());

    echo $point->toString();
    echo '<br>';
    $point->setSpeed(20, 40);

    $point->move();
    echo '<br>';
    echo $point->toString();
    echo '<br>';
    $point->setXSpeed(10);
    $point->move();
    echo $point->toString();
    ?>
</body>

</html>