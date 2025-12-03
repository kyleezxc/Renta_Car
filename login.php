<?php
    session_start();
    include "config.php";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $usern = $_POST["user"];
        $passw = $_POST["pass"];
        $query = "select * from login where username = ? and password = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $usern, $passw);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows === 1){
            $row = $result->fetch_assoc();
            $_SESSION["admin"] = $row["username"];
            echo "<script>alert('Logged in successfully!');</script>";
            header("Location: dashboard.php");
            exit();
        }else{
            echo "<script>alert('Wrong credentials, try again!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RentaCar | Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <div id="login">
        <div class="container">
            <div class="login-container">
                <h2 class="login-header">Admin Login</h2>
                <br>
                <form class="login-form" method="POST">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Enter your username" id="user" name="user">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter your password" id="pass" name="pass">
                    <button type="submit" class="login-btn">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
