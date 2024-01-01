<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "Select * from user where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location: welcome.php");
    }
    else{
        $showError = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Form</title>
  </head>
  <body>
    <?php require 'partials/nav.php' ?>
    <?php
    if($login){
    echo ' <div class="alert alert-success" role="alert">
        <strong>Success!</strong> You have logged in successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
        <div class="signup-container">
            <h2 align="center">Login to our website</h2><br>
            <form action="/login system/login.php" method="post" class="signup-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"required>
                </div>
                <button type="submit" class="signup-button">Login</button>
            </form>
        </div>
    </body>
    <style>
        body, html {
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
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
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

    .signup-form input[type="text"], .signup-form input[type="password"], .signup-form input[type="email"] {
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