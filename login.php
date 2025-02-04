<?php
session_start();
require 'config.php'; // Ensure this contains the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db_connect.php';

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['message'] = "Login successful!";
            header("Location: dashboard.php"); // Redirect to a secure dashboard
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password!";
        }
    } else {
        $_SESSION['error'] = "Invalid email or password!";
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
    <title>Login</title>
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

        /* Centered 'Login' text */
        .top-bar {
            background: #6DD5FA;
            padding: 15px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
        }

        .top-bar h3 {
            margin: 0;
            font-size: 50px;
            font-weight: bold;
            text-align: center;
            color: black;
            flex-grow: 1;
        }

        input {
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
            color: black;
        }

        /* Submit button styled like Sign-Up button */
        button {
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            color: white;
            background-color: #007bff;
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
</head>
<body>
    <div class="top-bar">
        <h3>Login to your Account</h3>
        <div class="buttons">
            <button onclick="window.location.href='index.php'">Back to Home</button>
            <button onclick="window.location.href='sign.php'">Sign Up</button>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <h2>Welcome Back</h2>
            <p>Login to your account</p>
            
            <?php
            if (isset($_SESSION['error'])) {
                echo "<div class='error'>" . htmlspecialchars($_SESSION['error']) . "</div>";
                unset($_SESSION['error']);
            }
            ?>

            <form method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <footer>
        &copy; 2025. All Rights Reserved.
    </footer>
</body>
</html>
