<?php 
 $programs = $this->db->get('programs')->result_array(); 
?>
<form method="POST" class="d-block ajaxForm" action="<?= route('department/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?= school_id(); ?>">
        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('department_name'); ?></label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_department_name'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="program_id"><?= get_phrase('programmee'); ?></label>
            <select required type="text" name="program_id" class="form-control" id="program_id" required>
                <option value=''><?= get_phrase("choose") ?>...</option>
                <?php foreach($programs as $program){ ?>
                    <option value="<?= $program['id']; ?>"><?= $program['description']; ?></option>
                <?php } ?>
            </select> 
            <small id="program_id_help" class="form-text text-muted"><?= get_phrase('select_programme'); ?></small>
        </div> 
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_department'); ?></button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
  initSelect2(['#name']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllDepartments);
});
</script>