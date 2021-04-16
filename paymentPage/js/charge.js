var stripe = Stripe("pk_test_51IdNfnKQJVPZ85OfLPV1fg4nTpkWFmUBbeXTc6vS0uTCtXThRIoowfxRFJDmaZYlfLvowxLMCppWd8c4Tc7SraNS00ZqGeGir7");
    var checkoutButton = document.getElementById("checkout-button");
    checkoutButton.addEventListener("click", function () {
      fetch("./paymentPage/create-checkout-session.php", {
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