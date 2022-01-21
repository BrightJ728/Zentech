<?php
$profile_data = $this->user_model->get_profile_data();
?>
<div class="row justify-content-md-center">
    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= get_phrase('update_profile') ; ?></h4>
                <div class="col-12">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="name"> <?= get_phrase('name') ; ?></label>
                        <div class="col-md-9 form-control">
                            <?= $profile_data['name']; ?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="email"><?= get_phrase('email') ; ?></label>
                        <div class="col-md-9 form-control">
                            <?= $profile_data['email']; ?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="phone"> <?= get_phrase('phone') ; ?></label>
                        <div class="col-md-9 form-control">
                            <?= $profile_data['phone']; ?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="address"> <?= get_phrase('address') ; ?></label>
                        <div class="col-md-9 form-control">
                            <p><?= $profile_data['address']; ?></p>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="example-fileinput"><?= get_phrase('profile_image'); ?></label>
                        <div class="wrapper-image-preview" style="margin-left: -6px;">
                            <div class="box" style="width: 250px;">
                                <div class="js--image-preview" style="background-image: url(<?= $this->user_model->get_user_image($this->session->userdata('user_id')); ?>); background-color: #F5F5F5;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= get_phrase('change_password') ; ?></h4>
                <form method="POST" class="col-12 changePasswordAjaxForm" action="<?= route('profile/update_password') ; ?>" id = "changePasswordAjaxForm" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="current_password"> <?= get_phrase('current_password') ; ?></label>
                            <div class="col-md-9">
                                <input type="password" id="current_password" name="current_password" class="form-control"  value="" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="new_password"> <?= get_phrase('new_password') ; ?></label>
                            <div class="col-md-9">
                                <input type="password" id="new_password" name="new_password" class="form-control"  value="" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="confirm_password"> <?= get_phrase('confirm_password') ; ?></label>
                            <div class="col-md-9">
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control"  value="" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="changePassword()"><?= get_phrase('change_password') ; ?></button>
                        </div>
                    </div>
                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>
