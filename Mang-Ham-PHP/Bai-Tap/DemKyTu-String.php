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
        if(isset($_POST['submit'])){
            $str = $_POST['str'];
            $text = $_POST['text'];
        }
    ?>
  <form action="" method='POST'>
    <p>Nhập chuỗi bất kỳ: <input type="text" name='str' value="<?php echo isset($str)?$str:''?>"></p>
    <p>Nhập ký tự cần kiểm tra: <input type="text" name='text' value="<?php echo isset($text)?$text:''?>"></p>
    <input type="submit" value="Kiểm tra" name='submit'>
  </form>
<?php
  if(isset($_POST['submit'])){
    $str = $_POST['str'];
    $text = $_POST['text'];
    $total = 0;
    for($i=0; $i<strlen($str); $i++){
      if($str[$i] == $text){
        $total++;
      }
    }
    echo 'Có ' .$total . ' ký tự trong chuỗi ' .$str;
  }
?>
</body>
</html>