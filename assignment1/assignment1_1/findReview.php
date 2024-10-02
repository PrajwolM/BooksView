<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reviews</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php include 'layout/header.php'; ?>

    <div class="review-container">
        <div class="back-button">
            <a href="reviewForm.php" class="general_button">&larr; Back</a>
        </div>
        <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'bookreview';

        $conn = mysqli_connect($host, $user, $pass, $db);

        if (!$conn) {
            die('Database Connection Error: ' . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $bookId = filter_input(INPUT_POST, 'book_selection', FILTER_SANITIZE_STRING);

            $sqlQuery = 'SELECT book.title, reviewer.reviewerName, report.rating, report.reviewDate
                         FROM reviewer 
                         JOIN report ON reviewer.reviewerId = report.reviewerId
                         JOIN book ON report.bookId = book.bookId
                         WHERE report.bookId = ?';
            $statement = mysqli_prepare($conn, $sqlQuery);

            if (!$statement) {
                die('SQL Prepare Error: ' . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($statement, "s", $bookId);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);

            if ($result) {
                echo "<h1> ";

                $bookTitleQuery = 'SELECT title FROM book WHERE bookId = ?';
                $bookTitleStmt = mysqli_prepare($conn, $bookTitleQuery);
                mysqli_stmt_bind_param($bookTitleStmt, "s", $bookId);
                mysqli_stmt_execute($bookTitleStmt);
                $bookTitleResult = mysqli_stmt_get_result($bookTitleStmt);
                if ($bookTitleRow = mysqli_fetch_assoc($bookTitleResult)) {
                    echo htmlspecialchars($bookTitleRow['title']);
                }
                mysqli_stmt_close($bookTitleStmt);

                echo " Reviews</h1>";
                echo "<table class='styled-table'>
                        <thead>
                            <tr>
                                <th>Reviewer</th>
                                <th>Rating</th>
                                <th>Review Date</th>
                            </tr>
                        </thead>
                        <tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $formattedDate = date("g:i A, F j, Y", strtotime($row['reviewDate']));
                    echo "<tr>
                            <td>" . htmlspecialchars($row['reviewerName']) . "</td>
                            <td>" . str_repeat('★', $row['rating']) . str_repeat('☆', 5 - $row['rating']) . "</td>
                            <td>" . htmlspecialchars($formattedDate) . "</td>
                          </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<p>No reviews found for this book.</p>";
            }

            mysqli_stmt_close($statement);
            mysqli_close($conn);
        }
        ?>
    </div>

    <?php include 'layout/footer.php'; ?>
</body>

</html>