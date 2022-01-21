<?php $school_data = $this->settings_model->get_current_school_data(); ?>
<div class="row justify-content-md-center">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><?= get_phrase('school_settings') ;?></h4>
                    <form method="POST" class="col-12 schoolForm" action="<?= route('school_settings/update') ;?>" id = "schoolForm">
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="school_name"> <?= get_phrase('school_name') ;?></label>
                                <div class="col-md-9">
                                    <input type="text" id="school_name" name="school_name" class="form-control"  value="<?= $school_data['name'] ;?>" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="phone"><?= get_phrase('phone') ;?></label>
                                <div class="col-md-9">
                                    <input type="text" id="phone" name="phone" class="form-control"  value="<?= $school_data['phone'] ;?>" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="fee_part_payment_percent"><?= get_phrase('fee_part_payment_percent') ;?> (%)</label>
                                <div class="col-md-9">
                                    <input type="number" step="0.01" id="fee_part_payment_percent" name="fee_part_payment_percent" class="form-control"  value="<?= $school_data['fee_part_payment_percent'] ;?>" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="number_of_semesters"><?= get_phrase('number_of_semesters') ;?></label>
                                <div class="col-md-9">
                                    <input type="number" min="1" max="4" id="number_of_semesters" name="number_of_semesters" class="form-control"  value="<?= $school_data['number_of_semesters'] ;?>" required>
                                </div>
                            </div>                           
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="address"> <?= get_phrase('address') ;?></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="address" name = "address" rows="5" required><?= $school_data['address'] ;?></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateSchoolInfo()"><?= get_phrase('update_settings') ;?></button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
