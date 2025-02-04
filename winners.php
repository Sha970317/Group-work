<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Placeholder for database connection (replace with actual connection)
// Example: $db = new mysqli("localhost", "username", "password", "database");

$results = [];
$searchMessage = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lotteryName = isset($_POST['lottery_name']) ? trim($_POST['lottery_name']) : "";
    $date = isset($_POST['date']) ? trim($_POST['date']) : "";

    // Basic validation
    if (empty($lotteryName) && empty($date)) {
        $searchMessage = "Please enter a Lottery Name or Date to search.";
    } else {
        // Query database (replace with your actual query logic)
        // Example:
        /*
        $stmt = $db->prepare("SELECT * FROM lottery_results WHERE 
                              (name LIKE ? OR date = ?) LIMIT 50");
        $stmt->bind_param("ss", $lotteryNameSearch, $date);
        $lotteryNameSearch = "%$lotteryName%";
        $stmt->execute();
        $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        */

        // For demonstration, using static results
        $results = [
            [
                "name" => "Lottery A",
                "date" => "2025-01-25",
                "pattern" => "Letter and 4 Numbers Correct",
                "prize" => "Rs. 66,743,304.00",
                "winners" => "5",
            ],
            [
                "name" => "Lottery B",
                "date" => "2025-01-26",
                "pattern" => "Letter and 3 Numbers Correct",
                "prize" => "Rs. 500,000.00",
                "winners" => "15",
            ],
        ];

        if (empty($results)) {
            $searchMessage = "No lottery results found for your search criteria.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winners - Lottery Reservation System</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(240, 243, 243);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #82E9FD;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-title-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
        }

        .logo-title-container img {
            height: 50px;
            margin-right: 10px;
        }

        .logo-title-container h1 {
            margin: 0;
            font-size: 50px;
            font-weight: bold;
            text-align: center;
        }
        nav {
            width: 100px;
            background-color: #82E9FD;
            padding: 15px;
            position: fixed;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 80px;
        }

        nav a {
            display: block;
            color: black;
            text-decoration: none;
            padding: 10px 0;
            font-size: 18px;
            text-align: center;
            background-color: white;
            border-radius: 5px;
            width: 100%;
        }

        nav a:hover {
            background-color: #82E9FD;
        }
        .button {
            padding: 8px 16px;
            margin: 0 5px;
            text-decoration: none;
            border: none;
            border-radius: 25px;
            color: white;
            background-color: #007bff;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

        main {
            margin-left: 220px;
            padding: 20px;
        }
        .form-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .form-container input, .form-container button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        table tbody tr:nth-child(even) {
            background-color: #eaf4fb;
        }
        footer {
            background-color: #82E9FD;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            nav {
                position: relative;
                width: 100%;
                height: auto;
                flex-direction: row;
                justify-content: space-around;
                padding: 10px;
                gap: 0;
            }

            nav a {
                padding: 10px;
                font-size: 16px;
                width: auto;
            }

            main {
                margin-left: 0;
                padding: 15px;
            }

            .form-container {
                flex-direction: column;
                align-items: center;
            }

            .form-container input, 
            .form-container button {
                width: 100%;
                margin-bottom: 10px;
            }

            table {
                width: 100%;
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            table th, table td {
                font-size: 14px;
                padding: 8px;
            }

            .button {
                font-size: 14px;
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-title-container">
            <img src="win.png" alt="Lottery Logo">
            <h1>Winners</h1>
        </div>
        <div>
            <button class="button" onclick="window.location.href='login.php'">Login</button>
            <button class="button" onclick="window.location.href='sign.php'">Sign Up</button>
        </div>
    </header>
    <nav>
        <a href="index.php?page=home">Home</a>
        <a href="lottery.php">Lottery</a>
        <a href="winners.php">Winners</a>
        <a href="about.php">About Us</a>
    </nav>
    <main>
        <h2>Search Lottery Results</h2>
        <div class="form-container">
            <form method="POST" action="winners.php">
                <input type="text" name="lottery_name" placeholder="Enter Lottery Name">
                <input type="date" name="date">
                <button type="submit">Search</button>
            </form>
        </div>
    </main>
    <footer>
        &copy; 2025. All Rights Reserved.
    </footer>
</body>
</html>
