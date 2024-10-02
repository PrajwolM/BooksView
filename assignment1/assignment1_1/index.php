<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'bookreview';
$connection = mysqli_connect($host, $user, $pass, $dbname);


if (!mysqli_select_db($connection, $dbname))
    die("Could not open database");

$booksQuery = 'SELECT title,bookId FROM book';

$result = mysqli_query($connection, $booksQuery);


$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksView</title>
    <link rel="stylesheet" href="./styles/style.css">

</head>

<body class="homePage">
    <?php include 'layout/header.php' ?>
    <div id="quote"></div>

    <div class="img_des_wrapper">
        <div class="Intro">
            <div class="shortIntro">
                <p>Here you can review IT Books and recommendations from others. Learn, Expand and share your IT
                    Learning.
                    Share Your Experiences through this website.</p>
            </div>
            <div class="go-books">
                <a href="books.php" class="general_button">
                    See Books &rarr;
                </a>
            </div>
        </div>

        <div class="img_wrapper">
            <img src="img/undraw_book_lover_re_rwjy.svg" alt="Book_Lover" width="400" class="booklover">
        </div>
    </div>


    <?php include 'layout/footer.php' ?>


    <script>
        const quotes = [
            "Programs must be written for people to read, and only incidentally for machines to execute. – Harold Abelson",
            "Any sufficiently advanced technology is indistinguishable from magic. – Arthur C. Clarke",
            "The computer was born to solve problems that did not exist before. – Bill Gates",
            "Innovation distinguishes between a leader and a follower. – Steve Jobs",
            "The only way to do great work is to love what you do. – Steve Jobs"
        ];

        const today = new Date().getDay();
        const quoteOfTheDay = quotes[today % quotes.length];
        document.getElementById('quote').textContent = quoteOfTheDay;
    </script>
</body>

</html>