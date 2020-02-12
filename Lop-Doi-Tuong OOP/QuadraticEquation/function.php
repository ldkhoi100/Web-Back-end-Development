<?php include './class_QuadraticEquation.php';

// Check value boolen
function checkIsvalid($number)
{
    return is_numeric($number) && $number != null;
}

function Calculator_QuadraticEquation($first, $second, $third)
{
    // Nếu a = 0; b = 0; c = 0. Phương trình vô số ngiệm
    if ($first == 0 && $second == 0 && $third == 0) {
        $result = 'Phương trình vô số ngiệm';
    } 
    // Nếu a = 0; b = 0; c # 0. Phương trình vô nghiệm
    else if ($first == 0 && $second == 0 && $third != 0) {
        $result = 'Phương trình vô ngiệm';
    }
    // Nếu a = 0; b # 0; c # 0. Phương trình có 1 nghiệm duy nhất
    else if ($first == 0 && $second != 0 && $third != 0) {
        $quadratic = new QuadraticEquation($first, $second, $third);
        $delta = $quadratic->getDiscriminant();
        $result = "Phương trình $first(x)^2 + $second(x) + $third có 1 nghiệm duy nhất: <br>" . 'x = ' . $quadratic->getOneRoot();
    }
    // Các trường hợp còn lại
    else if (checkIsvalid($first) && checkIsvalid($second) && checkIsvalid($third)) {
        $quadratic = new QuadraticEquation($first, $second, $third);
        $delta = $quadratic->getDiscriminant();

        if ($delta == 0) { // 1 -8 16
            $result = "Phương trình $first(x)^2 + $second(x) + $third có nghiệm kép: <br>" . 'x1 = x2 = ' . $quadratic->getBothRoot();
        } 
        else if ($delta < 0) {  // 3 2 5
            $result = 'Phương trình vô nghiệm';
        } 
        else { //1 -5 6
            $result = "Phương trình $first(x)^2 + $second(x) + $third có 2 nghiệm: <br>"
                . 'x1 = ' . $quadratic->getRoot1() . '<br>'
                . 'x2 = ' . $quadratic->getRoot2() . '<br>';
        }
    }
    return $result;
}