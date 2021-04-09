<?php

require("./vendor/autoload.php");

/* \Stripe\Stripe::setApiKey("sk_test_51IdNfnKQJVPZ85OfQtDM8XNNiAbL6HZmVNKPrCzJ5a3OcLxrM9x2nNLoa8smcLKZCu8Qm32hKXJshSPNCkBj4DiQ00jwwDTuPv"); */

/* echo \Stripe\Customer::all(); */

$stripe = new \Stripe\StripeClient(
	'sk_test_51IdNfnKQJVPZ85OfQtDM8XNNiAbL6HZmVNKPrCzJ5a3OcLxrM9x2nNLoa8smcLKZCu8Qm32hKXJshSPNCkBj4DiQ00jwwDTuPv'
);

$customer = $stripe->customers->create([
	'description' => 'example customer',
	'email' => 'email@example.com',
	'payment_method' => 'pm_card_visa',
]);

echo $customer;
