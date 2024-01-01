<?php
    $showAlert = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $cpassword = $_POST["confirmPassword"];
        $exists=false;


        //Validating username
        if (empty($username)) {
            $showError = "Username is required";
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $showError = "Only letters and numbers allowed in username";
        }
        //Validating email
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $showError = "Invalid email format";
        }
        
        //Check whether this username exists
        $sql = "Select * from user where username='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num>0){
            $exists = true;
            $showError = "Username already exists";
        }
        else{
            if($password == $cpassword){
                $sql = "INSERT INTO `user` ( `username`, `password`, `email`) VALUES ('$username', '$password','$email')";
                $result = mysqli_query($conn, $sql);
                if ($result){
                    $showAlert = true;
                }
            }
            else{
                $showError = "Passwords do not match";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
shrink-to-fit=no">
    <title>SignUp</title>
</head>

<body>
    <?php require 'partials/nav.php' ?>
    <?php
if($showAlert){
echo '<div class="success-message" style="color: green; background-color: #D4EDDA; border-color: #C3E6CB; padding: 10px; margin: 10px 0; border: 1px solid transparent; border-radius: 4px;">
            Signup successful!
            <button class="close-btn" onclick="this.parentElement.style.display="none";">&times;</button>
        </div>';

echo'<script>
// If you want to make the close button functional
document.querySelector(".close-btn").addEventListener("click", function() {
  document.querySelector(".success-message").style.display = "none";
});
</script>';
}

if($showError){
echo '<div class="error-message" style="color: red; background-color: #E8938D; padding: 10px; margin: 10px 0; border: 1px solid transparent; border-radius: 4px;">
            Error: Username not available. Please try again.
            <button class="close-btn" onclick="this.parentElement.style.display="none";">&times;</button>
        </div>';

echo'<script>
// If you want to make the close button functional
document.querySelector(".close-btn").addEventListener("click", function() {
  document.querySelector(".error-message").style.display = "none";
});
</script>';
}
?>
    <div class="signup-container">
        <h2 align="center">Signup to our website</h2><br>
        <form action="/login system/signup.php" method="post" class="signup-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirmPassword"
                    placeholder="Both passwords should match" required>
            </div>
            <button type="submit" class="signup-button">SignUp</button>
        </form>
    </div>
    
</body>
<style>
body,
html {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
}

.main-container {
    min-height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.signup-container {
    padding: 20px;
    background-color: #E6DAD7;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    width: 400px;
    margin: 50px auto;
}

.signup-form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

.signup-form label {
    display: block;
    margin-bottom: 5px;
}
.close-btn {
    color: #721c24;
    float: right;
    font-size: 1.5rem;
    line-height: 1;
    cursor: pointer;
    background: transparent;
    border: none;
}


.signup-form input[type="text"],
.signup-form input[type="password"],
.signup-form input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.signup-button {
    background-color: #5cb85c;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.signup-button:hover {
    background-color: #4cae
}
</style>

</html>