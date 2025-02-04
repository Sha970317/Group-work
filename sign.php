<?php
session_start();
require 'config.php'; // Ensure this contains the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db_connect.php';

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $gender = trim($_POST['gender']);
    $bank_details = trim($_POST['bank_details']);
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    // Check if passwords match
    if ($password !== $repeat_password) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: sign.php");
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "Email already exists. Please use a different email.";
        header("Location: sign.php");
        exit();
    }
    $stmt->close();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // File Upload Handling
    $target_dir = "uploads/";
    $nic_photo = $_FILES['nic_photo']['name'];
    $target_file = $target_dir . basename($nic_photo);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allowed file types & size limit (2MB)
    $allowed_types = ["jpg", "jpeg", "png", "pdf"];
    if (!in_array($file_type, $allowed_types) || $_FILES["nic_photo"]["size"] > 2097152) {
        $_SESSION['error'] = "Invalid file type or size exceeded!";
        header("Location: sign.php");
        exit();
    }

    move_uploaded_file($_FILES["nic_photo"]["tmp_name"], $target_file);

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, contact, gender, nic_photo, bank_details, password) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $first_name, $last_name, $email, $contact, $gender, $nic_photo, $bank_details, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Registration successful!";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Registration failed. Please try again.";
        header("Location: sign.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            background-color: #222; 
            color: #fff; 
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .form-container {
            background: #6DD5FA; 
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
        }
        h2 {
            color: #000;
        }

        /* Centered 'Join Us Now' text */
        .top-bar {
            background: #6DD5FA;
            padding: 15px;
            display: flex;
            justify-content: flex-start; /* Align buttons to the left */
            align-items: center;
            width: 100%;
        }

        .top-bar h3 {
            margin: 0;
            font-size: 50px;
            font-weight: bold;
            text-align: center;
            color: black;
            flex-grow: 1; /* Makes sure the h3 text takes up available space */
        }

        input, select {
            width: 100%; 
            padding: 10px; 
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background: #ccc;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .buttons button {
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            color: white;
            background-color: #007bff;
            cursor: pointer;
        }

        /* Error Message */
        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }

        footer {
            background-color: #82E9FD;
            padding: 10px;
            text-align: center;
            color: black; /* Updated to black */
        }

        /* Submit button styled like Login button */
        button {
            padding: 8px 16px; /* Matching padding to the login button */
            border: none;
            border-radius: 20px; /* Same rounded corners as the login button */
            color: white;
            background-color: #007bff; /* Same blue background as the login button */
            cursor: pointer;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .top-bar {
                flex-direction: column;
                text-align: center;
            }
            .buttons {
                margin-top: 10px;
                flex-direction: column;
                gap: 5px;
            }
            .container {
                height: auto;
                padding: 50px 20px;
            }
            .form-container {
                padding: 20px;
            }
        }
    </style>
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var repeatPassword = document.getElementById("repeat_password").value;

            if (password !== repeatPassword) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="top-bar">
        <h3>Join Us Now</h3>
        <div class="buttons">
            <button onclick="window.location.href='index.php'">Back to Home</button>
            <button onclick="window.location.href='login.php'">Login</button>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <h2>Start by creating your account</h2>
            <p>I already have an account</p>
            
            <?php
            if (isset($_SESSION['error'])) {
                echo "<div class='error'>" . $_SESSION['error'] . "</div>";
                unset($_SESSION['error']);
            }
            ?>

            <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="contact" placeholder="Contact Number" required>
                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <input type="file" name="nic_photo" required>
                <input type="text" name="bank_details" placeholder="Bank Details" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="repeat_password" name="repeat_password" placeholder="Repeat Password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

    <footer>
        &copy; 2025. All Rights Reserved.
    </footer>
</body>
</html>
