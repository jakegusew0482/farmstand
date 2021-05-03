<?php

// This example sets up an endpoint using the Slim framework.
// Watch this video to get started: https://youtu.be/sGcNPFX1Ph4.

use Slim\Http\Request;
use Slim\Http\Response;
use Stripe\Stripe;

require("./vendor/autoload.php");

$app = new \Slim\App;

$YOUR_DOMAIN = 'https://farmstandwebsite.com/paymentPage';

$app->add(function ($request, $response, $next) {
  \Stripe\Stripe::setApiKey('sk_test_51IdNfnKQJVPZ85OfQtDM8XNNiAbL6HZmVNKPrCzJ5a3OcLxrM9x2nNLoa8smcLKZCu8Qm32hKXJshSPNCkBj4DiQ00jwwDTuPv');
  return $next($request, $response);
});

$app->post('/create-checkout-session', function (Request $request, Response $response) {
  $session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'usd',
        'product_data' => [
          'name' => 'T-shirt',
        ],
        'unit_amount' => 2000,
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/success.php',
    'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
  ]);

  return $response->withJson([ 'id' => $session->id ])->withStatus(200);
});

$app->run();

// \Stripe\Stripe::setApiKey('sk_test_51IdNfnKQJVPZ85OfQtDM8XNNiAbL6HZmVNKPrCzJ5a3OcLxrM9x2nNLoa8smcLKZCu8Qm32hKXJshSPNCkBj4DiQ00jwwDTuPv');

// header('Content-Type: application/json');

// $YOUR_DOMAIN = 'https://farmstandwebsite.com/paymentPage';

// $checkout_session = \Stripe\Checkout\Session::create([
//   'payment_method_types' => ['card',],
//   'line_items' => [[
//     'price_data' => [
//       'currency' => 'usd',
//       'unit_amount' => 2000.00,
//       'product_data' => [
//         'name' => 'carrot',
//       ],
//     ],
//     'quantity' => 1,
//   ],
//   [
//     'price_data' => [
//       'currency' => 'usd',
//       'unit_amount' => 118.00,
//       'product_data' => [
//         'name' => "Apettizer - Chicken Satay",
//       ],
//     ],
//     'quantity' => 2,
//   ]
// ],
//   'mode' => 'payment',
//   'success_url' => $YOUR_DOMAIN . '/success.php',
//   'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
// ]);

// // Order id
// echo json_encode(['id' => $checkout_session->id]);
// echo ($checkout_session);