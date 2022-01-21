<form method="POST" class="d-block ajaxForm" action="<?= route('manage_class/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?= school_id(); ?>">
        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('class_name'); ?></label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_class_name'); ?></small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_class'); ?></button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllClasses);
});
</script>
