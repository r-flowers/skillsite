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
    <title>register</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
    <?php
    require_once "nav.php";
    require_once "nav2.php";
    echo "<h1>register</h1>";
    echo '<hr>';
    ?>
    
    <p style="padding: 10%;">
        <span class="error">* required field.</span>
    </p>
    
    <form method="post" action="postprocess.php" enctype='multipart/form-data' style="padding: 0% 10%;">
        <label>name
            <input type="text" name="name" required><span class="error">*</span><br>
        </label><br>
        <label>e-mail
            <input type="email" name="email" required><span class="error">*</span><br>
        </label><br>
        <label>user name
            <input type="text" name="user" required><span class="error">*</span><br>
        </label><br>
        <label>password
            <input type="password" name="pw" required><span class="error">*</span><br>
        </label><br>
        <label>photo
            <input type="file" name="photo" required><span class="error">*</span><br>
        </label><br>
        <input type="submit" name="submit" value="submit">
    </form>
    <p>&nbsp;</p>
    
</body>
</html>