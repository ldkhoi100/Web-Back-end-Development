<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php include './class_Cylinder.php';

    $circle = new Circle(5, 'red');
    echo $circle->toString();
    $circle->setRadius_Color(7, 'blue');
    echo $circle->toString();

    $cylinder = new Cylinder(7, 'blue', 5);
    echo $cylinder->toString();
    ?>
</body>

</html>