<form method="POST" class="d-block ajaxForm" action="<?= route('addon_manager/install'); ?>" enctype="multipart/form-data">
  <div class="form-row">
    <?php $school_id = school_id(); ?>
    <input type="hidden" name="school_id" value="<?= $school_id; ?>">
    <input type="hidden" name="session_id" value="<?= active_session(); ?>">
    <div class="form-group col-md-12">
      <label for="addon_zip"><?= get_phrase('upload_addons_zip_file'); ?></label>
      <div class="custom-file-upload">
        <input type="file" class="form-control" id="addon_zip" name = "addon_zip" required>
      </div>
    </div>
  </div>
  <div class="form-group col-md-12 mt-2">
    <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('install_addon'); ?></button>
  </div>
</div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllAddons);
});

initCustomFileUploader();
</script>
