<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}
echo '<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px 20px;
}
.navbar-brand {
    color: #fff;
    text-decoration: none;
    font-size: 1.5em;
}
.navbar-nav {
    list-style: none;
    display: flex;
}
.nav-item {
    padding: 0 10px;
}
.nav-link {
    color: #9d9d9d;
    text-decoration: none;
    padding: 5px 10px;
    transition: color 0.3s;
}
.nav-link:hover, .nav-link:focus {
    color: #fff;
}
</style>
<nav class="navbar">
    <a href="#" class="navbar-brand">Code Crafters</a>
    <ul class="navbar-nav">
        <li class="nav-item"><a href="/login system/welcome.php" class="nav-link">Home</a></li>';
        if(!$loggedin){
        echo '<li class="nav-item"><a href="/login system/signup.php" class="nav-link">Signup</a></li>
        <li class="nav-item"><a href="/login system/login.php" class="nav-link">Login</a></li>';
        }
        if ($loggedin){
        echo '<li class="nav-item"><a href="/login system/login.php" class="nav-link">Logout</a></li>';
        }
    echo '</ul>
</nav>
</html>';
?> 