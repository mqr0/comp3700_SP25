<?php
include 'db_connection.php';  // تضمين الاتصال بقاعدة البيانات

// استعلام لاستخراج التقييمات من جدول reviews مع معلومات عن المنتجات
$sql = "SELECT product_name, review_text, rating 
        FROM reviews 
        INNER JOIN products ON reviews.product_id = products.product_id";

// تنفيذ الاستعلام
$result = $conn->query($sql);

// التحقق من وجود نتائج
if ($result === false) {
    // في حال فشل الاستعلام، عرض الخطأ
    echo "خطأ في الاستعلام: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        // عرض النتائج في جدول
        echo "<table class='table table-striped'>";
        echo "<thead class='thead-dark'><tr><th>اسم العطر</th><th>التقييم</th><th>تقييم الخدمة</th></tr></thead>";
        echo "<tbody>";

        // طباعة كل صف من النتائج
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["product_name"] . "</td><td>" . $row["review_text"] . "</td><td>" . $row["rating"] . "</td></tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "لا توجد تقييمات لعرضها."; // إذا لم توجد نتائج
    }
}

$conn->close();
?>
