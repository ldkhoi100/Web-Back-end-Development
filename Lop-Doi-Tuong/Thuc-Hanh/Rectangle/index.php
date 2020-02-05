<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php include 'classRect.php';
        $rect = new Rectangle(10,20);
        echo $rect->getArea() .'<br>';
        echo $rect->getPerimeter() . '<br>';
        echo $rect->Display() . '<br>';
        $rect->width = 20;
        echo $rect->Display() . '<br>';
    ?>
</body>
</html>