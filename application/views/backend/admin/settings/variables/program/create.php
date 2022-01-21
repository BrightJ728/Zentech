<form method="POST" class="d-block ajaxForm" action="<?= route('program/create'); ?>">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="description"><?= get_phrase('department'); ?></label>
      <select name="department_id" id="department_id" class="form-control select2" data-toggle="select2" required>
        <option value=""><?= get_phrase('select_a_department'); ?></option>
        <?php $departments = $this->db->get('departments')->result_array(); ?>
        <?php foreach($departments as $department){ ?>
            <option value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
        <?php } ?>
      </select>
      <small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_department'); ?></small>
    </div>

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
$(document).ready(function() {
  initSelect2(['#description']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllPrograms);
});
</script>
