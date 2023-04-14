<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta name="description" content="Assignment 1 part 2" >
    <meta name="keywords" content="Assignment 1, cos10026, html, css, php, sql" >
    <meta name="author" content="Thanh Minh" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet" href="styles/style.css" >
    <title>SE7EN | Payment</title>
  </head>
  <body id="enquiry">
  <?php 
    session_set_cookie_params(5000);
    session_start();
    if (isset($_POST['submit'])) {
      $_SESSION['firstname'] = $_POST['FirstName'];
      $_SESSION['lastname'] = $_POST['LastName'];
      $_SESSION['telephone'] = $_POST['Telephone'];
      $_SESSION['email'] = $_POST['Email'];
      $_SESSION['street'] = $_POST['Street'];
      $_SESSION['town'] = $_POST['Town'];
      $_SESSION['state'] = $_POST['State'];
      $_SESSION['pcode'] = $_POST['Postcode'];
      if (isset($_POST['prefer'])){
        $_SESSION['pcontact'] = $_POST['prefer'];
      } 
      $_SESSION['product'] = $_POST['Product'];

      // $features = array();
      // if (isset($_POST["Storyline"])) $features[] = "storyline";
      // if (isset($_POST["Rewards"])) $features[] = "rewards";
      // if (isset($_POST["Strategy"])) $features[] = "strategy";
      // if (isset($_POST["Others"])) $features[] = "others";
      // $features_string = implode(",",$features);
      // $_SESSION['features'] = $features_string;

      if(isset($_POST['Feature'] )) {
        foreach ( $_POST['Feature'] as $value) {
          $_SESSION['feature'] = $value;
        }
      }
      
      $_SESSION['transaction'] = $_POST['transaction-type'];
      $_SESSION['days'] = $_POST['days'];
      $_SESSION['totalcost'] = $_POST['Total_Cost'];
      $_SESSION['quantity'] = $_POST['Quantity'];
      $_SESSION['price'] = $_POST['Price'];
      $_SESSION['question'] = $_POST['Comment'];
      
    }
  ?>

    <?php if (isset($_POST['submit'])) { ?>
    <div class="enquiry-container">
      <article class="bigblock bigblockstyle">
        <div class="enquiry-container">
          <header class="enquiry-header">
            <h1 id="enquiry-header">Payment Form</h1>
          </header>

          <div class="row">
            <div class="block">
              <form method="post" action="fix_order.php" id="enquiry-form" novalidate>
                <div class="row">
                  
                  <!--start of payment details -->
                  <div class="block">
                    <fieldset class="fieldset">
                      <legend id="enquiry-legend">Payment details</legend>
                      <div class="block">
                        <div class="fieldsetcontent half-row">
                          <label class="label" for="product">Card Type</label>
                        </div>
                        <div class="fieldsetcontent half-row">
                          <select name="cardType" id="cardtype" required >
                            <option class="option" value="">Select Card Type</option>
                            <option class="option" value="Visa">Visa</option>
                            <option class="option" value="MasterCard">MasterCard</option>
                            <option class="option" value="American_Express">American Express</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="block">
                        <div class="fieldsetcontent half-row">
                          <label class="label" for="cardname">Full Name</label>
                          <input type="text" id="cardname" name="cardName" placeholder="Full Name on Card" >
                        </div>
                        <div class="fieldsetcontent half-row">
                          <label class="label" for="cardnum">Card Number</label>
                          <input type="text" id="cardnum" name="cardNumber" placeholder="Full Card Number" >
                        </div>
                      </div>
                      <div class="block">
                        <div class="fieldsetcontent half-row">
                          <label class="label" for="expiryday">Expiry day</label>
                          <input type="text" id="expiryday" name="expiryday" maxlength="10" placeholder="Expiry MM/YY" >
                        </div>
                        <div class="fieldsetcontent half-row">
                          <label class="label" for="verival">Verification Value</label>
                          <input type="text" id="verival" name="verival" placeholder="CVV" >
                        </div>
                        <div class="block">
                          <button id="enquiry-button" type="submit" form="enquiry-form" value="Check">Check out</button>
                        </div>
                      </div>
                    </fieldset>
                  </div>
                  <!--end of payment details-->
                </div>
              </form>
            </div>
          </div>
        </div>
      </article>
    </div>
  <?php } else { 
        header('Location: enquire.php');
         exit();
     } ?>
  </body>
</html>
