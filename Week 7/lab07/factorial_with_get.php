<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 7</title>
</head>
<body>
    <?php
        include("mathfunctions.php") // make functions in the included file available
    ?>
    <h1>Factorial</h1>
    <?php
        if (isset($_GET["number"])) {  //check if the form data exists
            $num = $_GET["number"];    // obtain the form data
            if (isPositiveInteger($num)) {
                echo "<p>", $num, "! is ", factorial($num), ".</p>";
            } else {
                echo "<p>Please enter a positive integer.</p>";
            }
        }
        echo "<p><a href='factorial2.html'>Return to the Entry Pages</a></p>"
    ?>
    
</body>
</html>