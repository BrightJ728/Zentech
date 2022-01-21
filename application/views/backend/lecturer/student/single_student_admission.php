<?php $school_id = school_id(); ?>

<form method="POST" class="col-12 d-block ajaxForm" action="<?= route('student/create_single_student'); ?>" id = "student_admission_form" enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="name"><?= get_phrase('name'); ?></label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" placeholder="name" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="email"><?= get_phrase('email'); ?></label>
            <div class="col-md-9">
                <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="password"><?= get_phrase('password'); ?></label>
            <div class="col-md-9">
                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="parent_id"><?= get_phrase('parent'); ?></label>
            <div class="col-md-9">
                <select id="parent_id" name="parent_id" class="form-control select2" data-toggle = "select2"  required >
                    <option value=""><?= get_phrase('select_a_parent'); ?></option>
                    <?php $parents = $this->db->get_where('parents', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($parents as $parent): ?>
                        <option value="<?= $parent['id']; ?>"><?= $this->user_model->get_user_details($parent['user_id'], 'name'); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="class_id"><?= get_phrase('class'); ?></label>
            <div class="col-md-9">
                <select name="class_id" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                    <option value=""><?= get_phrase('select_a_class'); ?></option>
                    <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($classes as $class){ ?>
                        <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="section_id"><?= get_phrase('section'); ?></label>
            <div class="col-md-9" id = "section_content">
                <select name="section_id" id="section_id" class="form-control select2" data-toggle = "select2" required >
                    <option value=""><?= get_phrase('select_section'); ?></option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="birthdatepicker"><?= get_phrase('birthday'); ?></label>
            <div class="col-md-9">
                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name = "birthday"   value="<?= date('m/d/Y'); ?>" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="gender"><?= get_phrase('gender'); ?></label>
            <div class="col-md-9">
                <select name="gender" id="gender" class="form-control select2" data-toggle = "select2"  required>
                    <option value=""><?= get_phrase('select_gender'); ?></option>
                    <option value="Male"><?= get_phrase('male'); ?></option>
                    <option value="Female"><?= get_phrase('female'); ?></option>
                    <option value="Others"><?= get_phrase('others'); ?></option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-textarea"><?= get_phrase('address'); ?></label>
            <div class="col-md-9">
                <textarea class="form-control" id="example-textarea" rows="5" name = "address" placeholder="address"></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="phone"><?= get_phrase('phone'); ?></label>
            <div class="col-md-9">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="phone" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput"><?= get_phrase('student_profile_image'); ?></label>
            <div class="col-md-9 custom-file-upload">
                <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                        <div class="js--image-preview" style="background-image: url(<?= base_url('uploads/users/placeholder.jpg'); ?>); background-color: #F5F5F5;"></div>
                        <div class="upload-options">
                            <label for="student_image" class="btn"> <i class="mdi mdi-camera"></i> <?= get_phrase('upload_an_image'); ?> </label>
                            <input id="student_image" style="visibility:hidden;" type="file" class="image-upload" name="student_image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12 mb-4"><?= get_phrase('add_student'); ?></button>
        </div>
    </div>
</form>

<script type="text/javascript">
var form;
$(".ajaxForm").submit(function(e) {
  form = $(this);
  ajaxSubmit(e, form, refreshForm);
});
var refreshForm = function () {
    form.trigger("reset");
}
</script>
