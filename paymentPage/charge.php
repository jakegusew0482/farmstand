<?php

require("./vendor/autoload.php");

$stripe = new \Stripe\StripeClient(
	'sk_test_51IdNfnKQJVPZ85OfQtDM8XNNiAbL6HZmVNKPrCzJ5a3OcLxrM9x2nNLoa8smcLKZCu8Qm32hKXJshSPNCkBj4DiQ00jwwDTuPv'
);
$stripe->prices->create([
	'unit_amount' => 2000,
	'currency' => 'usd',
	'recurring' => ['interval' => 'month'],
	'product' => 'prod_JH03UNmaO3VFgf',
]);

echo $stripe;
