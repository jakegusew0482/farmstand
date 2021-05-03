<?php
// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
require("./vendor/autoload.php");

\Stripe\Stripe::setApiKey('sk_test_51IdNfnKQJVPZ85OfQtDM8XNNiAbL6HZmVNKPrCzJ5a3OcLxrM9x2nNLoa8smcLKZCu8Qm32hKXJshSPNCkBj4DiQ00jwwDTuPv');

$paymentIntent = \Stripe\PaymentIntent::create([
  'amount' => 1099,
  'currency' => 'usd',
  'payment_method_types' => ['card'],
]);

echo json_encode(['id' => $paymentIntent->id]);