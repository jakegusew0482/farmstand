<?php

require "./vendor/autoload.php";

\Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

$userId = 1;

$paymentIntent = \Stripe\PaymentIntent::create([
  'amount' => 1099,
    'currency' => 'usd',
	  'payment_method_types' => ['card'],
	  'metadata[user_id]' => $userId,
	  ]);

echo json_encode($paymentIntent);

?>
