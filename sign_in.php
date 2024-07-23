<?php
include("connection.php");
// Login
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   try {
       $stmt = $pdo->prepare("SELECT * FROM sign_up WHERE LOWER(email) = LOWER(?)");
       $stmt->execute([$email]);
       $user = $stmt->fetch(PDO::FETCH_ASSOC);

       if ($user) {
           if ($user['password'] == $password){

               $_SESSION['user_id'] = $user['id'];
           $_SESSION['username'] = $user['username']; 
           header("Location: home-mini.php");
               exit();
           } else {
               echo "<script>alert('Incorrect password. Please try again.');</script>";
           }
       } else {
           echo "<script>alert('User not found. Please sign up.');</script>";
       }
   } catch (PDOException $e) {
       echo "Error: " . $e->getMessage();
   }
}

?>

<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>signup</title>
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
               Login Form
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " >
               <div class="field">
                  <input type="text" name="email" required>
                  <label>Email Address</label>
               </div>
               <div class="field">
                  <input type="password" name="password" required>
                  <label>Password</label>
               </div>
               <div class="content">
                  <div class="checkbox">
                     <input type="checkbox" id="remember-me">
                     <label for="remember-me">Remember me</label>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
               </div>
               <div class="field">
                  <input type="submit" value="Login">
               </div>
               <div class="signup-link">
                  Don't have an account? <a href="sign_up.php">Sign Up</a>
               </div>
            </form>
        </div>
    </body>
</html>