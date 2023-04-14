<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Creating Wb Applications Lab 10">
        <meta name="keywords" content="PHP, MySql">
        <title>Add records to database</title>
    </head>
    <body>
        <?php
            require_once("settings.php");
            $conn = @mysqli_connect($host,
            $user, 
            $pwd,
            $sql_db
            );
            if (!$conn) {
                //display error message
                echo "<p>Database connection failure</p>";
            } else {
                // upon successful connection
                $sql_table="cars";
                $make = trim(htmlspecialchars($_POST["carmake"]));
                $model = trim(htmlspecialchars($_POST["carmodel"]));
                $price = trim(htmlspecialchars($_POST["price"]));
                $yom = trim(htmlspecialchars($_POST["yom"]));
                
                // Check if all fields have values
                if(empty($make) || empty($model) || empty($price) || empty($yom)) {
                    echo "<p class=\"wrong\">Please fill in all fields</p>";
                } else {
                    //set up the SQL command to query or add data in to the table
                    $query = "INSERT INTO $sql_table (make, model, price, yom) VALUES ('$make', '$model', '$price', '$yom')";
                    //execute the query and store result into the result pointer
                    // check to see the database exist first
                    $result = mysqli_query($conn, $query);
                    //checks if the execution was successful
                    if (!$result) {
                        echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
                        //would not show in production script
                    } else {
                        //display on operation successful message 
                        echo "<p class=\"ok\">Successfully added New Car record</p>";
                    } // if successful query connection
                }
                //close the database connection
                mysqli_close($conn);    
            }// if successful database connection
        ?>
    </body>
</html>
