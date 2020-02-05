<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convert number to text</title>
    <style>
        input[type=text] {
            width: 300px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 4px;
            padding: 12px 10px 12px 10px;
        }

        #submit {
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
            background-color: red;
        }
    </style>
</head>

<body>
    <form action="" method='POST'>
        <h2>Convert number to text</h2>
        <input type="text" placeholder='enter a number' name='number'>
        <input type="submit" value="Read" id='submit'>
    </form>
    <?php
    function convert_number_to_words($number)
    {
        $string = "";
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'forty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
        );
        switch ($number) {
            case 0:
                $string = $dictionary[$number];
                break;
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10; //Khai báo số nguyên integer
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if (!empty($units)) {
                    $string .= ' ' . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = (int) ($number / 100);
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if (!empty($remainder)) {
                    $string .= ' and ' . convert_number_to_words($remainder);
                }
                break;
            default:
                $string = "out of ability";
        }
        return $string;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $number = $_POST['number'];
        if ($number < 0 || !is_numeric($number)) {
            echo '<br>';
            echo 'Wrong number';
        } else {
            echo '<br>';
            echo $number . ': ' . ucfirst(convert_number_to_words($number)); //ucfirst(str): Viết hoa chữ cái đầu tiên trong 1 chuỗi
        }
    }
    ?>
</body>

</html>