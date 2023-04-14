<!-- manager_login.php -->
<?php
require_once("settings.php");

$conn = new mysqli(
    $host,
    $user,
    $pwd,
    $sql_db
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Redirect the user to manager.php if they are already logged in
if (isset($_SESSION["manager_id"])) {
    header("Location: manager.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"]; // Get the user input password

    $default_password = "password"; // Set the default password to "password"

    $sql = "SELECT * FROM $login_tb WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password == $default_password) { // Compare user input to the default password
            $_SESSION["manager_id"] = $row["id"];
            $_SESSION["manager_username"] = $row["username"];
            header("Location: manager.php");
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Invalid username or password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="styles/style.css">
    <title>Manager Login</title>
</head>
<body id="manager-page">
    <?php
      require_once 'menu.inc'; 
    ?>
    <div class="container">
        <h2 class="manager-report-heading">Manager Login</h2>
        <form method="post">
        <div class="input-group">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
        </div>
        <div class="input-group">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        
            <div class="button-container">
                <button type="submit" name="login" class="btn btn-primary outline-button">Login</button>
                <a href="manager_registerer.php" class="btn btn-secondary outline-button">Register</a>
            </div>
            
            <?php
        if (isset($error)) {
            echo "<div class='alert alert-danger mt-3'>$error</div>";
        }
        ?>
    </div>
    <?php
      require_once 'footer.inc'; 
    ?>
</body>
</html>

