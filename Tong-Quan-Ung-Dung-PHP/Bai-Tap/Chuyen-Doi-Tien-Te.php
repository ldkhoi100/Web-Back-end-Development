<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convert Money</title>
</head>
<body>
    <h2 style='color:red;'>Convert Money</h2>
    <form action="" method='POST'>
        <fieldset>
            <legend>Currency conversion</legend>
                <table>
                    <tr><td>Input value money:</td><td><input type="text" name='money' placeholder='$'></td></tr>
                    <tr>
                        <td>Select option:</td>
                        <td><select name="select" id="">
                        <option value="USD">USD->VNĐ</option>
                        <option value="VND">VNĐ->USD</option>
                        </select></td>
                    </tr>
                    <tr><td></td><td>
                        <input type="submit" value="Convert" name='convert'>
                    </td></tr>
                </table>
        </fieldset>
    </form>
    <?php
        class ConvertMoney{
            var $money;
            function ConvertMoney1($select){
                switch($select){
                    case 'USD':
                        return $this->money * 23000 .' VNĐ';
                        break;
                    case 'VND':
                        return round($this->money / 23000,4) .' USD';
                        break;
                    default:
                        return 'Wrong';
                }
            }
            function result($money,$select){
                $this->money = $money;
                return $this->ConvertMoney1($select);
            }
        }
        $result = "";
        $cal = new ConvertMoney();
        if(isset($_POST['convert'])){
            $money = $_POST['money'];
            $select = $_POST['select'];
            if(empty($money) || !is_numeric($money) || $money<0){
                echo 'Error';
            }
            else{
                $result = $cal->result($money,$select);
                echo $result;
            }
        }
    ?>
</body>
</html>