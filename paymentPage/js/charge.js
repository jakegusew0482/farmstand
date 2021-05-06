let farmId = document.getElementById("farmstandid").value;
let total = document.getElementById("cart_total").value;

stripe = Stripe("pk_test_51ImS9PKkhLhAjepvmrJtv5fNWoX7iEMKDUjdKnmkOGEYMs5oK4Y18uCGj0kg37YD7gUKEfQTqfWCxbiyCT5CGNbf00mV4eLq0v");
    var checkoutButton = document.getElementById("checkout-button");
	    checkoutButton.addEventListener("click", function () {
			      
			fetch("./paymentPage/create-checkout-session.php?farmstand_id=" + farmId + "&total_id=" + total, {
				method: "POST",
			})
			.then(function (response) {
				return response.json();
			})
			.then(function (session) {
				return stripe.redirectToCheckout({ sessionId: session.id });
			})
			.then(function (result) {
				// If redirectToCheckout fails due to a browser or network
				// error, you should display the localized error message to your
				// customer using error.message.
				if (result.error) {
					alert(result.error.message);
				}
			})
			.catch(function (error) {
				console.error("Error:", error);
			});
		});