<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= $this->settings_model->get_favicon(); ?>">

    <!-- App css -->
    <link href="<?= base_url(); ?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />
    <!--Notify for ajax-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<body class="auth-fluid-pages pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="text-center text-lg-left mb-3">
                        <a href="<?= site_url(); ?>">
                            <span><img src="<?= $this->settings_model->get_logo_dark(); ?>" alt="" height="35"></span>
                        </a>
                    </div>
                    <!-- title-->
                    <h4 class="mt-0"><?= get_phrase('sign_in'); ?></h4>
                    <p class="text-muted mb-4"><?= get_phrase('enter_your_email_address_and_password_to_access_account'); ?>.</p>

                    <!-- form -->
                    <form action="<?= site_url('login/validate_login'); ?>" method="post" id="loginForm">
                        <div class="form-group">
                            <label for="emailaddress"><?= get_phrase('email'); ?></label>
                            <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <a href="javascript: void(0);" class="text-muted float-right" onclick="forgotPass();"><small><?= get_phrase('forgot_your_password'); ?>?</small></a>
                            <label for="password"><?= get_phrase('password'); ?></label>
                            <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            <span class="text-danger" id="error_message"></span>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> <?= get_phrase('log_in'); ?> </button>
                        </div>
                    </form>

                    <form action="<?= site_url('login/retrieve_password'); ?>" method="post" id="forgotForm" style="display: none;">
                        <div class="form-group">
                            <a href="javascript: void(0);" class="text-muted float-right" onclick="backToLogin();"><small><?= get_phrase('back_to_login'); ?></small></a>
                            <label for="forgotEmail"><?= get_phrase('email'); ?></label>
                            <input class="form-control" type="email" name="email" required="" id="forgotEmail" placeholder="Enter your email">
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> <?= get_phrase('sent_password_reset_link'); ?> </button>
                        </div>
                    </form>
                    <!-- end form-->
                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
<!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

<!-- App js -->
<script src="<?= base_url(); ?>assets/backend/js/app.min.js"></script>

<!--Notify for ajax-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
function forgotPass(){
    $('#loginForm').hide();
    $('#forgotForm').show();
}

function backToLogin(){
    $('#forgotForm').hide();
    $('#loginForm').show();
}
</script>

<?php if ($this->session->flashdata('info_message') != ""):?>
    <script type="text/javascript">
    $.NotificationApp.send("<?= get_phrase('success'); ?>!", '<?= $this->session->flashdata("info_message");?>' ,"top-right","rgba(0,0,0,0.2)","info");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>
    <script type="text/javascript">
    $.NotificationApp.send("<?= get_phrase('sorry'); ?>!", '<?= $this->session->flashdata("error_message");?>' ,"top-right","rgba(0,0,0,0.2)","error");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('flash_message') != ""):?>
    <script type="text/javascript">
    $.NotificationApp.send("<?= get_phrase('congratulations'); ?>!", '<?= $this->session->flashdata("flash_message");?>' ,"top-right","rgba(0,0,0,0.2)","success");
</script>
<?php endif;?>
</body>

</html>
