(function() {
	  var stripe = Stripe('pk_test_51IdNfnKQJVPZ85OfLPV1fg4nTpkWFmUBbeXTc6vS0uTCtXThRIoowfxRFJDmaZYlfLvowxLMCppWd8c4Tc7SraNS00ZqGeGir7');

	    var checkoutButton = document.getElementById('checkout-button');
		  checkoutButton.addEventListener('click', function () {
			      /*
				       * When the customer clicks on the button, redirect
					        * them to Checkout.
							     */
								     stripe.redirectToCheckout({
										       lineItems: [{price: 'price_1Ien8uKQJVPZ85Of5Icy3G6U', quantity: 1}],
											         mode: 'payment',
													       /*
														          * Do not rely on the redirect to the successUrl for fulfilling
																         * purchases, customers may not always reach the success_url after
																		        * a successful payment.
																				       * Instead use one of the strategies described in
																					          * https://stripe.com/docs/payments/checkout/fulfill-orders
																							         */
																									       successUrl: window.location.protocol + '//farmstandwebsite.com/paymentPage/success.php',
																										         cancelUrl: window.location.protocol + '//farmstandwebsite.com/paymentPage/cancel.php',
																												     })
									     .then(function (result) {
											       if (result.error) {
													           /*
															            * If `redirectToCheckout` fails due to a browser or network
																		         * error, display the localized error message to your customer.
																				          */
																						          var displayError = document.getElementById('error-message');
																								          displayError.textContent = result.error.message;
																										        }
																												    });
										   });
})();
