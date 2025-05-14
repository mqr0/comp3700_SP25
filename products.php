<?php
include 'db_connection.php';  


$sql = "SELECT product_id, product_name FROM products";
$result = $conn->query($sql);


if ($result === false) {
    echo "query error " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo "<h2 class='text-center'>OUR PRODUCTS</h2>";
        echo "<ul class='list-group'>";



        
   
        while ($row = $result->fetch_assoc()) {
        
            echo "<li class='list-group-item'>";
           
            echo "<a href='display_reviews.php?product_id=" . $row["product_id"] . "'>" . $row["product_name"] . "</a>";
            echo "</li>";
        }
        
        echo "</ul>";
    } else {
        echo "there are no products to reveiws";
    }
}

$conn->close();
?>
