<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Review of Specific book</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php include 'layout/header.php' ?>
    <div class="review-container">
        <form method="POST" action="findReview.php">
            <div class="form-group">
                <label for="book_selector">Select Book: </label>
                <select name="book_selection" id="book_selector">
                    <?php
                    $dbname = 'bookreview';
                    $conn = new mysqli('localhost', 'root', '', $dbname);

                    if (!mysqli_select_db($conn, $dbname))
                        die("Could not open database");

                    $booksQuery = "SELECT bookId, title FROM book";
                    $result = mysqli_query($conn, $booksQuery);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['bookId'] . "'>" . $row['title'] . "</option>";
                    }

                    $conn->close();
                    ?>
                </select>
                <input type="submit" value="Find Reviews" class="general_button">
            </div>
            <button type="button" id="showAll" class="general_button">
                Show All Reviews
            </button>
        </form>

        <!-- Button to open the modal -->
        <div>
            <button class="general_button" id="openModalBtn">Add review</button>

        </div>

        <div id="myModal" class="modal">

            <div class="modal-content">

                <span class="close">&times;</span>
                <h2>Add Review</h2>
                <form method="POST" action="addReview.php" id="modalForm">

                    <div class="modal-form">
                        <label for="book">Book:</label>
                        <select name="book" id="book">
                            <?php
                            $dbname = 'bookreview';
                            $conn = new mysqli('localhost', 'root', '', $dbname);

                            if (!mysqli_select_db($conn, $dbname))
                                die("Could not open database");

                            $booksQuery = "SELECT bookId, title FROM book";
                            $result = mysqli_query($conn, $booksQuery);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['bookId'] . "'>" . $row['title'] . "</option>";
                            }

                            $conn->close();
                            ?>
                        </select><br><br>
                    </div>
                    <div class="modal-form">

                        <label for="reviewer">Name:</label>
                        <input type="text" name="reviewer" id="reviewer" required><br><br>
                    </div>
                    <div class="modal-form">

                        <label for="rating">Rating:</label>
                        <select name="rating" id="rating" required>
                            <option value="" disabled selected>Select a rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select><br><br>

                    </div>
                    <div class="modal-form">

                    </div>
                    <button type="submit" class="general_button">Submit Review</button>

                </form>
            </div>
        </div>
    </div>
    <script src="./scripts/modal.js"></script>

    <?php include 'layout/footer.php' ?>
    <script> document
            .getElementById("showAll")
            .addEventListener("click", function () {
                window.location.href = "reviews.php";
            });
    </script>
</body>

</html>