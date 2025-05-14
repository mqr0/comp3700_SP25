<?php
include 'db_connection.php';  // تضمين الاتصال بقاعدة البيانات

// الحصول على معرف المنتج من الرابط
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;

// التحقق من أن معرف المنتج صالح
if ($product_id > 0) {
    // استعلام لاستخراج التقييمات الخاصة بالمنتج
    $sql = "SELECT products.product_name, reviews.review_text, reviews.rating 
            FROM reviews 
            INNER JOIN products ON reviews.product_id = products.product_id
            WHERE products.product_id = $product_id";

    $result = $conn->query($sql);

    // التحقق من وجود نتائج
    if ($result === false) {
        echo "خطأ في الاستعلام: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            // عرض نتائج التقييمات في جدول
            echo "<h2 class='text-center'>التقييمات الخاصة بـ " . $row["product_name"] . "</h2>";
            echo "<table class='table table-striped'>";
            echo "<thead class='thead-dark'><tr><th>التقييم</th><th>تقييم الخدمة</th></tr></thead>";
            echo "<tbody>";

            // طباعة كل صف من النتائج
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["review_text"] . "</td><td>" . $row["rating"] . "</td></tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "لا توجد تقييمات لهذا المنتج.";
        }
    }
} else {
    echo "لم يتم تحديد المنتج.";
}

$conn->close();
?>
