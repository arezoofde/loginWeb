<?php
session_start();
if (array_key_exists('id', $_COOKIE)) {
    $_SESSION['id'] = $_COOKIE['id']; //stay logged in for long time
    echo "<h3>welcom dear," . $_SESSION['name'] . "</h3>";

}
if (array_key_exists('id', $_COOKIE) || array_key_exists('id', $_SESSION)) {
    echo "<h2>congratulations, you are a register user! <a href =index.php?logout=1>
    Log out </a></h2>";
} else {
    header("Location: index.php");
}

?>
<html>
    <body style="background-image:url(../img/ff.jpg) ;background-repeat: no-repeat;background-size: 100% 100%;">
    <h3><a href="index.php">Go Back</a></h3>
    </body>


</html>