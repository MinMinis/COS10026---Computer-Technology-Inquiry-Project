<!-- manager_register.php -->
<?php
include("settings.php");

if (isset($_POST["register"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Check if the username already exists
    $check_username = "SELECT * FROM $login_tb WHERE username = '$username'";
    $result = mysqli_query($conn, $check_username);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username already exists!";
    } else {
        // Password rule: At least 8 characters, 1 uppercase, 1 lowercase, and 1 number
        $password_rule = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

        if (preg_match($password_rule, $password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO $login_tb (username, password) VALUES ('$username', '$hashed_password')";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die(mysqli_error($conn));
            } else {
                $success = "Manager registered successfully!";
            }
        } else {
            $error = "Password must be at least 8 characters, with 1 uppercase, 1 lowercase, and 1 number.";
        }
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
    <title>Manager Registration</title>
</head>
<body id="manager-page">
    <?php   
      include("menu.inc"); 
    ?>
    <div class="container">
        <h2 class ="manager-report-heading">Manager Registration</h2>
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
                <a href="manager_login.php" class="btn btn-primary outline-button">Login</a>
                <a href="manager_registerer.php" class="btn btn-secondary outline-button">Register</a>
            </div>
        </form>
        <?php
        if (isset($error)) {
            echo "<div class='alert alert-danger mt-3'>$error</div>";
        }
        if (isset($success)) {
            echo "<div class='alert alert-success mt-3'>$success</div>";
        }
        ?>
    </div>
    <?php
      include("footer.inc"); 
    ?>
</body>
</html>
