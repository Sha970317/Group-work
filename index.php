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
    <title>Lottery Reservation System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('background.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: rgba(130, 233, 253, 0.9);
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

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            color: white;
            background-color: #007bff;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

        nav {
            width: 100px;
            background-color: rgba(130, 233, 253, 0.9);
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

        main {
            padding: 10px;
            flex-grow: 1;
            text-align: center;
            margin-left: 100px;
            max-width: calc(100% - 100px);
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }

        .carousel {
            position: relative;
            width: 100%;
            max-width: 1000px;
            height: 50vh;
            min-height: 300px;
            margin: auto;
            overflow: hidden;
            border-radius: 10px;
        }

        .carousel .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: opacity 1s ease-in-out;
            opacity: 0;
        }

        .carousel .slide.active {
            opacity: 1;
        }

        .carousel .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        footer {
            background-color: rgba(130, 233, 253, 0.9);
            padding: 10px;
            text-align: center;
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .buttons {
                flex-direction: column;
                gap: 5px;
                margin-top: 10px;
            }

            nav {
                flex-direction: row;
                align-items: center;
                position: relative;
                width: 100%;
                height: auto;
                gap: 10px;
            }

            nav a {
                width: auto;
                text-align: center;
            }

            main {
                margin-left: 0;
                padding: 10px;
            }
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .logo-title-container {
                justify-content: center;
                text-align: center;
            }

            .buttons {
                flex-direction: column;
                gap: 5px;
                margin-top: 10px;
            }

            nav {
                flex-direction: column;
                align-items: center;
                position: relative;
                height: auto;
                width: 100%;
            }

            nav a {
                width: 90%;
                text-align: center;
            }

            main {
                margin-left: 0;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .logo-title-container h1 {
                font-size: 30px;
            }

            .button {
                padding: 6px 12px;
                font-size: 14px;
            }

            main {
                margin-left: 0;
                padding: 10px;
            }
        }
    </style>
    <script>
        let currentSlide = 0;
        function showSlides() {
            const slides = document.querySelectorAll(".carousel .slide");
            slides.forEach((slide, index) => {
                slide.classList.toggle("active", index === currentSlide);
            });
            currentSlide = (currentSlide + 1) % slides.length;
        }

        document.addEventListener("DOMContentLoaded", () => {
            showSlides();
            setInterval(showSlides, 3000);
        });
    </script>
</head>
<body>
    <header>
        <div class="logo-title-container">
            <img src="win.png" alt="Lottery Logo">
            <h1>Lottery Reservation System</h1>
        </div>
        <div class="buttons">
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
        <?php
        $page = $_GET['page'] ?? 'home';
        switch ($page) {
            case 'home':
                echo '<p>Welcome to the Lottery Reservation System.</p>';
                break;
            case 'lottery':
                echo '<h2>Lottery Page</h2><p>Select your lottery numbers and try your luck!</p>';
                break;
            case 'about':
                echo '<h2>About Us</h2><p>Learn more about our system and team here.</p>';
                break;
            default:
                echo '<h2>404 Page Not Found</h2><p>Sorry, the page you are looking for does not exist.</p>';
                break;
        }
        ?>

        <div class="carousel">
            <div class="slide active"><img src="image1.jpeg" alt="Slide 1"></div>
            <div class="slide"><img src="image2.jpeg" alt="Slide 2"></div>
            <div class="slide"><img src="image3.jpeg" alt="Slide 3"></div>
        </div>
    </main>

    <footer>
        &copy; 2025. All Rights Reserved.
    </footer>
</body>
</html>





