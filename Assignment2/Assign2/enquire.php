<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta name="description" content="Assignment 1 part 1" >
    <meta name="keywords" content="Assignment 1, cos10026, html, css" >
    <meta name="author" content="Thanh Minh" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet" href="styles/style.css" >

    <title>SE7EN | Enquire</title>
  </head>
  <body id="enquiry">

    <!--start of navbar-->
    <?php include_once 'menu.inc';?>
    <!--End of navbar-->

    <!--Start of main content-->
    <div id="enquiry-flow">
      <div class="enquiry-container">
        <article class="bigblock bigblockstyle">
          <div class="enquiry-container">
            <header class="enquiry-header">
              <h1 id="enquiry-header">Enquiry Form</h1>
            </header>
            <div class="row">
              <div class="block">
                <form method="post" action="payment.php" id="enquiry-form" novalidate>
                  <div class="row">
                    <!--start of firstname -->
                    <div class="smallblock half-row">
                      <label class="label" for="fname">First Name</label>
                      <input type="text" id="fname" name="FirstName" placeholder="FirstName" > 
                    </div>
                    <!--end of firstname-->
                    <!--start of lastname-->
                    <div class="smallblock half-row">
                      <label class="label" for="lname">Last Name</label>
                      <input type="text" id="lname" name="LastName" maxlength="25" placeholder="LastName" >
                    </div>
                    <!--end of lastname-->
                    <!--start of telephone-->
                    <div class="smallblock half-row">
                      <label class="label" for="telephone">Telephone</label>
                      <input type="text" id="telephone" placeholder="Telephone" name="Telephone" title="0-10 digits of your phone number" >
                    </div>
                    <!--end of telephone-->
                    <!--start of email-->
                    <div class="smallblock half-row">
                      <label class="label" for="email">Email</label>
                      <input type="email" id="email" name="Email" placeholder="name@domain.com" >
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
                            <input type="text" id="street" name="Street" maxlength="40" placeholder="Street" >
                          </div>
                          <!--end of street-->
                          <!--start of town-->
                          <div class="fieldsetcontent half-row">
                            <label class="label" for="town">Suburb/Town</label>
                            <input type="text" id="town" name="Town" maxlength="20" placeholder="Town/Suburb" >
                          </div>
                          <!--end of town-->
                        </div>
                        <!--Start of select for state-->
                        <div class="block">
                          <div class="fieldsetcontent half-row">
                            <label class="label">State</label>
                            <select name="State" id="state" >
                              <option class="option" value="">Please select your State</option>
                              <?php
                                $states = array("NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT");
                                foreach ($states as $state) {
                                  echo "<option class='option' value='$state'>$state</option>";
                                }
                              ?>
                            </select>
                          </div>
                          <!--end of select for state-->
                          <!--Start of postcode -->
                          <div class="fieldsetcontent half-row">
                            <label class="label" for="postcode">Postcode</label>
                            <input  type="text" id="postcode" name="Postcode" placeholder="Postcode" title="Exactly 4 digits" >
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
                      <input type="radio" class="radio-contact" id="pemail" value="Email" name="prefer">
                      <label class="label" for="pemail">Email</label>
                      <input type="radio" class="radio-contact" id="ptele" value="Telephone" name="prefer">
                      <label class="label" for="ptele">Telephone</label>
                      <input type="radio" class="radio-contact" id="ppost" value="Post" name="prefer">
                      <label class="label" for="ppost">Post</label>
                    </div>
                    <!--end of preferred contact-->
                    <!--start of product-->
                    <div class="smallblock half-row">
                      <label class="label" for="product">Product</label>
                    </div>
                    <div class="smallblock half-row">
                      <select name="Product" id="product" onchange="updateProductCost()" >
                        <option class="option" value="">Select Product</option>
                        <option class="option" id="fifa" value="EA SPORTS FIFA 23">EA SPORTS FIFA 23</option>
                        <option class="option" id="lol" value="League of Legends">League of Legends</option>
                        <option class="option" id="valorant" value="Valorant">Valorant</option>
                      </select>
                    </div>
                    <!--end of product-->


                    <!--Product Features-->
                    <div class="smallblock half-row">
                      <label class="label">Product Features</label>
                    </div>
                    <div class="smallblock half-row">
                    <!-- empty block -->
                    </div>
                    <div class="smallblock half-row">
                      <label class="box">Storyline
                        <input type="checkbox" name="Feature[]" value="Storyline" class="checkbox">
                        <span class="checkmark"></span>
                      </label>
                      <label class="box">Rewards
                        <input type="checkbox" name="Feature[]" value="Rewards" class="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="smallblock half-row">
                      <label class="box">Strategy
                        <input type="checkbox" name="Feature[]" value="Strategy" class="checkbox">
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
                        <option class="option" value="hire">Hire</option>
                        <option class="option" value="buy">Buy</option>
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
                      <input type="number" name="days" id="days" onchange="calculateTotalCost()">
                    </div>
                    <div class="smallblock half-row" id="hire-fields2">
                      <label class="label" for="Total_Cost">Total Cost ($):</label>
                      <input type="number" name="Total_Cost" id="Total_Cost" onchange="updateTotalCost()" readonly>
                    </div>

                    <div class="smallblock half-row" id="buy-fields1">
                    <label class="label" for="quantity">Quantity:</label>
                      <input type="number" name="Quantity" id="quantity" onchange="calculatePrice()" >
                    </div>
                    <div class="smallblock half-row" id="buy-fields2">
                      <label class="label" for="Price">Price ($):</label>
                      <input type="number" name="Price" id="Price" onchange="updatePrice()" readonly>
                    </div>
                    <!--Textarea-->
                    <div class="block">
                      <label for="question-comment" class="label">Enquiry Question</label>
                      <textarea name="Comment" id="question-comment" cols="20" rows="3" placeholder="Comment Field"></textarea>
                    </div>
                    <!--End of textarea-->

                    <!--Start of submit button-->
                    <div class="block">
                      <button id="enquiry-button" name="submit" type="submit" form="enquiry-form" value="Checkout">Submit</button>
                    </div>
                    <!--end of Submit button-->
                    <div class="block">
                      <p>Copyright &#169;:
                        <a href="https://uiverse.io/Navarog21/loud-bird-67">Button</a>
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </article>
      </div>
      <?php 
        include_once 'footer.inc';
      ?>
    </div>
    <!--end of main content-->
    <script src="effects.js"></script>
  </body>
</html>
