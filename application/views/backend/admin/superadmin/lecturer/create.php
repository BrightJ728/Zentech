<form method="POST" class="d-block ajaxForm" action="<?= route('lecturer/create/'); ?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="hidden" name="school_id" value="<?= school_id(); ?>">
            <label for="name"><?= get_phrase('name'); ?></label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_name'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="email"><?= get_phrase('email'); ?></label>
            <input type="email" class="form-control" id="email" name = "email" required>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_email'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="department"><?= get_phrase('department'); ?></label>
            <select name="department_id" id="department" class="form-control select2" data-toggle = "select2" required>
                <option value=""><?= get_phrase('select_a_department'); ?></option>
                <?php $departments = $this->db->get_where('departments', array('school_id' => school_id()))->result_array();
                foreach($departments as $department){
                    ?>
                    <option value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                <?php } ?>
            </select>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_a_department'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone"><?= get_phrase('phone_number'); ?></label>
            <input type="text" class="form-control" id="phone" name = "phone" required>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_phone_number'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="gender"><?= get_phrase('gender'); ?></label>
            <select name="gender" id="gender" class="form-control select2" data-toggle = "select2">
                <option value=""><?= get_phrase('select_a_gender'); ?></option>
                <option value="Male"><?= get_phrase('male'); ?></option>
                <option value="Female"><?= get_phrase('female'); ?></option>
                <option value="Others"><?= get_phrase('others'); ?></option>
            </select>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_gender'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label><?= get_phrase('facebook_profile_link'); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                </div>
                <input type="text" class="form-control" name="facebook_link">
            </div>
            <small id="" class="form-text text-muted"><?= get_phrase('facebook_profile_link'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label><?= get_phrase('twitter_profile_link'); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                </div>
                <input type="text" class="form-control" name="twitter_link">
            </div>
            <small id="" class="form-text text-muted"><?= get_phrase('twitter_profile_link'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label><?= get_phrase('linkedin_profile_link'); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                </div>
                <input type="text" class="form-control" name="linkedin_link">
            </div>
            <small id="" class="form-text text-muted"><?= get_phrase('linkedin_profile_link'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone"><?= get_phrase('address'); ?></label>
            <textarea class="form-control" id="address" name = "address" rows="5" required></textarea>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_address'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="about"><?= get_phrase('about'); ?></label>
            <textarea class="form-control" id="about" name = "about" rows="5" required></textarea>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_a_small_about'); ?></small>
        </div>

        <div class="form-group col-md-12">
          <label for="show_on_website"><?= get_phrase('show_on_website'); ?></label>
          <select name="show_on_website" id="show_on_website" class="form-control select2" data-toggle = "select2">
            <option value="1"><?= get_phrase('show'); ?></option>
            <option value="0"><?= get_phrase('do_not_need_to_show'); ?></option>
          </select>
          <small id="" class="form-text text-muted"><?= get_phrase('show_this_lecturer_on_website'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="image_file"><?= get_phrase('upload_image'); ?></label>
            <input type="file" class="form-control" id="image_file" name = "image_file">
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_lecturer'); ?></button>
        </div>
    </div>
</form>

<script>
$(document).ready(function () {
    initSelect2(['#department', '#gender', '#blood_group', '#show_on_website']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllLecturers);
});

 initCustomFileUploader();
</script>
