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
    include_once('./class_Animal.php');
    //include('./class_Edible.php');

    echo ('---- Animals<br>');
    $animals[0] = new Tiger();
    $animals[1] = new Chicken();

    foreach ($animals as $animal) {
        echo $animal->makeSound() . '<br>';
        if ($animal instanceof Chicken) { //Kiểm tra function có tồn tại hay không, nếu có function đó thì in ra
            echo $animal->howtoEat();
        }
    }

    echo ('<br>---- Fruits<br>');
    $fruits[0] = new Apple();
    $fruits[1] = new Orange();

    foreach ($fruits as $fruit) {
        echo $fruit->howtoEat() . '<br>';
    }
    ?>
</body>

</html>