<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About the Creator</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php include 'layout/header.php' ?>


    <div class="about-container" id="profile-container">
        <h2>Welcome to BooksView</h2>
        <div class="profile-container">

            <img src="./img/profile.jpg" alt="My Photo" class="profile-img">
        </div>
        <div class="content">
            <p>Hello! I am Prajwol Manandhar. I am an aspiring software developer and here I have brought you some
                information about modern computing technologies and their applicability on the IT industry. Do give
                reviews on various books that are here and share your experience.</p>

            <button type="button" class="collapsible">Career Goals</button>
            <div class="collapsibleContent open">
                <p>My career goal is to become fluent in use of modern IT technologies and startup my own company in the
                    future. I hope to return to Nepal and startup my own company that focuses on connecting aspiring
                    candidates to companies that require relevant personnels. I am constantly learning and increasing my
                    knowledge on the ongoings of the current situation in IT.</p>
            </div>
            <button type="button" class="collapsible">Education</button>
            <ol class="collapsibleContent">
                <li>

                    Vidhya Sagar English Secondary School.(2000-2016)
                </li>
                <li>

                    Khwopa Higher Secondary School.(2016-2018)
                </li>
                <li>

                    Kathmandu University. Bachelors in Computer Engineering.(2018-2023)
                </li>
            </ol>

            <button type="button" class="collapsible">Work Experience</button>
            <div class="collapsibleContent">
                <p>With 1 year of experience in the IT industry as a Frontend Developer, I have worked on various
                    projects
                    involving User Interface and Human Computer Interaction and other similar roles. I am particularly
                    interested in software development and problem solution. I also have a minor interest in
                    cybersecurity.
                </p>
            </div>


            <button type="button" class="collapsible">Technical Skills</button>
            <div class="collapsibleContent">

                <table class="styled-table">
                    <thead>

                        <tr>
                            <th>Skill</th>
                            <th>Proficiency Level</th>
                            <th>Years of Experience</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>HTML & CSS</td>
                        <td>Advanced</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>JavaScript</td>
                        <td>Intermediate</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>C++</td>
                        <td>Intermediate</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Python</td>
                        <td>Beginner</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Figma</td>
                        <td>Beginner</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Java</td>
                        <td>Beginner</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Mantine UI</td>
                        <td>Beginner</td>
                        <td>1</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <?php include 'layout/footer.php' ?>
    <script src="./scripts/collapsible.js"></script>

</body>

</html>