<?php
function Isvalid($number)
{
  return empty($number);
}

function totalStr($str, $total, $text)
{
  for ($i = 0; $i < strlen($str); $i++) {
    if ($str[$i] == $text) {
      $total++;
    }
  }
  return $total;
}

$error[] = null;

if (isset($_POST['submit'])) {
  $str = $_POST['str'];
  $text = $_POST['text'];
  $total = 0;
  $number = totalStr($str, $total, $text);
  try {
    if (Isvalid($str)) {
      throw new Exception("Hãy nhập một chuỗi");
    }
  } catch (Exception $e) {
    $error[0] = $e->getMessage();
  }

  try {
    if (Isvalid($text)) {
      throw new Exception("Hãy nhập ký tự cần tìm");
    }
  } catch (Exception $e) {
    $error[1] = $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" method='POST'>
        <p>Nhập chuỗi bất kỳ: <input type="text" name='str'
                value="<?php echo isset($str) ? $str : '' ?>"><span><?= $error[0] ?? null ?></span></p>
        <p>Nhập ký tự cần kiểm tra: <input type="text" name='text'
                value="<?php echo isset($text) ? $text : '' ?>"><span><?= $error[1] ?? null ?></span></p>
        <input type="submit" value="Kiểm tra" name='submit'>
    </form>
    <span><?= (!Isvalid($str) && !Isvalid($text)) ? "Tổng số ký tự {$text} trong chuỗi '{$str}' là: " . $number : ''; ?></span>
</body>

</html>