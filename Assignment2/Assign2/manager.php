<?php
    require_once("settings.php");
    session_start();

    // Check if the user is logged in, otherwise redirect them to the login page
    if (!isset($_SESSION["manager_id"])) {
        header("Location: manager_login.php");
        exit;
    }

    $conn = new mysqli(
        $host,
        $user,
        $pwd,
        $sql_db
    );

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $order_tb = "orders";

    // Sorting options
    if (isset($_POST["submit_sort"])) {
        $query = "SELECT * FROM $order_tb";

        if (isset($_POST["sortOption"])) {
            $sortOption = $_POST["sortOption"];

            if ($sortOption == "sortPending") {
                $query .= " WHERE order_status = 'PENDING'";
            }
            if ($sortOption == "sortName") {
                $query .= " ORDER BY first_name, last_name";
            }
            if ($sortOption == "sortCost") {
                $query .= " ORDER BY order_cost DESC";
            }
        }

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die(mysqli_error($conn));
        }
    } else {
        $query = "SELECT * FROM $order_tb";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die(mysqli_error($conn));
        }
    }
    // Search option
    // Search option for customer name
    if (isset($_POST["submit_search_name"])) {
        $searchName = $_POST["searchName"];

        // Split the search input into first name and last name (if available)
        $names = explode(" ", $searchName);
        $firstName = $names[0];
        $lastName = isset($names[1]) ? $names[1] : "";

        // Search the customer name in the table
        $query = "SELECT * FROM $order_tb WHERE first_name LIKE '%$firstName%' AND last_name LIKE '%$lastName%'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die(mysqli_error($conn));
        }
    }

    // Search option for product
    if (isset($_POST["submit_search_product"])) {
        $order_product = $_POST["order_product"];

        // Search the product in the table
        $query = "SELECT * FROM $order_tb WHERE order_product = '$order_product'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die(mysqli_error($conn));
        }
    }



    // Update order status if the form is submitted
    if (isset($_POST["update_status"])) {
        $order_id = $_POST["order_id"];
        if (isset($_POST["status"])) {
            $status = $_POST["status"];
        } else {
            $status = "PENDING"; 
        }

        $sql = "UPDATE $order_tb SET order_status='$status' WHERE order_id='$order_id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die(mysqli_error($conn));
        }
    }


    // Add new product if the form is submitted
    if (isset($_POST["submit"])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $quantity = $_POST["quantity"];
        $order_cost = $_POST["order_cost"];
        $order_product = $_POST["order_product"]; // Get the selected product

        $sql = "INSERT INTO $order_tb (first_name, last_name, quantity, order_cost, order_product) VALUES ('$first_name', '$last_name', '$quantity', '$order_cost', '$order_product')"; // Include the product in the query
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die(mysqli_error($conn));
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
        <meta name="description" content="Assignment 1 part 2" >
        <meta name="keywords" content="Assignment 1, cos10026, html, css, php, sql" >
        <meta name="author" content="Minh Kha, Thanh Minh" >
        <title>SE7EN | Manager</title>
    </head>
<body id="manager-page">
    <?php
      require_once 'menu.inc'; 
    ?>
    <div class="manager-container"> 
        <div class="container my-5">
            <h2 class="manager-report-heading">Create Manager Order</h2>
            <form method="post"> 
                <div class="input-group">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input name="first_name" type="text" class="form-control" id="first_name" placeholder="first name">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input name="last_name" type="text" class="form-control" id="last_name" placeholder="last name">
                </div>
                </div>
                <div class="input-group">
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input name="quantity" type="text" class="form-control" id="quantity" placeholder="Quantity">
                </div>
                </div>
                <div class="input-group">
                <div class="form-group">
                  <label for="order_cost">Order Cost</label>
                  <input name="order_cost" type="text" class="form-control" id="order_cost" placeholder="Order Cost">
                </div>
                </div>
                <div class="input-group">
                    <div class="form-group">
                        <label for="order_products">Product</label>
                        <select name="order_product" id="order_products" class="form-control">
                            <option class="option" value="Valorant">Valorant</option>
                            <option class="option" value="League of Legend">League of Legend</option>
                            <option class="option" value="EA SPORTS FIFA 23">EA SPORTS FIFA 23</option>
                        </select>
                    </div>
                </div>
                
                <div class="button-container">
                    <button type="submit" name="submit" class="btn btn-danger  outline-button">Add Order</button>
                </div>
            </form>
        </div>

                <div class="container">
            <h2 class="manager-report-heading">Manager Reports</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Date</th>
                        <th scope="col">Order Cost</th>
                        <th scope="col">Status</th>
                        <th scope="col">Function</th>
                    </tr>
                </thead>

                <?php
                    $sql = $query;
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $order_id = $row["order_id"];
                            $first_name = $row["first_name"];
                            $last_name = $row["last_name"];
                            $quantity = $row["quantity"];
                            $date = $row["order_time"];
                            $order_cost = $row["order_cost"];
                            $status = $row["order_status"];
                            $order_product = $row["order_product"]; // Fetch the order_product field
                
                            echo '<tr>
                                <th scope="row">' . $order_id . '</th>
                                <td>' . $first_name . ' ' . $last_name . '</td>
                                <td>' . $order_product . '</td> <!-- Display the product -->
                                <td>' . $quantity . '</td>
                                <td>' . $date . '</td>
                                <td>' . $order_cost . '</td>
                                <form method="post">
                                <td>
                                        <input type="hidden" name="order_id" value="' . $order_id . '">
                                        <select name="status" class="form-control">
                                            <option value="PENDING"' . ($status == "PENDING" ? " selected" : "") . '>Pending</option>
                                            <option value="FULFILLED"' . ($status == "FULFILLED" ? " selected" : "") . '>Fulfilled</option>
                                            <option value="PAID"' . ($status == "PAID" ? " selected" : "") . '>Paid</option>
                                            <option value="ARCHIVED"' . ($status == "ARCHIVED" ? " selected" : "") . '>Archived</option>
                                        </select>
                                </td>
                                <td>
                                        <button type="submit" name="update_status" class="btn btn-success">Update</button>
                                        <a class="btn btn-danger" href="delete.php?deleteid=' . $order_id . '">Delete</a>
                                </td>
                                </form>
                            </tr>';
                        }
                    }
                ?>
            </table>
        </div>


            <!-- Add radio buttons for sorting -->
            <div class="container my-4">
                <form method="post">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sortOption" id="sortPending" value="sortPending">
                        <label class="form-check-label" for="sortPending">Pending Orders</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sortOption" id="sortName" value="sortName">
                        <label class="form-check-label" for="sortName">Sort by Customer Name</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sortOption" id="sortCost" value="sortCost">
                        <label class="form-check-label" for="sortCost">Sort by Total Cost</label>
                    </div>
                    <br>
                    <button type="submit" name="submit_sort" class="btn btn-danger  outline-button">Sort</button>
                </form>
            </div>
            

            <!-- Add search form -->
            <div class="enquiry-container">
                <!-- not end yet -->
                <div class="row">
                    <div class="block">
                        <form method="post">  
                            <div class="row">
                                <div class="smallblock half-row">
                                    <label for="searchName" class="label">Search Customer Name:</label>
                                </div>
                                <div class="smallblock half-row"> 
                                    <input type="text" class="form-control" id="searchName" name="searchName" placeholder="Enter customer name">
                                </div>
                                <div class="block">
                                    <button type="submit" name="submit_search_name" class="btn btn-danger  outline-button">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="block">
                        <form method="post">
                            <div class="row">
                                <div class="smallblock half-row"> 
                                    <label for="order_product" class="label">Product: </label>
                                </div>
                                <div class="smallblock half-row"> 
                                    <select name="order_product" id="order_product" class="form-control">
                                        <option class="option" value="">Select to sort</option>
                                        <option class="option" value="Valorant">Valorant</option>
                                        <option class="option" value="League of Legend">League of Legend</option>
                                        <option class="option" value="EA SPORTS FIFA 23">EA SPORTS FIFA 23</option>
                                    </select>
                                </div>
                                <div class="block">
                                    <button type="submit" name="submit_search_product" class="btn btn-danger  outline-button">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- </div> -->
        

                <div class="container my-5">
                    <h2 class="manager-report-heading">Advance Manager Reports</h2>

                 	<div class="section_fix">
                      <!-- Display the most popular customer -->
                        <h3 class="manager-report-subheading">The most popular customer is: </h3>
                        <br>
                        <?php
                        // Query to find the most popular customer based on the total quantity of orders
                        $sql_most_popular = "SELECT first_name, last_name, SUM(quantity) as total_quantity FROM $order_tb GROUP BY first_name, last_name ORDER BY total_quantity DESC LIMIT 1";
                        $result_most_popular = mysqli_query($conn, $sql_most_popular);

                        // If the query is successful, display the most popular customer
                        if($result_most_popular){
                            $row_most_popular = mysqli_fetch_assoc($result_most_popular);
                            echo "Most popular customer: " . $row_most_popular['first_name'] . " " . $row_most_popular['last_name'] . " with " . $row_most_popular['total_quantity'] . " orders.";
                        }
                        ?>
                        <br>
                	</div>



            	   <div class="section_fix">
                        <!-- Display the fulfilled orders between 2 days -->
                        <h3 class="manager-report-subheading" id="mhead">The fulfilled orders between 2 days are:</h3>      
                        <div class="row"> 
                            <div class="block">
                                <form method="post">
                                    <div class="row">
                                        <div class="smallblock half-row">
                                            <label class="mcenter" id="mcenter" for="start_date">Start Date:</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date">
                                        </div>
                                        <div class="smallblock half-row">
                                            <label class="mcenter" for="end_date">End Date:</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date">
                                        </div>

                                        <div class="block">
                                            <button type="submit" name="submit_dates" class="btn btn-danger  outline-button">Submit</button>
                                        </div>        
                                    </div>

                                </form>
                            </div>
                        </div>

                        <?php
                            // When the date range form is submitted
                            if (isset($_POST['submit_dates'])) {
                              $start_date = $_POST['start_date'];
                              $end_date = $_POST['end_date'];
                          
                              // Query to find fulfilled orders between the start and end dates
                              $sql_fulfilled_orders = "SELECT * FROM $order_tb WHERE order_status='FULFILLED' AND order_time BETWEEN '$start_date' AND '$end_date'";
                              $result_fulfilled_orders = mysqli_query($conn, $sql_fulfilled_orders);
                          
                              // If the query is successful, display the list of fulfilled orders
                              if ($result_fulfilled_orders) {
                                  echo "<h4>Fulfilled Orders Between " . $start_date . " and " . $end_date . ":</h4>";
                                  echo "<ul>";
                                  while ($row_fulfilled_orders = mysqli_fetch_assoc($result_fulfilled_orders)) {
                                      echo "<li>Order ID: " . $row_fulfilled_orders['order_id'] . ", Customer Name: " . $row_fulfilled_orders['first_name'] . " " . $row_fulfilled_orders['last_name'] . ", Quantity: " . $row_fulfilled_orders['quantity'] . ", Order Cost: " . $row_fulfilled_orders['order_cost'] . ", Order Status: " . $row_fulfilled_orders['order_status'] . "</li>";
                                  }
                                  echo "</ul>";
                              }
                            }
                        ?>
    	           </div>
    		
                    <div class="section_fix">
                        <!-- Display the average number of orders per day -->
                        <h3 class="manager-report-subheading">Average Number of Orders Per Day:</h3>
                        <?php
                            // Query to calculate the average number of orders per day
                            $sql_avg_orders = "SELECT AVG(order_count) as avg_orders FROM (SELECT COUNT(*) as order_count FROM $order_tb GROUP BY DATE(order_time)) subquery";
                            $result_avg_orders = mysqli_query($conn, $sql_avg_orders);
                            // If the query is successful, display the average number of orders per day
                            if ($result_avg_orders) {
                                $row_avg_orders = mysqli_fetch_assoc($result_avg_orders);
                                echo "Average number of orders per day: " . round($row_avg_orders['avg_orders'], 2);
                            }
                        ?>
                        <br>
                        <br>
                    </div>
                    <!-- Log out -->
                    <div class="block"> 
                        <a href="manager_logout.php" class="btn btn-danger  outline-button">Logout</a>
                    </div>
                </div>
            </div>

        <?php
          require_once 'footer.inc'; 
        ?>
    </div>

    </body>
</html>
