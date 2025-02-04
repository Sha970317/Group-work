<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Lottery Reservation System</title>
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
            position: relative;
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

        .buttons {
            display: flex;
            gap: 10px;
        }

        .button {
            padding: 10px 20px;
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
            background-color: #82E9FD;
            padding: 15px;
            position: fixed;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 80px;
            z-index: 10;
            transition: transform 0.3s ease;
            top: 0;
            left: 0;
            bottom: 0;
            width: 100px;
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
            padding: 20px;
            text-align: center;
            flex-grow: 1;
            margin-left: 120px;  /* To avoid overlap with the fixed nav */
        }

        main h2 {
            font-size: 28px;
            color: #007bff;
        }

        main section {
            margin-bottom: 20px;
        }

        main p {
            font-size: 18px;
            color: #333;
            line-height: 1.6;
        }

        footer {
            background-color: #82E9FD;
            padding: 10px;
            text-align: center;
            margin-top: auto; /* Ensures footer is at the bottom */
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
                margin-left: 0; /* Adjust margin for small screens */
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
                margin-left: 0; /* Adjust margin for small screens */
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
</head>
<body>
    <header>
        <div class="logo-title-container">
            <img src="win.png" alt="Lottery Logo">
            <h1>About Us</h1>
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
        <h2>Learn more about our system and team here</h2>
        
        <section>
            <h3>Our Vision</h3>
            <p>
                To become the leading lottery system, recognized globally for its fairness, innovation, and contributions to the community. 
                We envision a world where lotteries are accessible, transparent, and create meaningful opportunities for everyone.
            </p>
        </section>

        <section>
            <h3>Our Mission</h3>
            <p>
                To create a fair, secure, and innovative platform that brings people together for exciting lottery opportunities. 
                We are committed to building trust, ensuring transparency, and delivering a seamless user experience that sparks joy and excitement.
            </p>
        </section>

        <section>
            <h3>Why Choose Us?</h3>
            <p>
                Whether you're here to try your luck or learn about how lotteries work, we are dedicated to making the experience enjoyable, secure, and rewarding for everyone.
                Thank you for trusting us as your lottery partner!
            </p>
        </section>
    </main>

    <footer>
        &copy; 2025. All Rights Reserved.
    </footer>
</body>
</html>


