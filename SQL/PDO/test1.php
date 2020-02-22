<?php include './connect.php';
$sql = "SELECT * FROM sinhvien";
foreach ($conn->query($sql) as $row) {
    echo $row["name"] . '<br>';
}