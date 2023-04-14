<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Creating Wb Applications Lab 10">
        <meta name="keywords" content="PHP, MySql">
        <title>Retrieving records to HTML</title>
    </head>
    <body>
        <h1>Creating Web Applications - Lab10</h1>
        <?php 
            require_once("settings.php"); //connect info
            $conn = @mysqli_connect($host,
            $user, 
            $pwd,
            $sql_db
            );
            //checks if connection is successful
            if (!$conn) {
                echo "<p>Database connection failure</p>"; // not in the production script
            } else {
                // upon successful connection
                $sql_table="cars";
                //set up the SQL command to query or add data in to the table
                $query = "SELECT make, model, price FROM $sql_table ORDER BY make, model";
                //execute the query and store result into the result pointer
                $result = mysqli_query($conn, $query);
                //check if the execution was successful
                if (!$result) {
                    echo "<p>Something is wrong with ", $query, " </p>";
                } else {
                    //display the retrieved records
                    echo "<table border=\"1\">\n";
                    echo "<tr>\n "
                        ."<th scope=\"col\">Make</th>\n "
                        ."<th scope=\"col\">Model</th>\n "
                        ."<th scope=\"col\">Price</th>\n "
                        ."</tr>\n";
                    //retrieve the current record pointed by the result pointer 
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>\n ";
                        echo "<td>", $row["make"], "</td>\n";
                        echo "<td>", $row["model"], "</td>\n";
                        echo "<td>", $row["price"], "</td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n ";
                    //frees up the memory , after using the result pointer 
                    mysqli_free_result($result);
                }// if success full query operation
                // close the database connection
                mysqli_close($conn);
            } // if successful database connection
        ?>
    </body>
</html>
