<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web</title>
    <!-- Xây dựng một trang web để hiển thị thông tin khách hàng từ một danh sách có sẵn. 
    Tạo trang index.php chứa một danh sách khách hàng gồm tên, ngày sinh, địa chỉ, ảnh. -->
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
        }
        th, td{
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table border="0">
        <caption><h2>Danh sách khách hàng</h2></caption>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Ảnh</th>
        </tr>
    <?php
    $customerlist = array(
    "1" => array("ten" => "Mai Văn Hoàn", 
                "ngaysinh" => "1983-08-20", 
                "diachi" => "Hà Nội", 
                "anh" => "../images/1.jpg"),
    "2" => array("ten" => "Nguyễn Văn Nam", 
                "ngaysinh" => "1983-08-20", 
                "diachi" => "Bắc Giang", 
                "anh" => "../images/1.jpg"),
    "3" => array("ten" => "Nguyễn Thái Hòa", 
                "ngaysinh" => "1983-08-21", 
                "diachi" => "Nam Định", 
                "anh" => "../images/1.jpg"),
    "4" => array("ten" => "Trần Đăng Khoa", 
                "ngaysinh" => "1983-08-22", 
                "diachi" => "Hà Tây", 
                "anh" => "../images/1.jpg"),
    "5" => array("ten" => "Nguyễn Đình Thi", 
                "ngaysinh" => "1983-08-17", 
                "diachi" => "Hà Nội", 
                "anh" => "../images/1.jpg")
    );
    ?>
    <?php
        foreach($customerlist as $key => $value){
            echo "<tr>";
            echo "<td>" .$key. "</td>";
            echo "<td>" .$value['ten']. "</td>";
            echo "<td>" .$value['ngaysinh']. "</td>";
            echo "<td>" .$value['diachi']. "</td>";
            echo "<td><img src='" .$value['anh']. "' width='60px' height='70px'></td>";
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>