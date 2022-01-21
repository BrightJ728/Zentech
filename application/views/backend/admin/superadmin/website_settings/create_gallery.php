<form method="POST" class="d-block ajaxForm" action="<?= route('frontend_gallery/create'); ?>">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="title"><?= get_phrase('gallery_title'); ?></label>
      <input type="text" class="form-control" id="title" name = "title" required>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_title_name'); ?></small>
    </div>

    <div class="form-group col-md-12">
      <label for="title"><?= get_phrase('description'); ?></label>
      <textarea name="description" class="form-control" rows="8" cols="80" required></textarea>
      <small id="description_help" class="form-text text-muted"><?= get_phrase('provide_description'); ?></small>
    </div>

    <div class="form-group col-md-12">
        <label for="show_on_website"><?= get_phrase('show_on_website'); ?></label>
        <select name="show_on_website" id="show_on_website" class="form-control select2" data-toggle = "select2">
            <option value="1"><?= get_phrase('show'); ?></option>
            <option value="0"><?= get_phrase('no_need_to_show'); ?></option>
        </select>
        <small id="" class="form-text text-muted"><?= get_phrase('visibility_on_website'); ?></small>
    </div>

    <div class="form-group col-md-12">
        <label for="cover_image"><?= get_phrase('cover_image'); ?></label>
        <div class="custom-file-upload">
            <input type="file" class="form-control" id="cover_image" name = "cover_image" required>
        </div>
    </div>

    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('save_gallery'); ?></button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {

});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllGallery);
});

initSelect2(['#show_on_website']);
initCustomFileUploader();
</script>
