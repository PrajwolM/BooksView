<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'bookreview';
$connection = mysqli_connect($host, $user, $pass, $dbname);

if (!mysqli_select_db($connection, $dbname)) {
    die("Could not open database");
}

$reviewQuery = 'SELECT report.*, book.title, reviewer.reviewerName 
                FROM report
                JOIN book ON report.bookId = book.bookId
                JOIN reviewer ON report.reviewerId = reviewer.reviewerId';

$result = mysqli_query($connection, $reviewQuery);

$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book 101 Reviews</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body class="reviewsPage">
    <?php include 'layout/header.php'; ?>

    <div class="review-container">
        <div class="back-button">
            <a href="reviewForm.php" class="general_button">&larr; Back</a>
        </div>
        <h2>All Reviews</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Reviewer</th>
                    <th>Rating</th>
                    <th>Review Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($review['title']); ?></td>
                        <td><?php echo htmlspecialchars($review['reviewerName']); ?></td>
                        <td><?php echo str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']); ?></td>
                        <td>
                            <?php
                            $date = new DateTime($review['reviewDate']);
                            $formattedDate = $date->format('g:i A, F j, Y');
                            echo $formattedDate;
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include 'layout/footer.php'; ?>
</body>

</html>