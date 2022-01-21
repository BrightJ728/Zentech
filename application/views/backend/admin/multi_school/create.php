<form method="POST" class="d-block ajaxForm" action="<?= site_url('addons/multischool/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?= school_id(); ?>">
        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('school_name'); ?></label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_school_name'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone"><?= get_phrase('address'); ?></label>
            <textarea class="form-control" id="address" name = "address" rows="5" required></textarea>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_school_address'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('phone'); ?></label>
            <input type="text" class="form-control" id="phone" name = "phone" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_school_phone_number'); ?></small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_school'); ?></button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllSchools);
});
</script>
