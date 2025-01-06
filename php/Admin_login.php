<?php
session_start();

if (isset($_POST['login'])) {
    // Establish connection to the database
    $connection = mysqli_connect("localhost", "root", "", "library_management");

    // Check the connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize input data
    $email = mysqli_real_escape_string($connection, $_POST['Email']);
    $password = mysqli_real_escape_string($connection, $_POST['Password']);

    // Query to fetch user data
    $query = "SELECT * FROM users WHERE Email='$email'";
    $query_run = mysqli_query($connection, $query);

    // Check if the query returned a row
    if ($query_run && mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_assoc($query_run);

        // Verify the password
        if (password_verify($password, $row['Password'])) {
            // Store user details in session variables
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Email'] = $row['Email'];
            header("Location: dashboard1.php");
            exit();
        } else {
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Email'] = $row['Email'];
            header("Location: dashboard1.php");
            exit();  
        }
    } else {
        echo "<script>alert('Invalid Email');</script>";
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleadmin.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title"><span>Admin Login Form</span></div>
      <form action="" method="post">
        <div class="row">
          <i class="fa fa-user"></i>
          <input type="text" placeholder="Admin Id" name="Email"required>
        </div>
        <div class="row">
          <i class="fa fa-lock"></i>
          <input type="password" placeholder="Password" name="Password">
        </div>
        <div class="pass"><a href="#">Forgot Password?</a></div>
        <div class="row button">
          <input type="submit" value="login" name="login">
          <div class="signup-link">Not a member:<a href="#">Signup now</a></div>
        </div>
      </form>
  </body>  
</html>      
                       