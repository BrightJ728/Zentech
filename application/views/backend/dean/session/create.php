<form method="POST" class="d-block ajaxForm" action="<?= route('session_manager/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?= school_id(); ?>">
        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('session_title'); ?></label>
            <input type="text" class="form-control" id="name" name = "session_title" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_session_title'); ?></small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_session'); ?></button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllSessions);
    });
</script>
