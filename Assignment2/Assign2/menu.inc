<?php
 $current_page = basename($_SERVER['PHP_SELF']);
?>
  <div class="fixedtop">
    <ul class="navbar-ul">
      <li class="navbar-li">
        <a href="index.php" <?php if ($current_page == "index.php"){echo 'class="active"';} ?>>Home</a>
      </li>
      <li class="navbar-li">
        <a href="product.php" <?php if ($current_page == "product.php") {echo 'class="active"';} ?>>Product</a>
      </li>
      <li class="navbar-li">
        <a href="enquire.php" <?php if (($current_page == "enquire.php") || ($current_page == "payment.php") || ($current_page == "fix_order.php")) {echo 'class="active"';} ?>>Enquiry</a>
      </li>
      <li class="navbar-li">
        <a href="about.php" <?php if ($current_page == "about.php") {echo 'class="active"';} ?>>About</a>
      </li>
      <li class="navbar-li">
        <a href="enhancements2.php" <?php if (($current_page == "enhancements2.php")||($current_page == "enhancements.php")) {echo 'class="active"';} ?>>Enhancement</a>
      </li>
      
      <li class="navbar-li">
        <a href="manager_login.php" <?php if (($current_page == "manager_login.php") || ($current_page == "manager.php") || ($current_page == "manager_registerer.php")) {echo 'class="active"';} ?>>Manager</a>
      </li>
    </ul>
  </div>