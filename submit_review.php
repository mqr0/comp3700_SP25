<?php
include 'db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $perfumeName = $_POST['perfumeName']; 
    $reviewText = $_POST['reviewText']; 
    $serviceRating = $_POST['serviceRating']; 

  
    if (!empty($perfumeName) && !empty($reviewText) && !empty($serviceRating)) {
 
        $sql = "INSERT INTO reviews (product_id, review_text, rating) 
                VALUES ((SELECT product_id FROM products WHERE product_name = '$perfumeName'), '$reviewText', '$serviceRating')";

        if ($conn->query($sql) === TRUE) {
            echo "your review aded successfully!";
        } else {
            echo "error " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "please fill in all fields";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center">Submit Your Review</h2>
        <form action="submit_review.php" method="POST">
            <div class="form-group">
                <label for="perfumeName">Perfume Name:</label>
                <select id="perfumeName" class="form-control" name="perfumeName" required>
                    <option value="">Select perfume</option>
                    <option value="MAYSAM">MAYSAM</option>
                    <option value="MADAR">MADAR</option>
                    <option value="GOLDEN ELIXIR">GOLDEN ELIXIR</option>
                    <option value="WHISPERS OF DAWN">WHISPERS OF DAWN</option>
                </select>
            </div>

            <div class="form-group">
                <label for="reviewText">Your Review:</label>
                <textarea id="reviewText" class="form-control" name="reviewText" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="serviceRating">Service Rating:</label>
                <select id="serviceRating" class="form-control" name="serviceRating" required>
                    <option value="">Select a rating</option>
                    <option value="5/5">5/5</option>
                    <option value="4/5">4/5</option>
                    <option value="3/5">3/5</option>
                    <option value="2/5">2/5</option>
                    <option value="1/5">1/5</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success btn-block">Submit Review</button>
        </form>
    </div>

</body>
</html>
