<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "perfume_store"; 

// محاولة الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . " - " . $conn->connect_errno);
} 
?>
