<?php

session_start();

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51ImS9PKkhLhAjepvQKUmoXsnL5HDE479Xa92IxYpVADlWNQWXKDUO5H1keXYPqcWCo2azdKyrKshpIUomKImqLXq00RGthBp13');

header('Content-Type: application/json');
if(isset($_SESSION['user_id'])) $userId = $_SESSION['user_id']; else $userId = NULL;

if(isset($_GET['farmstand_id'])) $farmId = $_GET['farmstand_id']; else $farmId = NULL;

if(isset($_GET['total_id'])) $total = $_GET['total_id'] * 100; else $total = NULL;

/*
$userId = 10;
$farmId = 11;
$total = 100;
*/

if($userId != NULL && $farmId != NULL && $total != NULL) {
$YOUR_DOMAIN = 'https://farmstandwebsite.com/paymentPage/';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
    'line_items' => [[
		'price_data' => [
			'currency' => 'usd',
			'unit_amount' => $total,
			'product_data' => [
				'name' => 'Items',
				'images' => ["https://i.imgur.com/EHyR2nP.png"],
			],
		],
		'quantity' => 1,
		]],
		'metadata[userId]' => $userId,
		'metadata[farmId]' => $farmId,
		'mode' => 'payment',
		'success_url' => $YOUR_DOMAIN . "success.php?farmId=$farmId&userId=$userId",
		'cancel_url' => $YOUR_DOMAIN . 'cancel.php',
		]);

echo json_encode($checkout_session);
}
