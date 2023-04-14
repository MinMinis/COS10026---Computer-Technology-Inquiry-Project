<?php
    //-----------------------------------------SANITISE INPUT-----------------------------------------
    function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    session_start();
    $firstname = "";
    if(isset($_SESSION['firstname'])){
        $firstname = sanitise_input($_SESSION['firstname']);
    }

    $lastname = "";
    if(isset($_SESSION['lastname'])){
        $lastname = sanitise_input($_SESSION['lastname']);
    }

    $telephone = "";
    if(isset($_SESSION['telephone'])){
        $telephone = sanitise_input($_SESSION['telephone']);
    }

    $email = "";
    if(isset($_SESSION['email'])){
        $email = sanitise_input($_SESSION['email']);
    }

    $street = "";
    if(isset($_SESSION['street'])){
        $street = sanitise_input($_SESSION['street']);
    }

    $town = "";
    if(isset($_SESSION['town'])){
        $town = sanitise_input($_SESSION['town']);
    }

    $states = "";
    if(isset($_SESSION['state'])){
        $states = sanitise_input($_SESSION['state']);
    }

    $postcode = "";
    if(isset($_SESSION['pcode'])){
        $postcode = sanitise_input($_SESSION['pcode']);
    }

    //-----------------------------------------PERSONAL DETAILS-----------------------------------------

    $errMsg = [];
    // Validate First Name
    if (empty($_SESSION['firstname'])){
        $errMsg['FirstName']['required'] = '<span class="error_message">You must enter your first name.</span>';
    }
    else if (!preg_match("/^[a-zA-Z]{1,25}$/", $_SESSION['firstname'])){
        $errMsg['FirstName']['format'] = '<span class="error_message">Only maximum of <strong><u>25 alphabetical letters</strong></u> allowed in your first name.</span>';
    }

    // Validate Last Name
    if(empty($_SESSION['lastname'])){
        $errMsg['LastName']['required'] = '<span class="error_message">You must enter your last name.</span>';
    }
    else if(!preg_match("/^[a-zA-Z ]{1,25}$/", $_SESSION['lastname'])){
        $errMsg['LastName']['format'] = '<span class="error_message">Only maximum of <strong><u>25 alphabetical letters</strong></u> allowed in your last name.</span>'; 
    }

    // Validate Telephone
    if(empty($_SESSION['telephone'])){
        $errMsg['Telephone']['required'] = '<span class="error_message">You must enter your phone number.</span>';
    }
    else if (!preg_match("/^\(?[0-9]{3}\)?[- ]?[0-9]{3}[- ]?[0-9]{4}$/", $_SESSION['telephone'])) {
        $errMsg['Telephone']['format'] = '<span class="error_message">You must enter <strong><u>10 digits</strong></u> your phone number.</span>';
    }

    // Validate Email
    if(empty($_SESSION['email'])){
        $errMsg['Email']['required'] = '<span class="error_message">You must enter your email.</span>';
    }
    else if(!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)){
        $errMsg['Email']['valid'] = '<span class="error_message">Your email is not a valid email address.</span>';
    }

    // Validate Street
    if(empty($_SESSION['street'])){
        $errMsg['Street']['required'] = '<span class="error_message">You must enter your street.</span>';
    }
    else if(!preg_match("/^[a-zA-Z0-9 ]{1,40}$/", $_SESSION['street'])){
        $errMsg['Street']['format'] = '<span class="error_message">Only maximum of <strong><u>40 alphanumeric characters</strong></u> allowed in your street.</span>';
    }

    // Validate Town
    if(empty($_SESSION['town'])){
        $errMsg['Town']['required'] = '<span class="error_message">You must enter your town.</span>';
    }
    else if(!preg_match("/^[a-zA-Z ]{1,20}$/", $_SESSION['town'])){
        $errMsg['Town']['format'] = '<span class="error_message">Only maximum of <strong><u>20 alphabetical letters</strong></u> allowed in your town.</span>';
    }

    // Validate State
    if(empty($_SESSION['state'])){
        $errMsg['State']['required'] = '<span class="error_message">You must enter your state.</span>';
    }

    // Validate Postcode
    if(empty($_SESSION['pcode'])){
        $errMsg['Postcode']['required'] = '<span class="error_message">You must enter your postcode.</span>';
    }
    else if(!preg_match("/^[0-9]{4}$/", $_SESSION['pcode'])){
        $errMsg['Postcode']['format'] = '<span class="error_message">Only <strong><u>exact 4 digits</strong></u> allowed in your postcode.</span>';
    }

    // Validate Quantity
    $quantity = sanitise_input($_SESSION["quantity"]);	
    if (empty($_SESSION['quantity'])){
        $errMsg['Quantity']['required'] = '<span class="error_message">You must enter your quantity.</span>';
    }
    
    //-----------------------------------------CREDIT CARD-----------------------------------------

    $cardName = sanitise_input($_POST["cardName"]);
		if (empty($cardName)){
			$errMsg[] = array("code" => 16, "error" => "<p>You must enter your card number.</p>");
		}
		else if (!preg_match("/^[a-zA-Z]{1,40}$/", $cardName)) {
	        $errMsg .= "<p>Card name must contains only alphabetical characters and spaces and cannot exceed 40 characters length.</p>\n";
	    }

    $cardNumber = sanitise_input($_POST["cardNumber"]);
    if (empty($cardNumber)){
        $errMsg[] = array("code" => 17, "error" => "<p>You must enter your card number.</p>");
    }
    else {
        $cardType = $_POST["cardType"];
        switch ($cardType) {
            //Visa
            case "Visa":
				if (!preg_match("/^4\d{15}$/", $cardNumber)){													
					$errMsg[] = array("code" => 18, "error" => "<p>Only <strong><u>exact 16 digits and starting with a 4</strong></u> allowed in your Visa card number.</p>");
                }
                break;
            
            //MasterCard
            case "MasterCard":
                if (!preg_match("/^5[1-5][0-9]{14}$/", $cardNumber)){													
                    $errMsg[] = array("code" => 19, "error" => "<p>Only <strong><u>exact 16 digits and starting with digits 51 through to 55</strong></u> allowed in your MasterCard number.</p>");
                }
                break;
            
            //American Express
            case "American_Express":
                if (!preg_match("/^3[47][0-9]{13}$/", $cardNumber)){													
                    $errMsg[] = array("code" => 20, "error" => "<p>Only <strong><u>exact 15 digits and starting with 34 or 37</strong></u> allowed in your MasterCard number.</p>");
                }
                break;
        }
    }

    $products = sanitise_input($_SESSION["product"]);		
	    if (empty($products)){
	    	$errormsg .= "<p>You must select your Products.</p>\n";
	    }

	    if (isset($_SESSION["product"])){			
	    	$products = sanitise_input($_SESSION["product"]);
	    }
	    else{									
	        $products = "";
			if(in_array('', $_SESSION['product'])){
				$products = "EA SPORTS FIFA 23";
			}
			if(in_array('', $_SESSION['product'])){
				if ($products != "")
					$products .= ",";
				$products .= "League of Legends";
			}
			if(in_array('', $_SESSION['product'])){
				if ($products != "")
					$products .= ",";
				$products .= "Valorant";
			}
		}
    
    // if(isset($_POST["Storyline"]) ? $_POST["Storyline"]){
    //     $feature1 = "storyline";
    // }
    // if(isset($_POST["Rewards"]) ? $_POST["Rewards"]){
    //     $feature2 = "rewards";
    // }
    // if(isset($_POST["Strategy"]) ? $_POST["Strategy"]){
    //     $feature3 = "strategy";
    // }
    // if(isset($_POST["Others"]) ? $_POST["Others"]){
    //     $feature4 = "others";
    // }
    
    // $days = $_SESSION['days'];
    // $quantity = $_SESSION['quantity'];

    // $transaction_type = $_SESSION['transaction'];
    // if($transaction_type === "hire"){
    //    echo $total_cost;
    // }
    // else if ($transaction_type === "buy"){
    //     echo $price;
    // }

    //-------------------------------DATABASE-------------------
    if (empty($errMsg)) {
		$firstname = $_SESSION["firstname"];
		$lastname = $_SESSION["lastname"];
        $telephone = $_SESSION["telephone"];
		$email = $_SESSION["email"];
		$street = $_SESSION["street"];
		$town = $_SESSION["town"];
        $states = $_SESSION["state"];
		$postcode = $_SESSION["pcode"];
		$contact = $_SESSION["pcontact"];
		$products = $_SESSION["product"];
        $features = $_SESSION["feature"];
        $transaction = $_SESSION['transaction'];
        $quantity = $_SESSION["quantity"];
        $days = $_SESSION["days"];
        $expiry = $_POST["expiryday"];
        $cvv = $_POST["verival"];

        require_once('settings.php');
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);	
        if ($conn){   
        $create_table = "CREATE TABLE IF NOT EXISTS orders (
        order_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(25) NOT NULL,
        last_name VARCHAR(25) NOT NULL,
        telephone INT(10) NOT NULL,
        email VARCHAR(50) NOT NULL,
        street VARCHAR(40) NOT NULL,
        town VARCHAR(20) NOT NULL, 
        states VARCHAR(3) NOT NULL,
        postcode INT(4) NOT NULL,
        prefer_contact VARCHAR(9) NOT NULL,
        order_product VARCHAR(20) NOT NULL,
        product_features VARCHAR(50) NOT NULL,
        transaction_type VARCHAR(4) NOT NULL,
        quantity INT NOT NULL,
        order_cost INT NOT NULL,
        question VARCHAR(255) NOT NULL,
    
        card_type VARCHAR(15) NOT NULL,
        card_name VARCHAR(30) NOT NULL,
        card_num INT(16) NOT NULL,
        exp_day VARCHAR(5) NOT NULL,
        card_cvv INT(4) NOT NULL,
        order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        order_status ENUM('PENDING', 'FULFILLED', 'PAID', 'ARCHIVED') NOT NULL DEFAULT 'PENDING'
        )";

        $result = mysqli_query($conn, $create_table);
        
        if ($result){
            $total_cost = 0;
            $price = 0;
            if($transaction == "hire"){
                if ($products == "EA SPORTS FIFA 23"){
                    $total_cost = 10 * $days;
                }
                if ($products == "League of Legends"){
                    $total_cost = 20 * $days;
                }
                if ($products == "Valorant"){
                    $total_cost = 30 * $days;
                }
            }
            if($transaction == "buy"){
                if ($products == "EA SPORTS FIFA 23"){
                    $total_cost = 100 * $quantity;
                }
                if ($products == "League of Legends"){
                    $total_cost = 200 * $quantity;
                }
                if ($products == "Valorant"){
                    $total_cost = 300 * $quantity;
                }
            }     
            
            //order date
            $datetime = date('Y-m-d H:i:s');

            //insert order query
            $add_order = "INSERT INTO orders 
            (first_name, last_name, telephone, email, street, town, states, postcode, prefer_contact, order_product, product_features, transaction_type, quantity, order_cost, card_type, card_name, card_num, exp_day, card_cvv, order_time, order_status) 
            VALUES ('$firstname', '$lastname', '$telephone', '$email', '$street', '$town', '$states', '$postcode',  '$contact', '$products', '$features', '$transaction', '$quantity', '$total_cost', '$cardType', '$cardName', '$cardNumber', '$expiry', '$cvv', '$datetime', 'PENDING');";
            $execute = mysqli_query($conn, $add_order);

            if ($execute) {
                $db_msg ='<div id="enquiry-container">'
                .'<header class="enquiry-header">'
                    .'<h1 id="enquiry-header">Receipt</h1>'
                .'</header>'
                .'<div class="row">'
                    .'<div class="block">'
                        .'<form id="enquiry-form">'
                            .'<div class="row">'
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">First Name</label>'
                                .'</div>'
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt"> '.$firstname.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Last Name</label>'
                                .'</div>'
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$lastname.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Email</label>'
                                .'</div>'

                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$email.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Contact</label>'
                                .'</div>'

                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$contact.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Street</label>'
                                .'</div>'
                                                    
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$street.'</label>'
                                .'</div>'
                       
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Town</label>'
                                .'</div>'
                                                    
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$town.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">State</label>'
                                .'</div>'
                                                    
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$states.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Post code</label>'
                                .'</div>'
                                                    
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$postcode.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Product</label>'
                                .'</div>'
                                                    
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$products.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Total cost ($)</label>'
                                .'</div>'
                                                    
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$total_cost.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Order date</label>'
                                .'</div>'
                                                    
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">'.$datetime.'</label>'
                                .'</div>'
                
                                .'<div class="smallblock half-row">'
                                    .'<label class="label">Order status</label>'
                                .'</div>'
                                                    
                                .'<div class="smallblock half-row">'
                                    .'<label class="label-receipt">PENDING</label>'
                                .'</div>'
                            .'</div>'
                        .'</form>'    
                    .'</div>'
                .'</div>'
                .'</div>';
            header("location:receipt.php?db_msg=$db_msg");
            exit();
        }
        }
        }
        else{
            $db_msg = "<p>Failed to create table.</p>";
        }
        mysqli_close($conn);
    }
    else{
        $db_msg = "<p>Unable to connect to the database.</p>";
    }
       
?>