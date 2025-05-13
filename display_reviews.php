<?php
// تضمين الاتصال بقاعدة البيانات
include 'db_connection.php';

// استعلام لاستخراج التقييمات من جدول reviews مع معلومات عن المنتجات
$sql = "SELECT product_name, review_text, rating 
        FROM reviews 
        INNER JOIN products ON reviews.product_id = products.product_id";
$result = $conn->query($sql);

// التحقق إذا كانت هناك نتائج
if ($result->num_rows > 0) {
    // عرض النتائج في جدول
    echo "<table class='table table-striped'>";
    echo "<thead class='thead-dark'><tr><th>اسم العطر</th><th>التقييم</th><th>تقييم الخدمة</th></tr></thead>";
    echo "<tbody>";
    
    // طباعة كل صف من البيانات
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["product_name"] . "</td><td>" . $row["review_text"] . "</td><td>" . $row["rating"] . "</td></tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
} else {
    echo "لا توجد تقييمات لعرضها.";
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
