<form method="POST" class="d-block ajaxForm" action="<?= route('admin/create'); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('name'); ?></label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_name'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="email"><?= get_phrase('email'); ?></label>
            <input type="email" class="form-control" id="email" name = "email" required>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_email'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="password"><?= get_phrase('password'); ?></label>
            <input type="password" class="form-control" id="password" name = "password" required>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_password'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone"><?= get_phrase('phone_number'); ?></label>
            <input type="text" class="form-control" id="phone" name = "phone" required>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_phone_number'); ?></small>
        </div>


        <div class="form-group col-md-12">
            <label for="gender"><?= get_phrase('admin_of'); ?></label>
            <select name="school_id" id="school_id" class="form-control select2" data-toggle = "select2">
                <option value=""><?= get_phrase('select_a_school'); ?></option>
                <?php $schools = $this->crud_model->get_schools()->result_array(); ?>
                <?php foreach ($schools as $school): ?>
                    <option value="<?= $school['id']; ?>"><?= $school['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_gender'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="gender"><?= get_phrase('gender'); ?></label>
            <select name="gender" id="gender" class="form-control select2" data-toggle = "select2">
                <option value=""><?= get_phrase('select_a_gender'); ?></option>
                <option value="Male"><?= get_phrase('male'); ?></option>
                <option value="Female"><?= get_phrase('female'); ?></option>
                <option value="Others"><?= get_phrase('others'); ?></option>
            </select>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_gender'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone"><?= get_phrase('address'); ?></label>
            <textarea class="form-control" id="address" name = "address" rows="5" required></textarea>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_address'); ?></small>
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_admin'); ?></button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        initSelect2(['#school_id', '#gender', '#blood_group']);
    });
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllAdmins);
    });
</script>