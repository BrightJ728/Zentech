<?php $school_id = school_id(); ?>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <div class="card bg-secondary text-white">
      <div class="card-body">
        <div class="text-center">
          <h4><?= get_phrase('attendance_report').' '.get_phrase('of').' '.date('F', $attendance_date); ?></h4>
          <h5><?= get_phrase('class'); ?> : <?= $this->db->get_where('classes', array('id' => $class_id))->row('name'); ?></h5>
          <h5><?= get_phrase('section'); ?> : <?= $this->db->get_where('sections', array('id' => $section_id))->row('name'); ?></h5>
          <h5>
            <?= get_phrase('last_updated_at'); ?> :
            <?php if (get_settings('date_of_last_updated_attendance') == ""): ?>
              <?= get_phrase('not_updated_yet'); ?>
            <?php else: ?>
              <?= date('d-M-Y', get_settings('date_of_last_updated_attendance')); ?> <br>
              <?= get_phrase('time'); ?> : <?= date('H:i:s', get_settings('date_of_last_updated_attendance')); ?>
            <?php endif; ?>
          </h5>
        </div>
      </div> <!-- end card-body-->
    </div>
  </div>
  <div class="col-md-4"></div>
</div>
<?php $check_permission = has_permission($class_id, $section_id, 'attendance'); ?>
<?php if ($check_permission): ?>
  <table  class="table table-bordered table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-sm">
    <thead class="thead-dark">
      <tr style="font-size: 12px;">
        <th style="width: 150px;"><?= get_phrase('student'); ?> <i class="mdi mdi-arrow-down"></i> <?= get_phrase('date'); ?> <i class="mdi mdi-arrow-right"></i></th>
        <?php
        $number_of_days = date('m', $attendance_date) == 2 ? (date('Y', $attendance_date) % 4 ? 28 : (date('m', $attendance_date) % 100 ? 29 : (date('m', $attendance_date) % 400 ? 28 : 29))) : ((date('m', $attendance_date) - 1) % 7 % 2 ? 30 : 31);
        for ($i = 1; $i <= $number_of_days; $i++): ?>
        <th><?= $i; ?></th>
      <?php endfor; ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $student_id_count = 0;
    $active_sesstion = active_session();
    $this->db->order_by('student_id', 'asc');
    $attendance_of_students = $this->db->get_where('daily_attendances', array('class_id' => $class_id, 'section_id' => $section_id, 'school_id' => $school_id, 'session_id' => $active_sesstion))->result_array();
    foreach($attendance_of_students as $attendance_of_student):?>
    <?php if(date('m', $attendance_date) == date('m', $attendance_of_student['timestamp'])): ?>
      <?php if($student_id_count != $attendance_of_student['student_id']): ?>
        <tr>
          <td><?= $this->user_model->get_user_details($this->db->get_where('students', array('id' => $attendance_of_student['student_id']))->row('user_id'), 'name'); ?></td>
          <?php for ($i = 1; $i <= $number_of_days; $i++): ?>
            <?php $date = $i.' '.$month.' '.$year; ?>
            <?php $timestamp = strtotime($date); ?>
            <td class="text-center">
              <?php $status = $this->db->get_where('daily_attendances', array('class_id' => $class_id, 'section_id' => $section_id, 'school_id' => $school_id, 'session_id' => $active_sesstion, 'student_id' => $attendance_of_student['student_id'], 'timestamp' => $timestamp))->row('status'); ?>
              <?php if($status == 1){ ?>
                <i class="mdi mdi-circle text-success"></i>
              <?php }elseif($status === "0"){ ?>
                <i class="mdi mdi-circle text-danger"></i>
              <?php } ?>
            </td>
          <?php endfor; ?>
        </tr>
      <?php endif; ?>
      <?php $student_id_count = $attendance_of_student['student_id']; ?>
    <?php endif; ?>
  <?php endforeach; ?>
</tbody>
</table>

<div class="row d-print-none mt-3">
  <div class="col-12 text-right"><a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i><?= get_phrase('print'); ?></a></div>
</div>
<?php else: ?>
  <div class="col-md-12 text-center">
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading"><?= get_phrase('access_denied'); ?>!</h4>
      <hr>
      <p class="mb-0"><?= get_phrase('sorry_you_are_not_permitted_to_access_this_view').'. <br/>'.get_phrase('admin_handles_it'); ?>.</p>
    </div>
  </div>
<?php endif; ?>
