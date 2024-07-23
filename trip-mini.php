<?php
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $username=$_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $nopeople = $_POST['nopeople'];
    $startdate = $_POST['startdate'];

    try {
    $stmt = $pdo->prepare("INSERT INTO preplan (username, email, phone,location,nopeople,startdate) VALUES (?, ?, ?,?, ?, ?)");

    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $phone);
    $stmt->bindParam(4, $location);
    $stmt->bindParam(5, $nopeople);
    $stmt->bindParam(6, $startdate);
   $stmt->execute();
   $_SESSION['user_id'] = $pdo->lastInsertId();
   $_SESSION['username'] = $username;
   header("Location: details-mini.php");
} catch (PDOException $e) {
   echo "Error: " . $e->getMessage();
}
}
?>

<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>signin</title>
        <link rel="stylesheet" href="sign-mini.css">
    </head>
    <body>
        <div class="header">
            <nav>
                <p1>ExploreEase </p1>
                <ul class="nav-links">
                    <li><a href="home-mini.php">Home</a></li>
                    <li><a href="about-mini.php">Contact Us</a></li>
                    <li><a href="review-mini.php">Reviwes</a></li>
                </ul>
                <a href="sign_in.php" class="register-btn">register</a>
            </nav>
        </div>
        <div class="wrapper">
            <div class="title">
                Plan A Trip
             </div>
             <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " >
                <div class="field">
                   <input type="text" name="username" required>
                   <label>Name</label>
                </div>
                <div class="field">
                   <input type="email" name="email" required>
                   <label>Email Address</label>
                </div>
                <div class="field">
                    <input type="text" name="phone" required>
                    <label>Phone No</label>
                 </div>
                <div class="field">
                    <input type="text" name="location" required>
                    <label>Select Location</label>
                 </div>
                <div class="field">
                    <input type="text" name="nopeople" required>
                    <label>No of people</label>
                 </div>
                 <div class="field">
                    <input type="text" name="startdate" required>
                    <label>Start date(app)</label>
                 </div>
                <div class="field">
                   <input type="submit" value="Submit">
                </div>
             </form>
          </div>
        </div>
    </body>
</html>