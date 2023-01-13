<?php
include('../conection.php');
$name = $_POST['user'] || $_POST['email'];
$password = $_POST['pass'];

//to prevent from mysqli injection
$name = stripcslashes($name );
$password = stripcslashes($password);
$name = mysqli_real_escape_string($signup, $name);
$password = mysqli_real_escape_string($signup, $password);

$sql = "select * from signup where name = '$name' and password = '$password'";
$result = mysqli_query($signup, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count==0) {
    echo "<h1 '><center> Login successful </center></h1>";
} else {
    echo "<h1> Login failed. Invalid name or password.</h1>";
}
?>
<html>
    <body style="background-image: url(../img/dd.jpg);">
    

    </body>
</html>