<?php session_start();
// start an if statement using the isset method to validate that there is a value in the "email field"
// $_POST is a super global in php that carries the entered data from specific form fields.
// in this case it's thef orm field with the name of email.
if(isset($_POST['email'])) {
    // take the name and meail data and store them into variables $name and $email
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // similarly, take data from the user field and assign it to two variables: $user while be used for the rest of this script.
    // $_SESSION is a super global that can be called and edited from page to page since we started with a session on line 3
    $user = $_SESSION['user'] = $_POST['user'];
    $pw = $_POST['pw'];
    
    // start the email processing
    // now that we have the form data stored, we can do things with it, like sending an email.
    // to do so, create a variable that contains the email body using a combo of strings and variables
    $email_message = "name: $name \n email: $email\n username: $user";
    
    // store the subject into a variable
    $email_subject = "message from $name";
    
    // store the email recipient in a variable
    $email_to = "robinandrewflowers@gmail.com";
    
    // create email headers, the hidden code on top of all emails, read by the mail client.
    // regardless of this configuration, the only thing that you would change on this line is if the $emails variable is the email address you want in the reply and from lines.
    $headers = 'from: '.$email."\r\n".'reply-to: '.$email."\r\n".'x-mailer: php/'.phpversion();
    
    // build your email using the @mail method, using the parameters of the variabales that you just created in this order:
    // email recipient, email subject, email message, email headers
    mail($email_to, $email_subject, $email_message, $headers);
    
    // end email processing.
    // start file processing.
    
    // now that we have sent out an email, let's also take data from the form and store it.
    // we will create a folder with the name of the user. and with this folder will be an image of the user uploaded and a text file containing the text input data values.
    // since the text document and the image will hav ehte same filenames regardless of the user, we will uniquely name each directory by the username
    mkdir($user);
    // use the fopen method to create a text file with the name profile.txt, stored in the directory we just created.
    // the second parameter "w" gives us permission to write in this file
    $fh = fopen("$user/profile.txt", 'w') or die();
    
    // create a variable that contains the strings fo all the data we want to store in the text document.
    $text = "$name \n $email \n $user \n $pw";
    
    // use the fwrite method to call the file we created and insert the text stores in the previous
    fwrite($fh, $text) or die("could not write to file!");
    
    // use the fclose method to close the text document after we've written to it
    fclose($fh);
    
    // run another if statement to validate if a photo was uploaded by the user. if true, do the following...
    
    if($_FILES) {
        // store the file name and variable $image
        $image = $_FILES['photo']['name'];
        // call the file type and check it against the following cases
        switch($_FILES['photo']['type']) {
            // check if it's a jpeg. if so, assign the $ext value jpg.
            case 'image/jpeg':
                $ext = 'jpg';
                break;
            // check if it's a png. if so, assign $ext the value of png.
            case 'image/png';
                $ext = 'png';
                break;
            // if neither of the two checks are true, assign $ext value null
            default:
                $ext = '';
                break;
        }
    // run another if statement checking if $ext has a value other than null. as seen above this would mean $ext would be either a png or a jpg
        if($ext) {
            // create variable with the desired file's path and name
            $n = "$user/image.$ext";
            
            // move the file to the server and assign it the path and name we specified previously
            move_uploaded_file($_FILES['photo']['tmp_name'], $n);
            
            // finally, store as a session variable to call later
            $_SESSION['img'] = $n;
        }
    } else {
        echo "no image has been uploaded!";
    };
    
    // start store to SQL db
    // establishing connection with server by passing server_name, user_id, and password as a parameter.
    $connection = mysqli_connect("localhost", "root", "root", "capture");
    $query = "INSERT INTO capture (uid, time, name, email, pw) VALUES (NULL, NULL, '$name', '$email', '$pw');";
    mysqli_query($connection, $query);
    
    if(!$connection) {
        echo "error! " . $query . "<br>" . $connection->error;
    }
    mysqli_close($connection); // closing connection
    
    // end store to sql DB
    // finally, once all the data is processed, send the user to the confirmation page.
    header('location: confirmed.php');
}
?>