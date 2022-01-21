<?php
  if(isset($param1) && !empty($param1)){
    $timestamp = strtotime($param1);
  }else{
    $timestamp = strtotime(date('m/d/Y'));
  }
 ?>
<form method="POST" class="d-block ajaxForm" action="<?= route('noticeboard/create'); ?>">
  <div class="form-row">

    <div class="form-group col-md-12">
      <label for="notice_title"><?= get_phrase('notice_title'); ?></label>
      <input type="text" class="form-control" id="notice_title" name = "notice_title" required>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_title_name'); ?></small>
    </div>
    <div class="form-group col-md-12">
      <label for="date"><?= get_phrase('date'); ?></label>
      <input type="text" value="<?= date('m/d/Y', $timestamp); ?>" class="form-control" id="date" name = "date" data-provide = "datepicker" required>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_date'); ?></small>
    </div>

    <div class="form-group col-md-12">
      <label for="notice"><?= get_phrase('notice'); ?></label>
      <textarea name="notice" class="form-control" rows="8" cols="80" required></textarea>
      <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_notice_details'); ?></small>
    </div>

    <div class="form-group col-md-12">
        <label for="show_on_website"><?= get_phrase('show_on_website'); ?></label>
        <select name="show_on_website" id="show_on_website" class="form-control select2" data-toggle = "select2">
            <option value="1"><?= get_phrase('show'); ?></option>
            <option value="0"><?= get_phrase('do_not_need_to_show'); ?></option>
        </select>
        <small id="" class="form-text text-muted"><?= get_phrase('notice_status'); ?></small>
    </div>

    <div class="form-group col-md-12">
        <label for="notice_photo"><?= get_phrase('upload_notice_photo'); ?></label>
        <div class="custom-file-upload">
            <input type="file" class="form-control" id="notice_photo" name = "notice_photo">
        </div>
    </div>

    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('save_notice'); ?></button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {

});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllNotices);
});

initSelect2(['#status', '#show_on_website']);
initCustomFileUploader();
</script>
