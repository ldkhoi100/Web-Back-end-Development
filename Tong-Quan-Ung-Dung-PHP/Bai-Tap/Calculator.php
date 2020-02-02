<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1->0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
</head>
<body>
    <h2 align='center' style='color:red;'>Simple Calculator</h2>
    <form action="" method='POST'>
    <fieldset>
    <legend>Calculator</legend>
    <table align='center'>
    <tr><td>First operand</td><td><input type="text" placeholder='First Number' name='first'></td></tr>
    <tr><td>Operator</td>
    <td>
    <select name="op">
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="x">x</option>
    <option value="/">/</option>
    </select>
    </td>
    </tr>
    <tr><td>Second operand</td><td><input type="text" placeholder='Second Number' name='second'></td></tr>
    <tr><td></td><td><input type="submit" value="Calculate"></td></tr>
    </table>
    </fieldset>
    </form>
    <?php
    $result ="";
    //Exception try-catch
    class customException extends Exception {
        public function errorMessage() {
            /* error message */
            $errorMsg = 'If you do division, denominator must be different 0';
            return $errorMsg;
        }
    }
    class Calculator{
        var $a;
        var $b;
        function checkopration($oprator){
            switch ($oprator) {
                case '+':
                    return $this->a + $this->b;
                    break;
                case '-':
                    return $this->a - $this->b;
                    break;
                case 'x':
                    return $this->a * $this->b;
                    break;
                case '/':
                        /* trigger exception in a "try" block */
                    if($this->b == 0 || ($this->a == 0 && $this->b == 0)){
                        try {
                        /* If the exception is thrown, this text will not be shown */
                        throw new customException($this->b);
                        return $this->a / $this->b;
                        break;
                        }
                        /* catch exception */
                        catch(customException $e) {
                        echo $e->errorMessage();
                        break;
                        }
                    }                   
                default:
                    return "Sorry No command found";
                    break;
            }
        }
        function getresult($a,$b,$c){
            $this->a = $a;
            $this->b = $b;
            return $this->checkopration($c);
        }
    }
    $cal = new Calculator();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $first = $_POST['first'];
        $second = $_POST['second'];
        $op = $_POST['op'];
        if( $first==null || $second==null || !is_numeric($first) || !is_numeric($second)){
            echo '<div align="center"><b>wrong number</b></div>';
        }
        else{
            $result = $cal->getresult($first,$second,$op);
            echo '<div align="center"><b>'.round($result,4).'</b></div>';
        }
    }
    ?>
</body>
</html>