<form method="POST" class="d-block ajaxForm" action="<?= route('language/update/'.$param1); ?>">
  <div class="form-group col-md-12">
    <label for="language"><?= get_phrase('language'); ?></label>
    <input type="text" class="form-control" id="language" name = "language" value="<?= $param1; ?>" required>
  </div>

  <div class="form-group  col-md-12">
    <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_language'); ?></button>
  </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllLanguages);
});
</script>
