<?php

require("./vendor/autoload.php");

\Stripe\Stripe::setApiKey('sk_test_51IdNfnKQJVPZ85OfQtDM8XNNiAbL6HZmVNKPrCzJ5a3OcLxrM9x2nNLoa8smcLKZCu8Qm32hKXJshSPNCkBj4DiQ00jwwDTuPv');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://farmstandwebsite.com/paymentPage';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card',],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => 2000.00,
      'product_data' => [
        'name' => 'carrot',
      ],
    ],
    'quantity' => 1,
  ],
  [
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => 118.00,
      'product_data' => [
        'name' => "Apettizer - Chicken Satay",
      ],
    ],
    'quantity' => 2,
  ]
],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
]);

echo json_encode(['id' => $checkout_session->id]);