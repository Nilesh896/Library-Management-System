<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_management"; // Correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $apply_date = $_POST['apply_date'];
    $erp_id = $_POST['erp_id'];
    $class = $_POST['class'];
    $duration = $_POST['duration'];
    $from_station = $_POST['from_station'];
    $route = $_POST['route'];
    $proof = $_POST['proof'];
    
    // Handle file upload
    $photo = "";
    $upload_dir = 'uploads/';
    
    // Create the uploads directory if it does not exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_name = basename($_FILES['photo']['name']);
        $upload_file = $upload_dir . $file_name;
        
        if (move_uploaded_file($file_tmp, $upload_file)) {
            $photo = $file_name;
        } else {
            header("Location: dashboard.php?message=" . urlencode("File upload failed"));
            exit();
        }
    } else {
        header("Location: dashboard.php?message=" . urlencode("File upload error"));
        exit();
    }
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO rail_concession (name, apply_date, erp_id, class, duration, from_station, route, proof, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $apply_date, $erp_id, $class, $duration, $from_station, $route, $proof, $photo);
    
    // Execute the query
    if ($stmt->execute()) {
        header("Location: dashboard.php?message=" . urlencode("Data successfully stored in the database"));
    } else {
        header("Location: dashboard.php?message=" . urlencode("Error: " . $stmt->error));
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rail Concession</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="title"><p>Railway Concession Form</p></div>
        <h2>Some Rules</h2>
        <div class="rules">
            <ul>
                <li>Apply once at a time else your concession form will get cancel</li>
                <li>Fill proper details</li>
                <li>Collect your rail concession form on next working hour from student section</li>
                <li>Carry your idenity proof</li>
            </ul>
        </div>
        
        <form action="" method="post" enctype="multipart/form-data">
            <span>Enter Name: </span>
            <br>
            <input type="text" class="border" placeholder="Name" name="name" required>
            <br><br>
            <span>Date of Apply:</span>
            <br>
            <input type="date" class="date" name="apply_date" required>
            <br><br>
            <span>ERP ID:</span>
            <br>
            <input type="text" class="border" placeholder="ERP ID" name="erp_id" required>
            <br><br>
            <span>Class:</span>
            <span><input type="radio" class="box" name="class" value="1st" required>1st</span>
            <span><input type="radio" class="box" name="class" value="2nd" required>2nd</span>
            <span><input type="radio" class="box" name="class" value="AC" required>AC</span>
            <br><br>
            <span>Duration:</span>
            <span><input type="radio" class="box1" name="duration" value="Monthly" required>Monthly</span>
            <span><input type="radio" class="box1" name="duration" value="Quarterly" required>Quarterly</span>
            <br><br>
            <span>Route:</span>
            <br>
            <select name="from_station" class="date" required>
                <option value="" disabled selected>Select</option>
                <option value="Andheri">Andheri</option>
                <option value="Bandra">Bandra</option>
                <option value="Churchgate">Churchgate</option>
                <option value="Dadar">Dadar</option>
                <option value="Malad">Malad</option>
                <option value="Mumbai CST">Mumbai CST</option>
                <option value="CSMT">CSMT</option>
                <option value="Powai">Powai</option>
                <option value="Thane">Thane</option>
                <option value="Vashi">Vashi</option>
                <option value="Kalyan">Kalyan</option>
                <option value="Nerul">Nerul</option>
                <option value="Panvel">Panvel</option>
                <option value="Vasai">Vasai</option>
                <option value="Dombivli">Dombivli</option>
                <option value="Navi Mumbai">Navi Mumbai</option>
                <option value="Khopoli">Khopoli</option>
                <option value="Karjat">Karjat</option>
            </select>
            <span>-</span>
            <span><input type="radio" class="box" name="route" value="Koparkhairane" required>Koparkhairane</span>
            <br><br>
            <span>Upload ID Proof:</span>
            <span class="file">*only pdf, jpg, jpeg</span>
            <br>
            <select name="proof" class="date" required>
              <option value="" disabled selected>Select</option>
              <option value="College Id">College Id</option>
              <option value="Aadhar">Aadhar</option>
              <option value="Pan card">Pan card</option>
              <option value="Voter Id">Voter Id</option>
            </select>
            <br><br>
            <input type="file" class="submit" name="photo" accept="image/*,application/pdf" required>
            <br><br>
            <button type="submit" class="submit">Submit Form</button>
            <br><br>
        </form>
    </div>
</body>  
</html>
