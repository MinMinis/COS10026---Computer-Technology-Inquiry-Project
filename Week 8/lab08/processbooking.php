<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Booking Confirmation</title>
</head>
    <body>
        <h1>Rohirrim Tour Booking Confirmation</h1>
        <!-- begin processing -->
        <?php
        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        // checks if process was triggered by a form submit, if not display an error message
        if (isset($_POST["firstname"])) {
            $firstname = $_POST["firstname"];
            $firstname = sanitise_input($firstname);
            if (isset($_POST["lastname"])) $lastname = $_POST["lastname"];
                $lastname = sanitise_input($lastname);
            if (isset($_POST["age"])) $age = $_POST["age"];
                $age = sanitise_input($age);
            if (isset($_POST["food"])) $food = $_POST["food"];
                $food = sanitise_input($food);
            if (isset($_POST["partySize"])) $partysize = $_POST["partySize"];
                $partysize = sanitise_input($partysize);
            if (isset($_POST["species"]))
            {
                $species = $_POST["species"];
                $species = sanitise_input($species);
            }
            else 
            {
                $species = "Unknown species";
            }
            $tour = "";
            if (isset($_POST["1day"])) $tour = $tour. "1day";
            if (isset($_POST["4day"])) $tour = $tour. "4day";
            if (isset($_POST["10day"])) $tour = $tour. "10day";

            $errMsg = ""; 
            if ($firstname == "") {
                $errMsg .= "<p>Your must enter your firstname.</p>";
            }
            else if (!preg_match("/^[a-zA-Z]*$/", $firstname)){
                $errMsg .= "<p>Only alpha letters allowed in your firstname.</p>";
            }
            if ($lastname == "") {
                $errMsg .= "<p>Your must enter your lastname.</p>";
            }
            if (is_numeric($age) != 1) {
                $errMsg .= "<p>Your age must be in numbers</p>";
            }
            if ($age < 11 or $age > 9999) {
                $errMsg .= "<p>Your age must be between 10 and 10000</p>";
            }
            else if (!preg_match("/^[a-zA-Z .-]*$/", $lastname)){
                $errMsg .= "<p>Only alpha letters allowed in your lastname.</p>";
            }
            if ($errMsg != "") {
                echo "<p>$errMsg</p>";
            }
            else {
                echo "<p>Welcome $firstname $lastname!<br>";
                echo "Your are now booked on the";
                switch ($tour) {
                    case "1day":
                        echo " 1 day tour";
                        break;
                    case "4day":
                        echo " 4 days tour";
                        break;
                    case "10day":
                        echo " 10 days tour";
                        break;
                    case "1day4day":
                        echo " 1 day and 4 days tours";
                        break;
                    case "4day10day":
                        echo " 4 days and 10 days tours";
                        break;
                    case "1day10day":
                        echo " 1 day and 10 days tour";
                        break;
                    case "1day4day10day":
                        echo " 1 day, 4 days and 10 days tour";
                        break;
                }
                echo "<br>";
                echo "Species: $species<br>";
                echo "Age: $age<br>";
                echo "Meal preference: $food<br>";
                echo "Number of travelers: $partysize</p>";
            }
        } 
        else
        {
            // display error message if process not triggered by a form submit
            header ("location: register.html");
        }
        ?>
    </body>
</html>