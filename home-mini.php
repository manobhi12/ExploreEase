<?php
include("connection.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="home-mini.css">
</head>
<body>
    <div class="header">
        <nav>
            <p>ExploreEase</p>
            <ul class="nav-links">
                <li><a href="home-mini.php">Home</a></li>
                <li><a href="about-mini.php">Contact Us</a></li>
                <li><a href="review-mini.php">Reviwes</a></li>
            </ul> 
            <a href="sign_in.php" class="register-btn">register</a>
        </nav>
        <div class="container">
            <h1>Find Your Next Stay</h1>
            <div class="search-bar">
                <form>
                    <div class="location-input">
                        <label>Location</label>
                    </div>
                    <button type="submit">Search</button>
                </form>
            </div>  
        </div>
        <div class="nav1">
            <a href="preplan-mini.php" class="register-btn">Pre Planned trips</a>
            <a href="stranger-mini.php" class="register-btn">Travel With Strangers</a>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>