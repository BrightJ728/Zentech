<?php $book_issue_details = $this->crud_model->get_book_issue_by_id($param1); ?>

<form method="POST" class="d-block ajaxForm" action="<?= route('book_issue/update/'.$param1); ?>">
  <div class="form-group row mb-3">
    <label class="col-md-3 col-form-label" for="issue_date"><?= get_phrase('issue_date'); ?></label>
    <div class="col-md-9">
      <input type="text" class="form-control date" id="issue_date" data-toggle="date-picker" data-single-date-picker="true" name = "issue_date" value="<?= date('m/d/Y', $book_issue_details['issue_date']); ?>" required>
    </div>
  </div>

  <div class="form-group row mb-3">
    <label class="col-md-3 col-form-label" for="class_id"><?= get_phrase('class'); ?></label>
    <div class="col-md-9">
      <select name="class_id" id="class_id_on_modal" class="form-control select2" data-toggle="select2"  required onchange="classWiseStudentOnCreate(this.value)">
        <option value=""><?= get_phrase('select_a_class'); ?></option>
        <?php $classes = $this->crud_model->get_classes()->result_array(); ?>
        <?php foreach($classes as $class): ?>
          <option value="<?= $class['id']; ?>" <?php if ($book_issue_details['class_id'] == $class['id']): ?> selected <?php endif; ?>><?= $class['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group row mb-3">
    <label class="col-md-3 col-form-label" for="student_id"> <?= get_phrase('student'); ?></label>
    <div class="col-md-9" id = "student_content">
      <select name="student_id" id="student_id_on_modal" class="form-control select2" data-toggle="select2" required >
        <option value=""><?= get_phrase('select_a_student'); ?></option>
        <?php $enrolments = $this->user_model->get_student_details_by_id('class', $book_issue_details['class_id']);
        foreach ($enrolments as $enrolment): ?>
        <option value="<?= $enrolment['student_id']; ?>" <?php if ($book_issue_details['student_id'] == $enrolment['student_id']): ?>selected<?php endif; ?>><?= $enrolment['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>

<div class="form-group row mb-3">
  <label class="col-md-3 col-form-label" for="book_id"> <?= get_phrase('book'); ?></label>
  <div class="col-md-9">
    <select name="book_id" id="book_id_on_modal" class="form-control" required>
      <option value=""><?= get_phrase('select_book'); ?></option>
      <?php
      $books = $this->crud_model->get_books()->result_array();
      foreach ($books as $book): ?>
      <option value="<?= $book['id']; ?>" <?php if ($book_issue_details['book_id'] == $book['id']): ?> selected <?php endif; ?>><?= $book['name']; ?></option>
    <?php endforeach; ?>
  </select>
</div>
</div>

<div class="form-group  col-md-12">
  <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_book_issue_info'); ?></button>
</div>
</form>

<script>
$(document).ready(function() {
  $('#issue_date').daterangepicker();
});

$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllBookIssues);
});

$(document).ready(function () {
  initSelect2(['#class_id_on_modal', '#student_id_on_modal', '#book_id_on_modal']);
});

function classWiseStudentOnCreate(classId) {
  $.ajax({
    url: "<?= route('invoice/student/'); ?>"+classId,
    success: function(response){
      $('#student_id_on_modal').html(response);
    }
  });
}
</script>
