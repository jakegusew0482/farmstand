<?php
require("./vendor/autoload.php");

$stripe = new \Stripe\StripeClient(
    'sk_test_51IdNfnKQJVPZ85OfQtDM8XNNiAbL6HZmVNKPrCzJ5a3OcLxrM9x2nNLoa8smcLKZCu8Qm32hKXJshSPNCkBj4DiQ00jwwDTuPv'
  );

  // Create price
$product = $stripe->products->create([
    'name' => 'Notebook',
    'description' => 'Best notebook out there',
]);

// get product it
$productId = $product['id'];

// create a price of productId
$price = $stripe->prices->create([
    'unit_amount' => 1000,
    'currency' => 'usd',
    'product' => $productId,
]);