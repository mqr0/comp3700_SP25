<?php
include 'db_connection.php';  // Include the database connection

// Check if the product is specified
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Query to retrieve reviews from the reviews table with product information
    $sql = "SELECT products.product_name, reviews.review_text, reviews.rating 
            FROM reviews 
            INNER JOIN products ON reviews.product_id = products.product_id 
            WHERE products.product_id = $product_id";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result) {
        if ($result->num_rows > 0) {
            // Display results in a table
            echo "<table class='table table-striped'>";
            echo "<thead class='thead-dark'><tr><th>Perfume Name</th><th>Review</th><th>Service Rating</th></tr></thead>";
            echo "<tbody>";

            // Print each row of the results
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["product_name"] . "</td><td>" . $row["review_text"] . "</td><td>" . $row["rating"] . "</td></tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No reviews available."; // If no results are found
        }
    } else {
        // Print error details if query fails
        echo "Query error: " . $conn->error;
    }
} else {
    echo "No product specified.";
}

$conn->close();
?>
