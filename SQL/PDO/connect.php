<?php
$db = 'mysql:host=localhost;dbname=car_shop;charset=utf8';
$user = 'root';
$pass = '';
$charset = 'utf8';
$conn = new PDO($db, $user, $pass);
/** Đặt thuộc tính(Báo cáo lỗi, Ném ngoại lệ) */
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);