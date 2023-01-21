<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h3>steve</h3>
    <form action="<?= $page->url() ?>/charge" method="POST" id="payment-form">
    <input type="text" name="name" class="StripeElement StripeElement--empty" placeholder="First Name">
    <input type="email" name="email" class="StripeElement StripeElement--empty" placeholder="Email Address">
   <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
   </div>
       <!-- Used to display Element errors. -->
   <div id="card-errors" role="alert"></div>
   <button class="submit-form stripe-button">Pay <?= $symbol ?><?= $page->amount()->html() ?></button>
    </form>
    
<form action="<?= $page->url() ?>/charge" method="POST" id="payment-form">
    <input type="text" name="name" class="StripeElement StripeElement--empty" placeholder="First Name">
    <input type="email" name="email" class="StripeElement StripeElement--empty" placeholder="Email Address">
   <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
   </div>
       <!-- Used to display Element errors. -->
   <div id="card-errors" role="alert"></div>
   <button class="submit-form stripe-button">Pay <?= $symbol ?><?= $page->amount()->html() ?></button>
</form>
</body>
</html>