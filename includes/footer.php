<section class="footer-main">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9 footer-col">

            </div>
            <div class="col-md-3 col-sm-6 footer-col">
                <h3>Contact</h3>
                <div class="contact-item">
                    <div class="text">Goma, Q. les volcans</div>
                </div>
                <div class="contact-item">
                    <div class="text">+243 975 810 193</div>
                </div>
                <div class="contact-item">
                    <div class="text">info@malki.com</div>
                </div>
            </div>

        </div>
    </div>
</section>


<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 copyright">
                Copyright © 2022. Tout droit reservé
            </div>
        </div>
    </div>
</div>


<a href="#" class="scrollup">
    <i class="fa fa-angle-up"></i>
</a>


<script src="assets/js/custom.js"></script>
<script>
    function confirmDelete() {
        return confirm("Do you sure want to delete this data?");
    }

    $(document).ready(function () {
        advFieldsStatus = $('#advFieldsStatus').val();

        $('#paypal_form').hide();
        $('#stripe_form').hide();
        $('#bank_form').hide();
        $('#cash_on_delivery_form').hide();

        $('#advFieldsStatus').on('change', function () {
            advFieldsStatus = $('#advFieldsStatus').val();
            if (advFieldsStatus == '') {
                $('#paypal_form').hide();
                $('#stripe_form').hide();
                $('#bank_form').hide();
                $('#cash_on_delivery_form').hide();
            } else if (advFieldsStatus == 'PayPal') {
                $('#paypal_form').show();
                $('#stripe_form').hide();
                $('#bank_form').hide();
                $('#cash_on_delivery_form').hide();
            } else if (advFieldsStatus == 'Stripe') {
                $('#paypal_form').hide();
                $('#stripe_form').show();
                $('#bank_form').hide();
                $('#cash_on_delivery_form').hide();
            } else if (advFieldsStatus == 'Bank Deposit') {
                $('#paypal_form').hide();
                $('#stripe_form').hide();
                $('#bank_form').show();
                $('#cash_on_delivery_form').hide();
            } else if (advFieldsStatus == 'Cash On Delivery') {
                $('#paypal_form').hide();
                $('#stripe_form').hide();
                $('#bank_form').hide();
                $('#cash_on_delivery_form').show();
            }
        });
    });


    $(document).on('submit', '#stripe_form', function () {
        // createToken returns immediately - the supplied callback submits the form if there are no errors
        $('#submit-button').prop("disabled", true);
        $("#msg-container").hide();
        Stripe.card.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
            // name: $('.card-holder-name').val()
        }, stripeResponseHandler);
        return false;
    });
    Stripe.setPublishableKey('pk_test_0SwMWadgu8DwmEcPdUPRsZ7b');

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('#submit-button').prop("disabled", false);
            $("#msg-container").html('<div style="color: red;border: 1px solid;margin: 10px 0px;padding: 5px;"><strong>Error:</strong> ' + response.error.message + '</div>');
            $("#msg-container").show();
        } else {
            var form$ = $("#stripe_form");
            var token = response['id'];
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            form$.get(0).submit();
        }
    }
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5a7c31ded7591465c7077c48/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>