<?php
session_start();
if(isset($_GET['logout'])){
    unset($_SESSION['id']);
    setcookie('id', "", time() - 60 * 60);
    $_COOKIE = " ";
}
//------ PHP code for User registration form---
$error = "";
if (array_key_exists("signup", $_POST)) {

    // Database Link
    include('../conection.php');
    echo "hi vasle";
    //Taking HTML Form Data from User
    $name = mysqli_real_escape_string($signup, $_POST['name']);
    $email = mysqli_real_escape_string($signup, $_POST['email']);
    $password = mysqli_real_escape_string($signup, $_POST['password']);
    $repeatPassword = mysqli_real_escape_string($signup, $_POST['repeatPassword']);
    //echo "$name <br> $email";
    // PHP form validation PHP code
    if (!$name) {
        $error .= "username is required <br>";
    }
    if (!$email) {
        $error .= "Email is required <br>";
    }
    if (!$password) {
        $error .= "Password is required <br>";
    }
    if ($password !== $repeatPassword) {
        $error .= "Password does not match <br>";
    }
    if ($error) {
        $error .= "<b>There were error(s) in your form!</b> <br>" . $error;
    } else {

        //Check if email is already exist in the Database

        $query = "SELECT id FROM signup WHERE email = '$email'";
        $result = mysqli_query($signup, $query);
        if (mysqli_num_rows($result) > 0) {
            $error .= "<p>Your email has taken already!</p>";
        } else {

            //Password encryption or Password Hashing
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO signup (name, email, password,repeatPassword) VALUES ('$name', '$email', '$hashedPassword' ,$repeatPassword)";

            if (!mysqli_query($signup, $query)) {
                $error = "<p>Could not sign you up - please try again.</p>";
            } else {

                //session variables to keep user logged in
                $_SESSION['id'] = mysqli_insert_id($signup);
                $_SESSION['name'] = $name;
                echo "signed";

                //Setcookie function to keep user logged in for long time
                if ($_POST['stayLoggedIn'] == '1') {
                    setcookie('id', mysqli_insert_id($signup), time() + 60 * 60 * 365);
                    //echo "<p>The cookie id is :". $_COOKIE['id']."</P>";
                }

                //Redirecting user to home page after successfully logged in 
                header("Location: logout.php");

            }

        }

    }
}