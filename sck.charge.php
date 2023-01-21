<?php 
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$name = $POST['name'];
$email = $POST['email'];
$token = $POST['stripeToken'];
$currency = c::get('stripe_currency');
$amount = s::get('stripeAmount');
$description = s::get('stripeDescription');

$customer = \Stripe\Customer::create(array(
  'email' => $email,
  'source' => $token
));

// Charge the user's card:
$charge = \Stripe\Charge::create(array(
  'amount' => $amount,
  'currency' => $currency,
  'description' => $description,
  'customer' => $customer->id,
  )
));

$charge_json = $charge->__toJSON();?>