<?php
	require_once("process_order.php");
	require_once("menu.inc");
?>
<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update $_SESSION['firstname'] if the field was submitted with a value
    if (!empty($_POST['FirstName'])) {
        $_SESSION['firstname'] = $_POST['FirstName'];
    }

    // Update $_SESSION['lastname'] if the field was submitted with a value
    if (!empty($_POST['LastName'])) {
        $_SESSION['lastname'] = $_POST['LastName'];
    }

    // Update $_SESSION['telephone'] if the field was submitted with a value
    if (!empty($_POST['Telephone'])) {
      $_SESSION['telephone'] = $_POST['Telephone'];
  }

// Update $_SESSION['email'] if the email field was submitted with a value
if (!empty($_POST['Email'])) {
    $_SESSION['email'] = $_POST['Email'];
}

// Update $_SESSION['street'] if the street field was submitted with a value
if (!empty($_POST['Street'])) {
    $_SESSION['street'] = $_POST['Street'];
}

// Update $_SESSION['town'] if the town field was submitted with a value
if (!empty($_POST['Town'])) {
    $_SESSION['town'] = $_POST['Town'];
}

// Update $_SESSION['state'] if the state field was submitted with a value
if (!empty($_POST['State'])) {
    $_SESSION['state'] = $_POST['State'];
}

