<div class="row mb-3">
  <div class="col-md-4"></div>
  <div class="col-md-4 toll-free-box text-center text-white pb-2" style="background-color: #6c757d; border-radius: 10px;">
    <h4><?= get_phrase('manage_marks'); ?></h4>
    <span><?= get_phrase('class'); ?> : <?= $this->db->get_where('classes', array('id' => $class_id))->row('name'); ?></span><br>
    <span><?= get_phrase('section'); ?> : <?= $this->db->get_where('sections', array('id' => $section_id))->row('name'); ?></span><br>
    <span><?= get_phrase('subject'); ?> : <?= $this->db->get_where('subjects', array('id' => $subject_id))->row('name'); ?></span>
  </div>
</div>
<?php
$school_id = school_id();
$marks = $this->crud_model->get_marks($class_id, $section_id, $subject_id, $exam_id)->result_array();
$check_permission = has_permission($class_id, $section_id, 'marks');
?>
<?php if ($check_permission): ?>
  <?php if (count($marks) > 0): ?>
    <table class="table table-bordered table-responsive-sm" width="100%">
      <thead class="thead-dark">
        <tr>
          <th><?= get_phrase('student_name'); ?></td>
            <th><?= get_phrase('mark'); ?></td>
              <th><?= get_phrase('grade_point'); ?></td>
                <th><?= get_phrase('comment'); ?></td>
                  <th><?= get_phrase('action'); ?></td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($marks as $mark):
                    $student = $this->db->get_where('students', array('id' => $mark['student_id']))->row_array(); ?>
                    <tr>
                      <td><?= $this->user_model->get_user_details($student['user_id'], 'name'); ?></td>
                      <td><input class="form-control" type="number" id="mark-<?= $mark['student_id']; ?>" name="mark" placeholder="mark" min="0" value="<?= $mark['mark_obtained']; ?>" required onchange="get_grade(this.value, this.id)"></td>
                      <td><span id="grade-for-mark-<?= $mark['student_id']; ?>"><?= get_grade($mark['mark_obtained']); ?></span> </td>
                      <td><input class="form-control" type="text" id="comment-<?= $mark['student_id']; ?>" name="comment" placeholder="comment" value="<?= $mark['comment']; ?>"></td>
                      <td class="text-center"><button class="btn btn-success" onclick="mark_update('<?= $mark['student_id']; ?>')"><i class="mdi mdi-checkbox-marked-circle"></i></button></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else: ?>
              <?php include APPPATH.'views/backend/empty.php'; ?>
            <?php endif; ?>
          <?php else: ?>
            <div class="col-md-12 text-center">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><?= get_phrase('access_denied'); ?>!</h4>
                    <hr>
                    <p class="mb-0"><?= get_phrase('sorry_you_are_not_permitted_to_access_this_view').'. <br/>'.get_phrase('admin_handles_it'); ?>.</p>
                </div>
            </div>
          <?php endif; ?>


          <script>
          function mark_update(student_id){
            var class_id = '<?= $class_id; ?>';
            var section_id = '<?= $section_id; ?>';
            var subject_id = '<?= $subject_id; ?>';
            var exam_id = '<?= $exam_id; ?>';
            var mark = $('#mark-' + student_id).val();
            var comment = $('#comment-' + student_id).val();
            if(subject_id != ""){
              $.ajax({
                type : 'POST',
                url : '<?= route('mark/mark_update'); ?>',
                data : {student_id : student_id, class_id : class_id, section_id : section_id, subject_id : subject_id, exam_id : exam_id, mark : mark, comment : comment},
                success : function(response){
                  toastr.success('<?= get_phrase('mark_hass_been_updated_successfully'); ?>');
                }
              });
            }else{
              toastr.error('<?= get_phrase('required_mark_field'); ?>');
            }
          }

          function get_grade(exam_mark, id){
            $.ajax({
              url : '<?= route('get_grade'); ?>/'+exam_mark,
              success : function(response){
                $('#grade-for-'+id).text(response);
              }
            });
          }
          </script>
