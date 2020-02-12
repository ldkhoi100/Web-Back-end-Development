<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php include './Cylinder.php';

    $result = null;

    $circle = new Circle(5, 'red');
    $result .= $circle->toString();
    $circle->setRadius_Color(7, 'blue');
    $result .= $circle->toString();

    $cylinder = new Cylinder(7, 'blue', 5);
    $result .= $cylinder->toString();
    ?>
</body>

</html>