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
                //set up the SQL command to query or add data into the table
                $query = "SELECT make, model, price, yom FROM $sql_table WHERE 1=1";

                if (empty($make) and empty($model) and empty($price) and empty($yom)){
                    echo "<p>You need to fill in at least 1 field</p>";
                } else {
                    if (!empty($make)) {
                        $query .= " AND make LIKE '$make%'";
                    }
                    if (!empty($model)) {
                        $query .= " AND model LIKE '$model%'";
                    }
                    if (!empty($price)) {
                        $query .= " AND price > $price";
                    }
                    if (!empty($yom)) {
                        $query .= " AND yom > $yom";
                    }
                    
                $query .= " ORDER BY make, model";
                //execute the query and store result into the result pointer
                // check to see the database exist first
                $result = mysqli_query($conn, $query);
                //checks if the execution was successful
                if (!$result) {
                    echo "<p>Something is wrong with ", $query, " </p>";
                } else {
                    //display the retrieved records
                    echo "<table border=\"1\">\n";
                    echo "<tr>\n "
                        ."<th scope=\"col\">Make</th>\n "
                        ."<th scope=\"col\">Model</th>\n "
                        ."<th scope=\"col\">Price</th>\n "
                        ."<th scope=\"col\">Yom</th>\n "
                        ."</tr>\n";
                    //retrieve the current record pointed by the result pointer 
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>\n ";
                        echo "<td>", $row["make"], "</td>\n";
                        echo "<td>", $row["model"], "</td>\n";
                        echo "<td>", $row["price"], "</td>\n";
                        echo "<td>", $row["yom"], "</td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n ";
                    //frees up the memory , after using the result pointer 
                    mysqli_free_result($result);
                }// if success full query operation
                //close the database connection
                mysqli_close($conn);    
                }
            }// if successful database connection


        ?>
    </body>
</html>