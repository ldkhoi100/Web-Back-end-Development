<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php include 'class_Fan.php';
        $fan1 = new Fan();
        $fan1->speed = Fan::FAST;
        $fan1->radius = 10;
        $fan1 ->color = 'Yellow';
        $fan1->status = true;
        echo $fan1->toString();
    ?>
</body>
</html>