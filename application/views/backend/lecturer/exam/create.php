<form method="POST" class="d-block ajaxForm" action="<?= route('exam/create'); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="exam_name"><?= get_phrase('exam_name'); ?></label>
            <input type="text" class="form-control" id="exam_name" name = "exam_name" placeholder="name" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_exam_name'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="starting_date"><?= get_phrase('starting_date'); ?></label>
            <input type="text" class="form-control date" id="starting_date" data-toggle="date-picker" data-single-date-picker="true" name = "starting_date" value="<?= date('m/d/Y'); ?>" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_starting_date'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="ending_date"><?= get_phrase('ending_date'); ?></label>
            <input type="text" class="form-control date" id="ending_date" data-toggle="date-picker" data-single-date-picker="true" name = "ending_date"   value="<?= date('m/d/Y'); ?>" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_ending_date'); ?></small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_exam'); ?></button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllExams);
    });
    $("#starting_date" ).daterangepicker();
    $("#ending_date" ).daterangepicker();
</script>
