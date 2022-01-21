<form method="POST" class="d-block ajaxForm" action="<?= route('relationship/create'); ?>">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="start_date"><?= get_phrase('relationship'); ?></label>
      <input type="text" class="form-control" id="description" name="description" required>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('relationship_type'); ?></small>
    </div>
    
    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_relationship'); ?></button>
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
  ajaxSubmit(e, form, showAllRelationships);
});
</script>
