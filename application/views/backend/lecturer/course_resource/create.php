<form method="POST" class="d-block ajaxForm" action="<?= route('courses/add_resource/'. $param1 )  ?>">
  <input type="hidden" name="course_id" value="<?= $param1 ?>">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="description"><?= get_phrase('description'); ?></label>
      <input type="text" class="form-control" id="description" name="description" required>
      <small id="description_help" class="form-text text-muted"><?= get_phrase('provide_description'); ?></small>
    </div>

    <div class="form-group col-md-12">
      <label for="resource"><?= get_phrase('resource'); ?></label>
      <input type="file" class="form-control" id="resource" name="resource" required>
      <small id="resource_help" class="form-text text-muted"><?= get_phrase('provide_resource'); ?></small>
    </div>

    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('upload_resource'); ?></button>
    </div>
  </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        let form = $(this);
        ajaxSubmit(e, form, showAllResources);
    });
</script>
