<?php
include('connect.php');
?>
Bài tập 1 <br>
<?php
$sql = "SELECT * FROM sinhvien";
foreach ($conn->query($sql) as $row) {
    echo $row["id"] . '<br>';
    echo $row["name"] . '<br>';
    echo $row["phone"] . '<br>';
}
?>

<hr>

Bài tập 2 <br>
<?php //Đổi dữ liệu có truyền tham số
$id = 2;
$sql = "SELECT * FROM sinhvien WHERE id = " . $conn->quote($id);
foreach ($conn->query($sql) as $row) {
    echo $row["name"];
}
?>

<hr>

<?php
$id = 1;
$sql = "SELECT * FROM sinhvien WHERE id = :id";
$pre = $conn->prepare($sql); // Chuẩn bị câu truy vấn
$pre->bindParam(':id', $id, PDO::PARAM_INT); // Tạo tham số và gán kiểu dữ liệu cho tham số, Xác định nó là kiểu gì
$pre->execute(); //Thực hiện câu truy vấn
//Đổ dữ liệu kiểu fetch assoc
while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
    echo $row["name"];
}
?>

<hr>

INSERT dữ liệu vào database <br>
<?php
$hoten = "tiến óc chóa";
$sql = "INSERT INTO sinhvien(name) VALUES (:hoten)";
$pre = $conn->prepare($sql);
$pre->bindParam(':hoten', $hoten, PDO::PARAM_STR);
//$pre->execute();
?>

<hr>

<?php
$name = "Phan văn đức";
$email = "nam@gmail.com";
$phone = "02938456";
$sql = "INSERT INTO sinhvien(name, email, phone) VALUES (:name, :email, :phone)";
$pre = $conn->prepare($sql);
$pre->bindParam(':name', $name, PDO::PARAM_STR);
$pre->bindParam(':email', $email, PDO::PARAM_STR);
$pre->bindParam(':phone', $phone, PDO::PARAM_INT);
//$pre->execute();
//lastInsertId: Lấy dòng vừa thêm vào nằm ở dòng số mấy
echo "Dòng vừa thêm vào là: " . $conn->lastInsertId();
?>

<hr>
DELETE 1 dòng <br>
<?php
$id = 3;
$sql = "DELETE FROM sinhvien WHERE id = :id";
$pre = $conn->prepare($sql);
$pre->bindParam(':id', $id, PDO::PARAM_INT);
//$pre->execute();
?>

<hr>

Update 1 Dòng trống database <br>

<?php
$changename = "Vu Quoc tuan";
$sql = "UPDATE sinhvien SET name = :changename WHERE id = 1";
$pre = $conn->prepare($sql);
$pre->bindParam(':changename', $changename, PDO::PARAM_STR);
//$pre->execute();
$count = $pre->rowCount(); //Đếm số dòng vừa thực hiện câu truy vấn
echo "Bạn vừa thực hiện câu truy vấn với số dòng là " . $count;
?>

<hr>
Truy vấn dữ liệu cách 3 <br>
<?php
$sql = "SELECT * FROM sinhvien";
$pre = $conn->prepare($sql);
$pre->execute();
while ($row = $pre->fetch(PDO::FETCH_OBJ)) {
    echo $row->name . '<br>';
}
?>

<hr>
Insert nhiều tham số <br>

<?php
$name = "Tèo Tí Tủn";
$email = "teotitun@gmail.com";
$phone = "114";
$sql = "INSERT INTO sinhvien(name,email,phone) VALUES(:name, :email, :phone)";
$pre = $conn->prepare($sql);
$pre->bindParam(':name', $name, PDO::PARAM_STR);
$pre->bindParam(':email', $email, PDO::PARAM_STR);
$pre->bindParam(':phone', $phone, PDO::PARAM_INT);
//$pre->execute();
?>

<hr>
Cách 2
<?php
$sql = "INSERT INTO sinhvien(name,email,phone) VALUES(?,?,?)";
$pre = $conn->prepare($sql);
$sv = array('Tien', 'dau@gmail.com', 115);
//$pre->execute($sv);
?>

Đếm số dòng trong 1 bảng <br>

<?php
$sql = "SELECT COUNT(id) FROM sinhvien";
$pre = $conn->prepare($sql);
$result = $pre->execute();
$connt = $pre->fetchColumn();
echo "Tổng số dòng trong bảng sinh viên là: " . $count;
?>