<form method="POST" class="d-block ajaxForm" action="<?= route('events/create'); ?>">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="title"><?= get_phrase('event_title'); ?></label>
      <input type="text" class="form-control" id="title" name = "title" required>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_title_name'); ?></small>
    </div>
    <div class="form-group col-md-12">
      <label for="timestamp"><?= get_phrase('date'); ?></label>
      <input type="text" value="<?= date('m/d/Y'); ?>" class="form-control" id="timestamp" name = "timestamp" data-provide = "datepicker" required>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_date'); ?></small>
    </div>

    <div class="form-group col-md-12">
        <label for="status"><?= get_phrase('status'); ?></label>
        <select name="status" id="status" class="form-control select2" data-toggle = "select2">
            <option value="1"><?= get_phrase('active'); ?></option>
            <option value="0"><?= get_phrase('inactive'); ?></option>
        </select>
        <small id="" class="form-text text-muted"><?= get_phrase('visibility_on_website'); ?></small>
    </div>

   
    <div class="form-group col-md-12">
        <label for="event_photo"><?= get_phrase('upload_event_photo'); ?></label>
        <div class="custom-file-upload">
            <input type="file" class="form-control" id="event_photo" name = "event_photo">
        </div>
    </div>

    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('save_event'); ?></button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {

});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllEvents);
});

initSelect2(['#status' ]);
//initCustomFileUploader();
</script>
