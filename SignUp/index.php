<!-- PHP command to link server.php file with registration form  -->
<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Registration</title>


<body>
  <div class="container">
    <h1>User Registration System</h1>
    <h4><a href="logout.php">Home Page</a></h4>


    <div class="form" id="signup">
      <form method="POST" action="server.php">
        <div class="error">
          <?php echo ($error); ?>
        </div>

        <!--------- To check user regidtration status ------->
        <p>
          <?php
          if (!isset($_COOKIE["id"]) or !isset($_SESSION["id"])) {
            echo "Please first register to proceed.";
          }
          ?>
        </p>
        <input type="text" name="name" placeholder="User Name"> <br> <br>
        <input type="email" name="email" placeholder="Email"> <br><br>
        <input type="password" name="password" placeholder="password"><br><br>
        <input type="password" name="repeatPassword" placeholder="Repeat Password"><br><br>
        <label for="checkbox">Stay logged in</label>
        <input type="checkbox" name="stayLoggedIn" id="chechbox" value="1"> <br><br>
        <input type="submit" name="signup" value="Sign Up">
        <p>Have an account already? <a href="../login/index.html">Log In</a></p>
      </form>
    </div>
  </div>

</body>

</html>