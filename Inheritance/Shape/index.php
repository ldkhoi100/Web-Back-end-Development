<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shape</title>
</head>
<body>
    <h1>Shape</h1>
    <?php include 'class_Shape.php';

        $circle = new Circle('Circle 01', 3);
        echo 'Circle area: ' . $circle->calculateArea() . '<br />';
        echo 'Circle perimeter: ' . $circle->caculatePerimeter() . '<br />';
        
        $cylinder = new Cylinder('Cylinder 01', 3 , 4);
        echo 'Cylinder area: ' . $cylinder->calculateArea() . '<br />';
        echo 'Cylinder perimeter: ' . $cylinder->caculatePerimeter() . '<br />';
        
        $rectangle = new Rectangle('Rectangle 01', 3 , 4);
        echo 'Rectangle area: ' . $rectangle->calculateArea() . '<br />';
        echo 'Rectangle perimeter: ' . $rectangle->caculatePerimeter() . '<br />';
        
        $square = new Square('Square 01', 4 , 4, 4);
        echo 'Rectangle area: ' . $square->calculateArea() . '<br />';
        echo 'Rectangle perimeter: ' . $square->caculatePerimeter() . '<br />';
    ?>
</body>
</html>