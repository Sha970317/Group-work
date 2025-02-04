<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Days</title>
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
            flex-wrap: wrap;
        }

        .logo-title-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            flex: 1;
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
            font-size: 2rem;
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
            top: 0;
            bottom: 0;
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

        main {
            margin-left: 120px;
            padding: 20px;
            flex-grow: 1;
            z-index: 10;
            text-align: center;
        }

        .day-buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            gap: 10px;
            flex-wrap: wrap;
        }

        .day-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            width: 100%;
            max-width: 120px;
        }

        .day-buttons button:hover {
            background-color: #0056b3;
        }

        .lottery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .lottery-grid .image {
            width: 100%;
            height: 500px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            border: 2px solid #ddd;
        }

        footer {
            background-color: #82E9FD;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .lottery-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 992px) {
            header {
                flex-direction: column;
                align-items: center;
            }

            .logo-title-container h1 {
                font-size: 1.5rem;
            }

            nav {
                width: 100%;
                position: relative;
                padding: 10px;
                flex-direction: row;
                justify-content: space-around;
                height: auto;
            }

            nav a {
                padding: 5px 10px;
            }

            main {
                margin-left: 0;
                padding: 10px;
            }

            .day-buttons button {
                font-size: 14px;
                padding: 8px 16px;
            }

            .lottery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .logo-title-container h1 {
                font-size: 1.2rem;
            }

            .day-buttons button {
                font-size: 12px;
                padding: 8px 12px;
                width: 100%;
                max-width: none;
            }

            .lottery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <script>
        const lotteryImages = {
            'Sunday': ['sunday1.jpeg', 'sunday2.jpg', 'sunday3.jpg', 'sunday4.jpg'],
            'Monday': ['monday1.jpeg', 'monday2.jpeg', 'monday3.jpg', 'monday4.jpg'],
            'Tuesday': ['tuesday1.jpeg', 'tuesday2.jpeg', 'tuesday3.jpeg', 'tuesday4.jpg'],
            'Wednesday': ['wednesday1.jpeg', 'wednesday2.jpeg', 'wednesday3.jpg', 'wednesday4.jpg'],
            'Thursday': ['thursday1.jpeg', 'thursday2.jpg', 'thursday3.jpeg', 'thursday4.jpg'],
            'Friday': ['friday1.jpeg', 'friday2.jpg', 'friday3.jpg', 'friday4.jpg'],
            'Saturday': ['saturday1.jpeg', 'saturday2.jpeg', 'saturday3.jpeg', 'saturday4.jpg']
        };

        let currentDay = 'Sunday';

        function loadDayImages(day) {
            currentDay = day;
            const grid = document.querySelector(".lottery-grid");
            grid.innerHTML = '';
            lotteryImages[day].forEach(image => {
                const imgDiv = document.createElement("div");
                imgDiv.className = "image";
                imgDiv.style.backgroundImage = `url('${image}')`;
                grid.appendChild(imgDiv);
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            loadDayImages(currentDay);
        });
    </script>
</head>
<body>
    <header>
        <div class="logo-title-container">
            <img src="win.png" alt="Lottery Logo">
            <h1>Lottery Days</h1>
        </div>
        <div>
            <button class="button" onclick="window.location.href='login.php'">Login</button>
            <button class="button" onclick="window.location.href='sign.php'">Sign Up</button>
        </div>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="lottery.php">Lottery</a>
        <a href="winners.php">Winners</a>
        <a href="about.php">About Us</a>
    </nav>
    <main id="content">
        <div class="day-buttons">
            <button onclick="loadDayImages('Sunday')">Sunday</button>
            <button onclick="loadDayImages('Monday')">Monday</button>
            <button onclick="loadDayImages('Tuesday')">Tuesday</button>
            <button onclick="loadDayImages('Wednesday')">Wednesday</button>
            <button onclick="loadDayImages('Thursday')">Thursday</button>
            <button onclick="loadDayImages('Friday')">Friday</button>
            <button onclick="loadDayImages('Saturday')">Saturday</button>
        </div>
        <div class="lottery-grid"></div>
    </main>
    <footer>
        &copy; 2025. All Rights Reserved.
    </footer>
</body>
</html>


