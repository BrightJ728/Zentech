<form method="POST" class="d-block ajaxForm" action="<?= route('lecturer/create'); ?>">
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
            <label for="password"><?= get_phrase('password'); ?></label>
            <input type="password" class="form-control" id="password" name = "password" required>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_password'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="designation"><?= get_phrase('designation'); ?></label>
            <input type="text" class="form-control" id="designation" name = "designation" required>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_designation'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="department"><?= get_phrase('department'); ?></label>
            <select name="department" id="department" class="form-control" required>
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
            <select name="gender" id="gender" class="form-control">
                <option value=""><?= get_phrase('select_a_gender'); ?></option>
                <option value="Male"><?= get_phrase('male'); ?></option>
                <option value="Female"><?= get_phrase('female'); ?></option>
                <option value="Others"><?= get_phrase('others'); ?></option>
            </select>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_gender'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="blood_group"><?= get_phrase('blood_group'); ?></label>
            <select name="blood_group" id="blood_group" class="form-control">
                <option value=""><?= get_phrase('select_a_blood_group'); ?></option>
                <option value="a+">A+</option>
                <option value="a-">A-</option>
                <option value="b+">B+</option>
                <option value="b-">B-</option>
                <option value="ab+">AB+</option>
                <option value="ab-">AB-</option>
                <option value="o+">O+</option>
                <option value="o-">O-</option>
            </select>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_blood_group'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone"><?= get_phrase('address'); ?></label>
            <textarea class="form-control" id="address" name = "address" rows="5" required></textarea>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_lecturer_address'); ?></small>
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_lecturer'); ?></button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAlllecturers);
    });
</script>
