<form method="POST" class="d-block ajaxForm" action="<?= route('program/create'); ?>">
  <div class="form-row">
  <input type="hidden" name="school_id" value="<?= school_id(); ?>">

    <div class="form-group col-md-12">
      <label for="start_date"><?= get_phrase('program_name'); ?></label>
      <input type="text" class="form-control" id="description" name="description" required>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('program_name'); ?></small>
    </div>
    
    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_program'); ?></button>
    </div>
  </div>
</form>

<script>

$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllPrograms);
});
</script>