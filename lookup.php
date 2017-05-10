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
    <title>lookup</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <style>
        * {
            font-family: sans-serif;
        }
        .error {
            color: $f00;
        }
        .profilecontainer {
            margin: 0px auto;
            text-align: center;
        }
        .profilecontainer img {
            padding-bottom: 10px;
            border: 10px #bbb double;
            width: 300px;
            border-radius: 50%;
            padding: 10px;
        }
        .profilecontainer span {
            display: inline-block;
            width: 49%;
        }
        .profilecontainer .left {
            text-align: right;
        }
        .profilecontainer .right {
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    require_once "nav.php";
    require_once "nav2.php";
    echo "<h1>lookup</h1>";
    echo '<hr>';
    ?>
    
    <form method="post" action="lookup.php" style="padding: 10%;">
        <label>username:<br>
            <input type="text" name="user" required>
            <span class="error">*</span>
        </label>
        <input type="submit" name="submit" value="submit">
    </form>
    
    <?php
        if(isset($_POST['user'])) {
            // store the data from the form field into a variable and apply it to the string we will use as an image source
            $user = $_POST['user'];
            if(file_exists("$user/image.jpg")) {
                $img = "$user/image.jpg";
            } else {
                $img = "$user/image.png";
            }
            // call the text file that we received in postprocess.php; this will specify which text file we received.
            // note that this will only work if the text that was entered in the input matches a user that was already created
            // PHP will 'if' the data from the input doesn't match our user that was created on the register
            // if there is a match, then we call the text file and turn each line into an item in an array stored in $profile
            $profile = file("$user/profile.txt");
            //print_r($profile);
            // the first and second line in our $profile array has the name and email which we set in prostprocess.php
            // by calling their index restore these values inside variables $name and $email
            // in addition we use the trim method to remove white space in these values
            $name = trim($profile[0]);
            $email = trim($profile[1]);
        } else {
            // on page load or if no value was entered on submit, we assign default values to the variables $imagedir, $name, $email
            $user = "user";
            $img = "default.png";
            $name = "name";
            $email = "email";
        }
    ?>
    
    <div class="profilecontainer">
        <!-- inside the image source, and hte spans with the class of right, we echo the variables as specified above -->
        <img src="<?php echo $img ?>">
        <h3>
            <span class="left">user:&nbsp;</span>
            <span class="right"><?php echo $user ?></span>
            <span class="left">name:&nbsp;</span>
            <span class="right"><?php echo $name ?></span>
        </h3>
        <h4>
            <span class="left">email:&nbsp;</span>
            <span class="right"><?php echo $email ?></span>
        </h4>
    </div>
    <p>&nbsp;</p>
</body>
</html>











































