<?php
$school_id = school_id();
?>
<div class="row justify-content-center">
  <div class="col-md-12">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
      <thead>
        <tr style="background-color: #313a46; color: #ababab;">
          <th width = 25%><?= get_phrase('student_id'); ?></th>
          <th width = 25%><?= get_phrase('photo'); ?></th>
          <th width = 25%><?= get_phrase('name'); ?></th>
          <th width = 25%><?= get_phrase('options'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $students = $this->db->get('students')->result_array();
          ?>
          <?php foreach($students as $student){?>
            <tr>
              <td><?= $student['id']; ?></td>
              <td>
                <img class="rounded-circle" width="50" height="50" src="<?= $this->user_model->get_user_image($student['user_id']); ?>">
              </td>
              <td>
                <?= $this->user_model->get_user_details($student['user_id'], 'name'); ?><br>
                <small> <strong><?= get_phrase('student_code'); ?> : </strong> <?= $student['code']; ?> </small>
              </td>
              <td>
                <div class="dropdown text-center">
                  <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item"  onclick="largeModal('<?= site_url('modal/popup/student/profile/'.$student['id'])?>', '<?= $this->db->get_where('schools', array('id' => $school_id))->row('name'); ?>')"><?= get_phrase('profile'); ?></a>
                    <!-- item-->
                    <a href="<?= route('student/edit/'.$student['user_id']); ?>" class="dropdown-item"><?= get_phrase('edit'); ?></a>
                    <!-- item -->
                    <a href="javascript:;" class="dropdown-item" onclick="confirmModal('<?= route('student/delete/'.$student['id'].'/'.$student['user_id']); ?>', showAllStudents)"><?= get_phrase('delete'); ?></a>
                  </div>
                </div>
              </td>
            </tr>
          <?php } ?>
          
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
initDataTable('basic-datatable');
</script>
