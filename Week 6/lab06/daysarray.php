<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task 2: Experimenting on arrays</title>
    </head>
    <body>
        <h1>PHP Variables, Arrays, and Operators</h1>
        <?php 
            $days = array ("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"); // declare day array
            echo "<p>The Days of the week in English are:</p>";
            echo "<p>";
            for ($x = 0; $x < count($days); $x++) { // count = length of the array, loop 
                if ($x == count($days)-1) { 
                    echo "$days[$x].";
                }
                else 
                {
                    echo "$days[$x], ";
                }
            }
            echo "</p>";
            $days[0] =  "Dimanche";
            $days[1] =  "Lundi";
            $days[2] =  "Mardi";
            $days[3] =  "Mercredi";
            $days[4] =  "Jeudi";
            $days[5] =  "Vendredi";
            $days[6] =  "Samedi";
            echo "<p>The Days of the week in French are:</p>";
            echo "<p>";
            for ($x = 0; $x < count($days); $x++) { // count = length of the array, loop 
                if ($x == count($days)-1) { 
                    echo "$days[$x].";
                }
                else 
                {
                    echo "$days[$x], ";
                }
            }
        ?>
    </body>
</html>