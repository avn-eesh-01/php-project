<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/dbconnect.php';
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Participation = $_POST["Participation"];
    $Course = $_POST["Course"];
    $Year = $_POST["Year"];
    $sql = "INSERT INTO `events` ( Name, Email, Participation, Course, Year) VALUES ('$Name','$Email','$Participation','$Course','$Year')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $showAlert = true;
    }
    else{
        $showError = "Invalid Credentials";
    }
    if($showAlert){
    echo '<div class="success-message" style="color: green; background-color: #D4EDDA; border-color: #C3E6CB; padding: 10px; margin: 10px 0; border: 1px solid transparent; border-radius: 4px;">
            <strong>Success!</strong> Your entry has been recorded.
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
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Event Registration Form</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #1e1e1e; /* Dark background */
    color: #fff; /* Light text for contrast */
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column; /* Stack elements vertically */
    justify-content: flex-start; /* Align to the top */
    height: 100vh;
    }

    .main-container {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .signup-container {
    background-color: #6F7077; /* Light gray background */
    padding: 20px; /* Adds space around the content */
    margin: 50px auto; /* Centers the box */
    width: 60%; /* Adjust width as needed */
    border-radius: 10px; /* Optional: for rounded corners */
    }

    .signup-form {
    display: flex;
    flex-direction: column;
    
    }

    .form-group {
    margin-bottom: 15px;
    }

    label {
        display:inline-block;
        margin-bottom: 5px;
    }

    input[type="text"], input[type="number"], input[type="email"], option, select {
    width: 80%; /* Set uniform width */
    margin: 0; /* Center elements */
    display: block; /* Block display */
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #3e3e3e;
    color: #fff;
    align-items: center;
    align-self: center;
    }
    .btn {
    background-color: #4CAF50; /* Green background */
    color: white;
    padding: 15px 32px; /* Larger padding */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px; /* Larger font size */
    margin: 35px 2px;
    cursor: pointer;
    border: none;
    border-radius: 4px; /* Rounded corners */
    width: 50%; /* Set width to 100% */
    align-items: center;
    align-self: center;
    }
    .btn:hover {
        background-color: #4cae
    }
    p{
        margin-top:10px;
    }
    .close-btn {
    color: black;
    float: right;
    font-size: 1.5rem;
    line-height: 1;
    cursor: pointer;
    background: transparent;
    border: none;
}
    </style>
</head>
<body>
<?php require 'partials/nav.php' ?>
<div>
    <div class="main-container">
        <div class="signup-container">
            <form action="events.php" class="signup-form" method="post">
                <h2 align=center>Event Regitration Form</h2>
                <p align="center">Fill in your details to register for the event</p>
                <label for="Name">Name:</label>
                <input type="text" id="name" name="Name" required>

                <label for="Email">Email:</label>
                <input type="email" id="email" name="Email" required>

                <label for="Participation">Participation</label>
                <select id="Participation" name="Participation">
                    <option value="workshop">GSOC Workshop</option>
                    <option value="hackathon">Hackathon</option>
                    <option value="treasure_hunt">Treasure hunt</option>
                    <option value="code_relay">Code Relay</option>
                </select>
                </select>

                <label for="course">Course</label>
                <input type="text" id="course" name="Course" required>

                <label for="year" min="1" max="4">Year</label>
                <input type="number" id="year" name="Year" required>

                <input type="submit" class="btn" value="Register Now">
            </form>
        </div>
    </div>
</div>

</body>
</html>
