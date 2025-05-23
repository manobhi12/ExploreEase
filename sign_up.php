<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $username=$_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
    $stmt = $pdo->prepare("INSERT INTO sign_up (username, email, password) VALUES (?, ?, ?)");

    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $password);
   $stmt->execute();
   $_SESSION['user_id'] = $pdo->lastInsertId();
   $_SESSION['username'] = $username;
   header("Location: sign_in.php");
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
                Sign Up Form
             </div>
             <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " >
                <div class="field">
                   <input type="text" name="username" required>
                   <label>Username</label>
                </div>
                <div class="field">
                   <input type="email" name="email" required>
                   <label>Email Address</label>
                </div>
                <div class="field">
                   <input type="password" name="password" required>
                   <label>Password</label>
                </div>
                <div class="field">
                   <input type="submit" value="Sign Up">
                </div>
                <div class="signup-link">
                    Already have an account? <a href="sign_in.php">Sign In</a>
                 </div>
             </form>
          </div>
        </div>
    </body>
</html>