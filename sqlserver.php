<?php
$connection = mysqli_connect("localhost", "my_user", "my_pw", "my_db");
// check connection
if (mysqli_connect_errno())
    {
    echo "failed to connect to mysql: " . mysqli_connect_error();
    }
?>