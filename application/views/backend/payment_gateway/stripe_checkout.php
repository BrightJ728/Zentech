<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stripe | <?= get_settings('system_name');?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url('assets/payment/css/stripe.css');?>"
            rel="stylesheet">
        <link name="favicon" type="image/x-icon" href="<?= base_url();?>uploads/system/logo/favicon.png" rel="shortcut icon" />
    </head>
    <body>
<!--required for getting the stripe token-->
        <?php
            $stripe = json_decode(get_payment_settings('stripe_settings'));
            $stripe_test_mode = $stripe[0]->stripe_mode;
        ?>
        <?php
            if ($stripe_test_mode == 'on') {
                $public_key = $stripe[0]->stripe_test_public_key;
                $private_key = $stripe[0]->stripe_test_secret_key;
            } else {
                $public_key = $stripe[0]->stripe_live_public_key;
                $private_key = $stripe[0]->stripe_live_secret_key;
            }
        ?>

        <script>
            var stripe_key = '<?= $public_key;?>';
        </script>

<!--required for getting the stripe token-->

        <img src="<?= $this->settings_model->get_logo_light(); ?>" width="15%;"
             style="opacity: 0.05;">
            <form method="post"
              action="<?= route('payment_success/stripe/' . $invoice_id.'/'.$amount_to_pay);?>">
              <label>
                  <div id="card-element" class="field is-empty"></div>
                  <span><span><?= get_phrase('credit_/_debit_card');?></span></span>
              </label>
              <button type="submit">
                  <?= get_phrase('pay');?> <?= $amount_to_pay.' '.$stripe[0]->stripe_currency; ?>
              </button>
              <div class="outcome">
                  <div class="error" role="alert"></div>
                  <div class="success">
                  Success! Your Stripe token is <span class="token"></span>
                  </div>
              </div>
              <div class="package-details">
                  <strong><?= get_phrase('student_name');?> | <?= $user_details['name'];?></strong> <br>
              </div>
              <input type="hidden" name="stripeToken" value="">
          </form>
        <img src="https://stripe.com/img/about/logos/logos/blue.png" width="25%;" style="opacity: 0.05;">
        <script src="https://js.stripe.com/v3/"></script>
        <script src="<?= base_url('assets/payment/js/stripe.js');?>"></script>

        <script type="text/javascript">
            get_stripe_currency('<?= $stripe[0]->stripe_currency; ?>');
        </script>

    </body>
</html>
