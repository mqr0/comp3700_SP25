<?php
include 'db_connection.php'; 


$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;


if ($product_id > 0) {

    $sql = "SELECT products.product_name, reviews.review_text, reviews.rating 
            FROM reviews 
            INNER JOIN products ON reviews.product_id = products.product_id
            WHERE products.product_id = $product_id";


    $result = $conn->query($sql);


    if ($result === false) {
        echo "query error " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
        
            echo "<h2 class='text-center'>private reviews for  ";

     
            $row = $result->fetch_assoc();
            echo $row["product_name"];
            echo "</h2>";
            echo "<table class='table table-striped'>";
            echo "<thead class='thead-dark'><tr><th>Review</th><th>Service Rating</th></tr></thead>";

            echo "<tbody>";

        
            $result->data_seek(0);

  
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["review_text"] . "</td><td>" . $row["rating"] . "</td></tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "there are no reviews for this product.";
        }
    }
} else {
    echo "there is no product selected!";
}

$conn->close();
?>
