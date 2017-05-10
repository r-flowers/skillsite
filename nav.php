<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">skillshare</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="about.php">about</a></li>
            <li><a href="register.php">register</a></li>
            <li><a href="lookup.php">lookup</a></li>
            <li><a href="login.php">login</a></li>
            <?php
            if(isset($_SESSION['uid'])){
                echo '<li><a href="profile.php">profile</a></li>';
                echo '<li><a href="logout.php">logout</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>
