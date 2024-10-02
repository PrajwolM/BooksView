<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'bookreview';
$connection = mysqli_connect($host, $user, $pass, $dbname);


if (!mysqli_select_db($connection, $dbname))
    die("Could not open database");

$booksQuery = "SELECT authorship.*,
                GROUP_CONCAT(author.authorName SEPARATOR', ') AS authorNames,book.* 
                FROM authorship
                JOIN book ON authorship.bookId=book.bookId
                JOIN author ON authorship.authorId=author.authorId
                GROUP BY book.bookId";


$result = mysqli_query($connection, $booksQuery);


$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);



?>


<html>

<head>
    <title>Books on Modern Computing</title>
    <link rel="stylesheet" href="./styles/style.css">

</head>

<body>
    <?php include 'layout/header.php' ?>


    <div class="books-container">
        <h2>Explore Our Collection</h2>

        <?php

        foreach ($books as $book) { ?>

            <div class="book">

                <img src="<?= htmlspecialchars($book['imageLocation']) ?>" width="100"
                    alt="<?= htmlspecialchars($book['title']) ?>">
                <div class="about_book">

                    <h3><?php echo $book['title'] ?></h3>
                    <p><strong>Author:</strong> <?php echo $book['authorNames'] ?></p>
                    <p><strong>Publication Year:</strong><?php echo $book['year'] ?></p>
                    <p><?php echo $book['description'] ?></p>
                </div>


            </div>
        <?php }
        ?>

    </div>

    <?php include 'layout/footer.php' ?>

</body>


</html>