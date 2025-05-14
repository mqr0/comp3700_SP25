<?php
include 'db_connection.php';  // تضمين الاتصال بقاعدة البيانات

// استعلام لاستخراج جميع المنتجات
$sql = "SELECT product_id, product_name FROM products";
$result = $conn->query($sql);

// التحقق من وجود نتائج
if ($result === false) {
    echo "خطأ في الاستعلام: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo "<h2 class='text-center'>منتجاتنا</h2>";
        echo "<ul class='list-group'>";
        
        // عرض جميع المنتجات
        while ($row = $result->fetch_assoc()) {
            // عرض رابط لعرض التقييمات الخاصة بكل منتج
            echo "<li class='list-group-item'>";
            echo "<a href='display_reviews.php?product_id=" . $row["product_id"] . "'>" . $row["product_name"] . "</a>";
            echo "</li>";
        }
        
        echo "</ul>";
    } else {
        echo "لا توجد منتجات لعرضها.";
    }
}

$conn->close();
?>
