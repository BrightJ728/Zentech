<?php
if($settings_type == 'system_settings')
$class = 'col-xl-12';
else if($settings_type == 'payment_settings')
$class = 'col-xl-10 offset-xl-1';
else if($settings_type == 'language_settings')
$class = 'col-xl-10 offset-xl-1';
else if($settings_type == 'sms_settings')
$class = 'col-xl-10 offset-xl-1';
else if($settings_type == 'smtp_settings')
$class = 'col-xl-10 offset-xl-1';
else if($settings_type == 'school_settings')
$class = 'col-xl-10 offset-xl-1';
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"> <i class="mdi mdi-settings title_icon"></i><?= ucfirst(get_phrase($settings_type)); ?></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="<?= $class; ?>">
        <div class="settings_content">
            <?php include $settings_type.'.php'; ?>
        </div>
    </div>
</div>
<script>
function updateSystemInfo(system_name) {
    $(".systemAjaxForm").validate({});
    $(".systemAjaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, reload);
    });
}

function updateSystemLogo() {
    $(".systemLogoAjaxForm").validate({});
    $(".systemLogoAjaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, reload);
    });
}


function updatePaypalInfo() {
    $(".paypalAjaxForm").validate({});
    $(".paypalAjaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, reload);
    });
}

function updateStripeInfo() {
    $(".stripeAjaxForm").validate({});
    $(".stripeAjaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, reload);
    });
}

function updateSmtpInfo() {
    $(".stripeSmtpForm").validate({});
    $(".stripeSmtpForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, reload);
    });
}

function updateSchoolInfo() {
    $(".schoolForm").validate({});
    $(".schoolForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, reload);
    });
}

function reload() {
    setTimeout(
        function()
        {
            location.reload();
        }, 1000);
    }
    </script>
