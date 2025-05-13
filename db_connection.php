<?php
$servername = "localhost"; // اسم السيرفر (عادةً localhost في بيئات التطوير المحلية)
$username = "root"; // اسم المستخدم لقاعدة البيانات (يمكن أن يكون root أو أي اسم آخر حسب الإعدادات لديك)
$password = ""; // كلمة مرور قاعدة البيانات (قد تحتاج إلى تغييرها إذا كان لديك كلمة مرور)
$dbname = "perfume_store"; // اسم قاعدة البيانات التي أنشأتها


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>
