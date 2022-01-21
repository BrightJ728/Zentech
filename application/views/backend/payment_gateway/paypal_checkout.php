<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paypal | <?= get_settings('system_name');?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url('assets/payment/css/stripe.css');?>"
          rel="stylesheet">
  <link name="favicon" type="image/x-icon" href="<?= base_url();?>uploads/system/logo/favicon.png" rel="shortcut icon" />
</head>
<body>
<?php
    $paypal = json_decode(get_payment_settings('paypal_settings'));
    $paypal_mode = $paypal[0]->paypal_mode;
    $paypal_client_id_sandbox = $paypal[0]->paypal_client_id_sandbox;
    $paypal_client_id_production = $paypal[0]->paypal_client_id_production;
?>
<!--required for getting the stripe token-->

<img src="<?= $this->settings_model->get_logo_light(); ?>" width="15%;"
     style="opacity: 0.05;">

<div class="package-details">
    <strong><?= get_phrase('student_name');?> | <?= $user_details['name'];?></strong> <br>
    <strong><?= get_phrase('amount_to_pay');?> | <?= currency($amount_to_pay);?></strong> <br>
    <div id="paypal-button" style="margin-top: 20px;"></div><br>
</div>

<img src="https://www.paypalobjects.com/webstatic/i/logo/rebrand/ppcom-white.svg" width="25%;"
     style="opacity: 0.05;">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    paypal.Button.render({
        env: '<?= $paypal_mode;?>', // 'sandbox' or 'production'
        style: {
            label: 'paypal',
            size:  'medium',    // small | medium | large | responsive
            shape: 'rect',     // pill | rect
            color: 'blue',     // gold | blue | silver | black
            tagline: false
        },
        client: {
            sandbox:    '<?= $paypal_client_id_sandbox;?>',
            production: '<?= $paypal_client_id_production;?>'
        },

        commit: true, // Show a 'Pay Now' button

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?= $amount_to_pay;?>', currency: '<?= $paypal[0]->paypal_currency; ?>' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            // executes the payment
            return actions.payment.execute().then(function() {
                // make an ajax call for saving the payment info
                $.ajax({
                   url: '<?= route('payment_success/paypal/'.$invoice_id.'/'.$amount_to_pay);?>'
                }).done(function () {
                    window.location = '<?= route('invoice');?>';
                });
            });
        }

    }, '#paypal-button');
</script>

</body>
</html>
