<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style> 
        input[type=text] {
            width: 300px;
            font-size: 16px;
            border: 2px solid #ccc; 
            border-radius: 4px;
            padding: 12px 10px 12px 10px;
        }
        #submit{
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h2>Từ điển Anh-Việt</h2>
    <form action="" method='POST'>
        <input type="text" placeholder='Nhập từ cần tìm' name='find'>
        <input type="submit" value="Tìm" id='submit'>
    </form>
    <?php
        $dictionary = array("hello" => "xin chào", "sorry" => "xin lỗi", "bye" => "Tạm biệt", "movie" => "phim", "name" => "tên");
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $find = $_POST['find'];
            $x = 0;
            foreach($dictionary as $key => $value){
                if($find == $key){
                    echo '<br>';
                    echo $value;
                    $x = 1;
                }
            }
            if($x == 0){
                echo '<br>';
                echo 'Không tìm thấy từ cần tra';
            }
        }
    ?>
</body>
</html>