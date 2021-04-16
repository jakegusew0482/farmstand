<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Stripe\Stripe;

require "./vendor/autoload.php";

$app = new \Slim\App;

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
          'name' => 'Cupcake',
        ],
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://farmstandwebsite.com/paymentPage/success.php',
    'cancel_url' => 'https://farmstandwebsite.com/paymentPage/cancel.php',
  ]);

  return $response->withJson([ 'id' => $session->id ])->withStatus(200);
});

$app->run();
