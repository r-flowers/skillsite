<?php session_start(); ?>

<!doctype html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    require_once "nav.php";
    require_once "nav2.php";
    echo "<h1>login</h1>";
    echo '<hr>';
    ?>
    
    <form method="post" action="login.php" style="padding: 10%;">
        <label>e-mail
            <input type="email" name="email" value="" required><br>
        </label>
        <br>
        <label>password
            <input type="password" name="pw" value="" required><br>
        </label>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
    
    <?php
    if(isset($_POST['submit'])) {
        if(empty($_POST['email']) || empty($_POST['pw'])) {
            echo "username or password is invalid!";
        } else {
            $email = $_POST['email'];
            $pw = $_POST['pw'];
            $connection = mysqli_connect("localhost", "root", "root", "phptest");
            $query = "select * from capture where pw='$pw' AND email='$email'";
            $loginCheck = mysqli_query($connection, $query);
            $rows = mysqli_num_rows($loginCheck);
            echo $rows;
            echo "<br>";
            if ($rows == 1) {
                while($row = mysqli_fetch_assoc($loginCheck)) {
                    $_SESSION['uid'] = $row["uid"];
                    $_SESSION['time'] = $row["time"];
                    $_SESSION['name'] = $row["name"];
                    $_SESSION['email'] = $row["email"];
                    $_SESSION['pw'] = $row["pw"];
                    echo "<a href=\"profile.php\">proceed to profile</a>";
                }
            } else {
                echo "try again";
            }
            mysqli_close($connection);
        }
    }
    ?>
</body>
</html>