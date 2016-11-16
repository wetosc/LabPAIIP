<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/colors.css" rel="stylesheet">
    <link href="css/fonts.css" rel="stylesheet">

    <link href="css/login.css" rel="stylesheet">

    <title>Login, you stranger</title>
</head>

<body class="bg-belizehole">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $q_email = $_POST["email"]; 
        $q_password = $_POST["password"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "student";

        $conn = new mysqli($servername, $username, $password, $db);
        if ($conn->connect_error) {
            echo ("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare('SELECT * FROM employees WHERE name = ?');
        $query->bind_param('ss', $q_email, $q_password);

        $query->execute();

        $result = $query->get_result();
        if ($row = $result->fetch_assoc()) {
            echo "GOOD - ".$row["username"];
        }

        echo $conn->error;

    }


    ?>

    <div class="content-header">

        <nav class="navbar navbar-fixed-top bg-clear bg-faded">

            <a class="navbar-brand font-nord color-midnightblue font-large2" href="index.html">Cernei Eugeniu</a>

            <ul class="nav navbar-nav navbar-right font-scifly">
                <li>
                    <a class="font-large color-midnightblue" type="button" data-toggle="dropdown"> worked on <span
                        class="caret"></span> </a>
                        <ul class="dropdown-menu bg-faded font-large">
                            <li><a href="#">iOS</a></li>
                            <li><a href="#">android</a></li>
                            <li><a href="#">unity</a></li>
                        </ul>
                    </li>

                    <li><a class="font-large color-midnightblue" href="#">posts</a></li>

                    <li><a class="font-large color-midnightblue" href="memo.php">memos</a></li>

                    <li><a class="font-large color-midnightblue" href="about.html">about</a></li>

                    <li><a class="font-large color-midnightblue" href="login.html">log in</a></li>
                </ul>
            </nav>
        </div>

        <div class="content-main">
            <div class="center-block login-container bg-peterriver font-nord">
                <h2 class="font-scifly">Log in</h2>
                <hr>
                <form action="login.php" method="POST">
                    <div class="form-group has-danger">
                        <label for="emailField">Email address</label>
                        <input type="email" class="form-control form-control-danger" id="emailField" placeholder="Enter email" name="email"
                        required>
                    </div>
                    <div class="form-group">
                        <label for="passwordField">Password</label>
                        <input type="password" class="form-control" id="passwordField" placeholder="Password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary center-block">Log In</button>
                </form>
            </div>
        </div>

        <!-- Scripts are bellow -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/login.js"></script>
    </body>
    </html>