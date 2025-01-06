<?php
// Establish database connection
$connection = mysqli_connect("localhost", "root", "", "library_management");

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission for registration
if (isset($_POST['register'])) {
    // Sanitize input data
    $name = mysqli_real_escape_string($connection, $_POST['Name']);
    $email = mysqli_real_escape_string($connection, $_POST['Email']);
    $password = mysqli_real_escape_string($connection, $_POST['Password']);

    // Check for existing email
    $check_email_query = "SELECT * FROM users WHERE Email='$email'";
    $check_email_result = mysqli_query($connection, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        echo "<script>
                alert('Email already exists. Please use a different email.');
                window.location.href = 'register.php'; // Redirect back to the registration page
              </script>";
    } else {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert query
        $insert_query = "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$hashed_password')";
        if (mysqli_query($connection, $insert_query)) {
            echo "<script>
                    alert('Registration successful! You may login now.');
                    window.location.href = 'dashboard.php'; // Redirect to login page after successful registration
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Could not register user. Please try again.');
                    window.location.href = 'register.php';
                  </script>";
        }
    }
}

// Close the database connection
mysqli_close($connection);
?>
