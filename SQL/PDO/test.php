<?php
include './connect.php'; ?>

SHOW database<br>

<?php
$id = 1;
$sql = "SELECT * FROM sinhvien WHERE id = 1";
foreach ($conn->query($sql) as $row) {
    echo $row["name"] . '<br>';
}
?>

UPDATE <br>

<?php
$name = "Sánga";
$id = 1;
$sql = "UPDATE sinhvien SET name = :name WHERE id = :id";
$sql = $conn->prepare($sql);
$sql->bindParam(':name', $name, PDO::PARAM_STR);
$sql->bindParam(':id', $id, PDO::PARAM_INT);
//$sql->execute();
?>

INSERT <br>

<?php
$name = "Nam bú cằk";
$phone = 0123456;
$email = "nam@123.com";

$sql = "INSERT INTO sinhvien(name, email, phone) VALUES (:name, :email, :phone)";
$pre = $conn->prepare($sql);
$pre->bindParam(':name', $name, PDO::PARAM_STR);
$pre->bindParam(':email', $email, PDO::PARAM_STR);
$pre->bindParam(':phone', $phone, PDO::PARAM_INT);
//$pre->execute();
?>

DELETE <br>

<?php
$id = 24;
$sql = "DELETE FROM sinhvien WHERE id = :id";
$sql = $conn->prepare($sql);
$sql->bindParam(':id', $id, PDO::PARAM_INT);
$sql->execute();
?>