// Update $_SESSION['pcode'] if the postcode field was submitted with a value
if (!empty($_POST['Postcode'])) {
    $_SESSION['pcode'] = $_POST['Postcode'];
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/style.css">
	<title>Fix order</title>
</head>
<body id="enquiry">
	<div id="enquiry-flow">
      <div class="enquiry-container">
        <article class="bigblock bigblockstyle">
          <div class="enquiry-container">
            <header class="enquiry-header">
              <h1 id="enquiry-header">Enquiry Form</h1>
            </header>
            <div class="row">
              <div class="block">
                <form method="post" action="fix_order.php" id="enquiry-form" novalidate>
                  <div class="row">
                    <!--start of firstname -->
                    <div class="smallblock half-row">
                      <label class="label" for="fname">First Name</label>
                      <input type="text" id="fname" name="FirstName" placeholder="Anh" value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : ''; ?>">
                      <?php
                      echo (!empty($errMsg['FirstName']['required'])) ? $errMsg['FirstName']['required'] : false;
                      echo (!empty($errMsg['FirstName']['format'])) ? $errMsg['FirstName']['format'] : false; 
                      ?>
                    </div>
                    
                    <!--end of firstname-->
                    <!--start of lastname-->
                    <div class="smallblock half-row">
                      <label class="label" for="lname">Last Name</label>
                      <input type="text" id="lname" name="LastName" maxlength="25" placeholder="Nguyen Van" value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';?>">
                      <?php
                          echo (!empty ($errMsg['LastName']['required'])) ? $errMsg['LastName']['required'] : false;

                          echo (!empty ($errMsg['LastName']['format'])) ? $errMsg['LastName']['format']: false;
                      ?>
                    </div>
                    <!--end of lastname-->
                    <!--start of telephone-->
                    <div class="smallblock half-row">
                      <label class="label" for="telephone">Telephone</label>
                      <input type="text" id="telephone" placeholder="123-456-789" name="Telephone" title="0-10 digits of your phone number" value="<?php echo isset($_SESSION['telephone']) ? $_SESSION['telephone'] : ''; ?>" >
                      <?php
                          echo (!empty ($errMsg['Telephone']['required'])) ? $errMsg['Telephone']['required'] : false;

                          echo (!empty ($errMsg['Telephone']['format'])) ? $errMsg['Telephone']['format']: false;
                      ?>
                    </div>
                    <!--end of telephone-->
                    <!--start of email-->
                    <div class="smallblock half-row">
                      <label class="label" for="email">Email</label>
                      <input type="email" id="email" name="Email" placeholder="name@domain.com" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                      <?php
                          echo (!empty ($errMsg['Email']['required'])) ? $errMsg['Email']['required'] : false;

                          echo (!empty ($errMsg['Email']['valid'])) ? $errMsg['Email']['valid']: false;
                      ?>
                    </div>
                    <!--end of email-->
                    <!--start of fieldset-->
                    <div class="block">
                      <fieldset class="fieldset">
                        <legend id="enquiry-legend">Address</legend>
                        <div class="block">
                          <!--start of street-->
                          <div class="fieldsetcontent half-row">
                            <label class="label" for="street">Street</label>
                            <input type="text" id="street" name="Street" maxlength="40" placeholder="Bach Dang st" value="<?php echo isset($_SESSION['street']) ? $_SESSION['street'] : ''; ?>" >
                            <?php
                                echo (!empty ($errMsg['Street']['required'])) ? $errMsg['Street']['required'] : false;

                                echo (!empty ($errMsg['Street']['format'])) ? $errMsg['Street']['format']: false;
                            ?>
                          </div>
                          <!--end of street-->
                          <!--start of town-->
                          <div class="fieldsetcontent half-row">
                            <label class="label" for="town">Suburb/Town</label>
                            <input type="text" id="town" name="Town" maxlength="20" placeholder="Town/Suburb" value="<?php echo isset($_SESSION['town']) ? $_SESSION['town'] : ''; ?>">
                            <?php
                                echo (!empty ($errMsg['Town']['required'])) ? $errMsg['Town']['required'] : false;

                                echo (!empty ($errMsg['Town']['format'])) ? $errMsg['Town']['format']: false;
                            ?>
                          </div>
                          <!--end of town-->
                        </div>
                        <!--Start of select for state-->
                        <div class="block">
                          <div class="fieldsetcontent half-row">
                            <label class="label" for="state">State</label>
                            <select name="State" id="state" >
                              <option class="option" value="">Please select your State</option>
                              <?php
                                $selected_state = isset($_SESSION['state']) ? $_SESSION['state'] : false;
                                $states = array("NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT");
                                foreach ($states as $state) {
                                  $selected = ($state == $selected_state) ? 'selected' : false;
                                  echo "<option class='option' value='$state' $selected>$state</option>";
                                }
                              ?>
                              </select>
                              <?php
                                echo (!empty ($errMsg['State']['required'])) ? $errMsg['State']['required'] : false;
                              ?>
                          </div>
                          <!--end of select for state-->
                          <!--Start of postcode -->
                          <div class="fieldsetcontent half-row">
                            <label class="label" for="postcode">Postcode</label>
                            <input  type="text" id="postcode" name="Postcode" placeholder="1234" title="Exactly 4 digits" value="<?php echo (!empty($_SESSION['pcode'])) ? $_SESSION['pcode']:false ?>">
                            <?php
                                echo (!empty ($errMsg['Postcode']['required'])) ? $errMsg['Postcode']['required'] : false;

                                echo (!empty ($errMsg['Postcode']['format'])) ? $errMsg['Postcode']['format']: false;
                            ?>
                          </div>
                          <!--end of postcode-->
                        </div>
                      </fieldset>
                    </div>
                    <!--end of fieldset-->
                    <!--start of Preferred contact-->
                    <div class="smallblock half-row">
                      <label class="label" id="prefer-contact">Preferred Contact</label>
                    </div>
                    <div class="smallblock half-row">
                    <input type="radio" class="radio-contact" id="pemail" value="Email" <?php echo ($_SESSION['pcontact'] == "Email") ? 'checked' : ''; ?> name="prefer">
                      <label class="label" for="pemail">Email</label>
                      <input type="radio" class="radio-contact" id="ptele" value="Telephone" <?php echo ($_SESSION['pcontact'] == "Telephone") ? 'checked' : ''; ?> name="prefer">
                      <label class="label" for="ptele">Telephone</label>
                      <input type="radio" class="radio-contact" id="ppost" value="Post" <?php echo ($_SESSION['pcontact'] == "Post") ? 'checked' : ''; ?> name="prefer">
                      <label class="label" for="ppost">Post</label>
                    </div>
                    <!--end of preferred contact-->
                    <!--start of product-->
                    <div class="smallblock half-row">
                      <label class="label" for="product">Product</label>
                    </div>
                    <div class="smallblock half-row">
                      <select name="Product" id="product" onchange="updateProductCost()">
                        <option class="option" value="">Select Product</option>
                        <option class="option" id="fifa" value="EA SPORTS FIFA 23" <?php echo ($_SESSION['product'] == "EA SPORTS FIFA 23") ? 'selected' : ''; ?>>EA SPORTS FIFA 23</option>
                        <option class="option" id="lol" value="League of Legends" <?php echo ($_SESSION['product'] == "League of Legends") ? 'selected' : ''; ?>>League of Legends</option>
                        <option class="option" id="valorant" value="Valorant" <?php echo ($_SESSION['product'] == "Valorant") ? 'selected' : ''; ?>>Valorant</option>
                      </select>
                    </div>
                    <!--end of product-->

                    <!----------------------------TEST
                    ?php 
                    $features = $_SESSION['features'];
                    foreach($features as $feature){
                      if($feature == "Storyline"){
                          $option1 = true;
                      }
                      if($feature == "Rewards"){
                          $option2 = true;
                      }
                      if($feature == "Strategy"){
                          $option3 = true;
                      }
                      if($feature == "Others"){
                          $option4 = true;
                      }
                    } ?>
                    -------------->

                    <!--Product Features-->
                    <div class="smallblock half-row">
                      <label class="label">Product Features</label>
                    </div>
                    <div class="smallblock half-row">
                      <!-- empty block -->
                    </div>
                    <div class="smallblock half-row">
                      <label class="box">Storyline
                        <input type="checkbox" name="Feature[]" value="Storyline" class="checkbox" <?php if(isset($_POST['Feature']) && in_array('Storyline', $_POST['Feature'])) echo 'checked="checked"'; ?>>
                        <span class="checkmark"></span>
                      </label>
                      <label class="box">Rewards
                        <input type="checkbox" name="Feature[]" value="Rewards" class="checkbox" <?php if(isset($_POST['Feature']) && in_array('Rewards', $_POST['Feature'])) echo 'checked="checked"'; ?>>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="smallblock half-row">
                      <label class="box">Strategy
                        <input type="checkbox" name="Feature[]" value="Strategy" class="checkbox" <?php if(isset($_POST['Feature']) && in_array('Strategy', $_POST['Feature'])) echo 'checked="checked"'; ?>>
                        <span class="checkmark"></span>
                      </label>
                      <label class="box">Others
                        <input type="checkbox" name="Feature[]" value="Others" class="checkbox" checked>
                        <span class="checkmark"></span>
                      </label>
                    </div>

                    <div class="smallblock half-row">
                      <label class="label" for="transaction-type">Transaction Type</label>
                    </div>
                    <div class="smallblock half-row">
                      <select name="transaction-type" id="transaction-type" onchange="showFields()">
                        <option class="option" value="">Select what you want for the product</option>
                        <option class="option" value="hire" <?php echo ($_SESSION['transaction'] == "hire") ? 'selected' : ''; ?>>Hire</option>
                        <option class="option" value="buy" <?php echo ($_SESSION['transaction'] == "buy") ? 'selected' : ''; ?>>Buy</option>
                      </select>
                    </div>

                    <!-- Table for the price of products -->
                    <div class="block">
                      <table class="price_announce">
                        <tr>
                          <td class="enquire-table"></td>
                          <td class="enquire-table">~ Buy ~<br>Price (per game)</td>
                          <td class="enquire-table">~ Hire ~<br>Cost (per day)</td>
                        </tr>
                        <tr>
                          <td class="enquire-table">EA SPORTS FIFA 23</td>
                          <td class="enquire-table">100$</td>
                          <td class="enquire-table">10$</td>
                        </tr>
                        <tr>
                          <td class="enquire-table">League of Legend</td>
                          <td class="enquire-table">200$</td>
                          <td class="enquire-table">20$</td>
                        </tr>
                        <tr>
                          <td class="enquire-table">Valorant</td>
                          <td class="enquire-table">300$</td>
                          <td class="enquire-table">30$</td>
                        </tr>
                      </table>
                    </div>
                    <!-- end of table of price for products -->

                    <div class="smallblock half-row" id="hire-fields1">
                      <label class="label" for="days">Days:</label>
                      <input type="number" name="days" id="days" value='<?php echo isset($_SESSION['days']) ? $_SESSION['days'] : ''; ?>' onchange="calculateTotalCost()">
                    </div>
                    <div class="smallblock half-row" id="hire-fields2">
                      <label class="label" for="Total_Cost">Total Cost ($):</label>
                      <input type="number" name="Total_Cost" id="Total_Cost" value='<?php echo isset($_SESSION['totalcost']) ? $_SESSION['totalcost'] : ''; ?>' onchange="updateTotalCost()" readonly>
                    </div>

                    <div class="smallblock half-row" id="buy-fields1">
                    <label class="label" for="quantity">Quantity:</label>
                      <input type="number" name="Quantity" id="quantity" value='<?php echo isset($_SESSION['quantity']) ? $_SESSION['quantity'] : ''; ?>' onchange="calculatePrice()" >
                    </div>
                    <div class="smallblock half-row" id="buy-fields2">
                      <label class="label" for="Price">Price ($):</label>
                      <input type="number" name="Price" id="Price" value='<?php echo isset($_SESSION['price']) ? $_SESSION['price'] : ''; ?>' onchange="updatePrice()" readonly>
                    </div>
                    <!--Textarea-->
                    <div class="block">
                      <label for="question-comment" class="label">Enquiry Question</label>
                      <textarea name="Comment" id="question-comment" cols="20" rows="3" placeholder="Comment Field"></textarea>
                    </div>
                    <!--End of textarea-->

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
                          <input type="text" id="expiryday" name="Expiry_Day" maxlength="10" placeholder="Expiry MM/YY" >
                        </div>
                        <div class="fieldsetcontent half-row">
                          <label class="label" for="verival">Verification Value</label>
                          <input type="text" id="verival" name="Verification_Value" placeholder="CVV" >
                        </div>
                      </div>
                    </fieldset>
                  </div>
                    <!--Start of submit button-->
                    <div class="block">
                      <button id="enquiry-button" name="submit" type="submit" form="enquiry-form" value="Checkout">Submit</button>
                    </div>
                    <!--end of Submit button-->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>

    <!-- end of main content-->
    <script src="effects.js"></script>
    
    <?php
    require_once("footer.inc");
    ?>
    
</body>
</html>