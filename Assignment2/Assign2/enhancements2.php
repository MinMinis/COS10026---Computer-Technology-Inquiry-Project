<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="description" content="Assignment 1 part 2" >
    <meta name="keywords" content="Assignment 1, cos10026, html, css, php, sql" >
    <meta name="author" content="Thanh Minh" >
    <title>SE7EN | Enhancements 2</title>
    <link rel="stylesheet" href="styles/style.css" >
  </head>
  <body>

    <?php 
      include_once 'menu.inc';
    ?>


    <div class="body-container">
      <h1 class="heading-pro enhancement-header">Enhancement Part 2</h1>

      <img src="images/x.png" class="x-img" id="x1" alt="X shape" >
      <img src="images/x.png" class="x-img" id="x2" alt="X shape" >
      <img src="images/x.png" class="x-img" id="x3" alt="X shape" >
      <img src="images/x.png" class="x-img" id="x4" alt="X shape" >
      <img src="images/x.png" class="x-img" id="x5" alt="X shape" >

      <img src="images/stop.png" class="stop-img" id="stop1" alt="Square shape">
      <img src="images/stop.png" class="stop-img" id="stop2" alt="Square shape">
      <img src="images/stop.png" class="stop-img" id="stop3" alt="Square shape">
      <img src="images/stop.png" class="stop-img" id="stop4" alt="Square shape">
      <img src="images/stop.png" class="stop-img" id="stop5" alt="Square shape">
      <img src="images/triangle.png" class="triangle-img" id="triangle1" alt="Triangle shape">
      <img src="images/triangle.png" class="triangle-img" id="triangle2" alt="Triangle shape">
      <img src="images/triangle.png" class="triangle-img" id="triangle3" alt="Triangle shape">
      <img src="images/triangle.png" class="triangle-img" id="triangle4" alt="Triangle shape">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle1" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle2" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle3" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle4" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle5" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle6" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle7" alt="Sparkle">
      <img src="images/record.png" class="record-img" id="record1" alt="Circle shape">
      <img src="images/record.png" class="record-img" id="record2" alt="Circle shape">
      <div class="item">
        <a href="manager_login.php" class="enhancement-name">Enhancement 1:</a>
        <div class="enhancement-text">
          <p>
            With the use of PHP and SQL to build up login feature. 
            It helps to enhance the security of the web pages, unauthorized users can't login to see the details of the records. 
            Without the correct <span>$_SESSION["manager_id"]</span>, the client will be directed back to the file manager_login.php to fill in the login details.
            If the client fill out the wrong details, the error will be displayed. 
            When the client log out, all the PHP code such as <span>session_unset()</span> and <span>session_destroy()</span>, the session data will be deleted and the client will be redirected to the login page.
          </p>
          <p>
            In the navigation bar, the default link will direct the user to the manager.php. After the authorized user have logged-in, then later on
            Whenever the user have gone to another page, the <span>$_SESSION['manager_id']</span> will keep storing the login details and the user won't need to login again
            unless they have signed out.
          </p>
          <p>
            The SQL technichs also are included in this feature so that the system will check one by one record of login details in the <span>managers</span>
            table. My teammate also create a register page for register for an account to access to the data. In this project, it is just a feature to test, when the project become realistic, there will be methods to 
            make a small ammount of numbers of authorized user to login to prevent the unauthorized user to access the personal details of the customers. 
          </p>
        </div>
        <img id="img-2" src="images/img2.png" alt="Gaming Figure" >
      </div>
      <div class="item">
        <a href="manager.php" class="enhancement-name">Enhancement 2:</a>
        <div class="enhancement-text">
          <p>
            There are 3 advanced tools have been implemented in the <span>manager.php</span> which are the customers buy the biggest ammount of product, 
            the fullfilled carts from range of days and the average number orders of product in a day. 
          </p>
          <p>
            With the use of <span>mysqli_query()</span> to login to the SQL database and submit the SQL query to the database, the result will be printed out by
            the <span>mysqli_fetch_assoc()</span> to loop one by one row to search for the best fit result. 
          </p>
          <p>
            For the find fullfilled orders from range of days, the authorized user need to enter the start day and the end day so that when the form is submitted
            and the <span>isset($_POST['submit_dates])</span> will check whenever the submit button is clicked or not then it can process the event for finding the suitable result.
            For the process event to take the information from the database, by using <span>mysqli_query()</span> and <span>mysqli_fetch_assoc()</span>.
          </p>
          <p>
            For the third one which is the calculate the averages of orders is a little different from above features because the <span>AVG()</span> is used to calculate the average of all the quantity of products in the database. 
          </p>
        </div>
      </div>
      <img id="img-1" src="images/img1.png" alt="Gaming Figure" >
    </div>

    <a href="enhancements.php" class="linkback">View Enhancements Assign 1 part 1</a>

    <?php include_once 'footer.inc';?>

  </body>
</html>
