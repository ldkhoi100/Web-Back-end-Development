<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php include './class_Point3D.php';

    $point2d = new Point2D();
    $point2d->setX(3);
    $point2d->setY(5);

    echo $point2d->toString();

    $point2d->setXY(4, 6);

    echo $point2d->toString();

    echo $point2d->getXY()[0];

    $point3d = new Point3D();
    $point3d->setX(2);
    echo $point3d->toString();
    ?>
</body>

</html>