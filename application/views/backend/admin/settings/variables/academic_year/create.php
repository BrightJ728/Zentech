<form method="POST" class="d-block ajaxForm" action="<?= route('academic_years/create'); ?>">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="description"><?= get_phrase('description'); ?></label>
      <select name="description" id="description" class="form-control select2" data-toggle="select2" required>
      <option value=""><?= get_phrase('select_a_description'); ?></option>
      <?php
          $current_year = date("Y"); 
          for($i = $current_year + 4; $i > $current_year - 20; $i--){ ?>
            <option value="<?=  $i . "/" . strVal($i + 1) ?>"><?= $i . "/" . strVal($i + 1) ?></option>
          <?php } ?>
      </select>
      <small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_level'); ?></small>
    </div>

    <div class="form-group col-md-12">
      <label for="start_date"><?= get_phrase('start_date'); ?></label>
      <input type="date" class="form-control" id="start_date" name="start_date" required>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('start_date'); ?></small>
    </div>

    <div class="form-group col-md-12">
      <label for="end_date"><?= get_phrase('end_date'); ?></label>
      <input type="date" class="form-control" id="end_date" name="end_date" required>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('end_date'); ?></small>
    </div>
    
    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_academic_year'); ?></button>
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
  ajaxSubmit(e, form, showAllAcademicYears);
});
</script>
