<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div>
        <video autoplay muted loop id="myVideo">
            <source src="background.mp4" type="video/mp4">
        </video>
    </div>
    <div class="main">
        <div class="content">
            <h1 align=center><strong>Welcome to Code Crafters</strong></h1>
            <p align="center"> You are logged in as <?php echo $_SESSION['username']?>.</p>
            <hr>
            <p align=center>Whenever you need to, be sure to logout <a href="/login system/login.php" class="logout-link">using this link</a>.</p>
            <button class="event" onclick="location.href='/login system/events.php'"> Click here to register for an event.</button>


        </div>
    </div>
    <?php require 'partials/style.php' ?>

</body>
</html>
<style>
    body {
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    background-color: #f4f4f4;
}
.main{
    display: flex;
    justify-content: center;
    align-items: center;
}
#myVideo {
  position: fixed;
  margin-top: 48px;
  min-width: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  color: #f1f1f1;
  width: 50%;
  margin:150px;
  padding: 20px;
}
.content h2 {
    color: #f4f4f4;
    margin-top: 50px;
}
.content h1 {
    color: #f4f4f4;
    margin-top: 10px;
    margin-bottom: 20px;
}
.content p {
    margin: 10px;
    color: #f4f4f4;
    align-items: center;
}

.content hr {
    border: 0;
    border-bottom: 1px solid #006600;
    margin-top: 10px;
    margin-bottom: 20px;
}

.logout-link {
    color: #f4f4f4;
    font-weight: bold;
    text-decoration: none;
}
.event {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 8px 2px;
  cursor: pointer;
  margin-left:200px;
}
button:hover {
  opacity: 0.8;
}

.logout-link:hover {
    text-decoration: underline;
    color: blue;
}

</style>
