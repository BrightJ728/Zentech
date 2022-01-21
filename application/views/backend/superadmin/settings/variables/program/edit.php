
<?php $program = $this->db->get_where('programs', array('id' => $param1))->row_array(); ?>

<form method="POST" class="d-block ajaxForm" action="<?= route('program/update/'.$param1); ?>">
    <div class="form-row">
    

      <div class="form-group col-md-12">
        <label for="start_date"><?= get_phrase('program_name'); ?></label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $program["description"] ?>" required>
        <small id="name_help" class="form-text text-muted"><?= get_phrase('program_name'); ?></small>
      </div>
        
        <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_program'); ?></button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllPrograms);
});

$(document).ready(function() {
});
</script>
