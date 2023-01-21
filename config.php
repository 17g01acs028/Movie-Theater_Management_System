<?php
    session_start();
    require_once "stripe-php-master/init.php";
    
    $stripeDetails = array(
        "secretKey" => $_SESSION['secretKey'],
        "publishableKey" => $_SESSION['publishableKey']
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
   
?>
