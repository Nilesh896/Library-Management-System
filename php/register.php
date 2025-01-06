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
                header("Location: dashboard.php");
                exit();
            } else {
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['Email'] = $row['Email'];
                header("Location: dashboard.php");
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
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Modern Login Page</title>
    </head>

    <body>
        <div class="container" id="container">
            <!-- Sign Up Form -->
            <div class="form-container sign-up">
                <form action="index.php" method="post">
                    <h1>Create Account</h1>
                    <input type="text" name="Name" placeholder="Name" required>
                    <input type="email" name="Email" placeholder="Email" required>
                    <input type="password" name="Password" placeholder="Password" required>
                    <button type="submit" name="register">Sign Up</button>
                </form>
            </div>

            <!-- Sign In Form -->
            <div class="form-container sign-in">
                <form action="" method="post">
                    <h1>Sign In</h1>
                    <input type="email" name="Email" placeholder="Email" required>
                    <input type="password" name="Password" placeholder="Password" required>
                    <a href="#">Forgot Your Password?</a>
                    <button type="submit" name="login">Sign In</button>
                </form>
            </div>

            <!-- Toggle Panels -->
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Login Here!</h1>
                        <button class="hidden" id="login">Sign In</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Register Here!</h1>
                        <button class="hidden" id="register">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>
