<?php
$conn = mysqli_connect('localhost', 'root', '', 'bookreview');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$book_id = $_POST['book'];
$reviewer_name = $_POST['reviewer'];
$rating = intval($_POST['rating']);
//take current date
$review_date = date('Y-m-d H:i:s');
$stmt = $conn->prepare("SELECT reviewerId FROM reviewer WHERE reviewerName = ?");
$stmt->bind_param("s", $reviewer_name);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    // Reviewer exists, fetch the existing reviewerId
    $stmt->bind_result($reviewer_id);
    $stmt->fetch();
} else {

    $result = $conn->query("SELECT MAX(reviewerId) AS last_id FROM reviewer");

    if ($result === FALSE) {
        die("Error fetching last reviewer ID: " . $conn->error);
    }

    $row = $result->fetch_assoc();
    $last_id = $row['last_id'];

    if ($last_id) {
        $last_number = intval(substr($last_id, 1));
        $new_number = str_pad($last_number + 1, 3, '0', STR_PAD_LEFT);
        $new_reviewer_id = 'R' . $new_number;
    } else {
        $new_reviewer_id = 'R001';
    }

    $stmt = $conn->prepare("
    INSERT INTO reviewer (reviewerId, reviewerName) 
    VALUES (?, ?)
    ON DUPLICATE KEY UPDATE reviewerId=LAST_INSERT_ID(reviewerId)
");
    $stmt->bind_param("ss", $new_reviewer_id, $reviewer_name);
    if (!$stmt->execute()) {
        die("Error inserting reviewer: " . $stmt->error);
    }
    $reviewer_id = $new_reviewer_id;
    $stmt->close();

}

// Insert review
$stmt = $conn->prepare("INSERT INTO report (bookId, reviewerId, rating, reviewDate) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $book_id, $reviewer_id, $rating, $review_date);
$stmt->execute();
$stmt->close();

echo "Review submitted successfully";

echo '<script>
    setTimeout(function(){
        window.location.href = "reviews.php";
    }, 1000);
</script>';

$conn->close();
?>