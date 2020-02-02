<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Hiển thị các loại hình</h2>
    <form action="" method='POST'>
    <fieldset>
        <legend>Menu</legend>
        <table>
            <tr><td>Length: </td><td><input type="text" name='length' value='5'> units</td></tr>
            <tr><td>Width: </td><td><input type="text" name='width' value='5'> units</td></tr>
            <tr><td colspan='2'>
            <select name="selectMenu" id="">
                <option value="rectangle">Print the rectangle</option>
                <option value="square">Print the square triangle</option>
                <option value="triangle">Print isosceles triangle</option>
            </select>
            </td></tr>
            <tr><td><input type="submit" value="Display" name='display'></td>
                <td><input type="submit" value="Exit" name='exit'></td>
            </tr>
        </table>
    </fieldset>
    </form>
    <?php
    class picture{
        var $length;
        var $width;
        function rectangle(){
            for($i=1; $i<=$this->length; $i++){
                for($j=1; $j<=$this->width; $j++){
                    echo '*&nbsp&nbsp&nbsp&nbsp';
                }
                echo '<br>';
            }
        }

        function triangleBottonLeft(){
            for($i=1; $i<=$this->length; $i++){
                for($j=1; $j<=$i; $j++){
                    echo '*&nbsp';
                }
                echo '<br>';
            }
        }

        function triangleTopLeft(){
            for($i=$this->length; $i>=1; $i--){
                for($j=1; $j<=$i; $j++){
                    echo '*&nbsp';
                }
                echo '<br>';
            }
        }

        function draw($length, $width, $paint){
            $this->length = $length;
            $this->width = $width;

            switch($paint){
                case 'rectangle':
                    return $this->rectangle();
                    break;
                case 'square':
                    return $this->triangleBottonLeft();
                    break;
                case 'triangle':
                    return $this->triangleTopLeft();
                    break;
                default:
                    return 'Wrong';
                    break;
            }
        }
    }

    $result = "";
    $cal = new picture();
    //if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['display'])){
        $length = $_POST['length'];
        $width = $_POST['width'];
        $select = $_POST['selectMenu'];
        if(!is_numeric($length) || !is_numeric($width) || $length==null || $width==null || $length<1 || $width<1){
            echo 'Length: ' .$length . '<br>';
            echo 'Width: ' .$width . '<br>';
            echo 'Wrong information';
        }
        else{
        echo 'Length: ' .$length . '<br>';
        echo 'Width: ' .$width . '<br>';
        $result = $cal->draw($length,$width,$select);
        echo $result;
        }       
    }
    if (isset($_POST['exit'])){
        echo '<script>alert("Bye");
            close();
            </script>';
    }

    ?>
</body>
</html>