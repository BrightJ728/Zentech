<?php
if (isset($class_id)):
  $school_id  = school_id();
  $check_data = $this->db->get_where('subjects', array('school_id' => $school_id, 'session' => active_session(), 'class_id' => $class_id))->result_array();
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?= get_phrase('name'); ?></th>
        <th><?= get_phrase('options'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $school_id = school_id();
      $subjects = $this->db->get_where('subjects', array('school_id' => $school_id, 'session' => active_session(), 'class_id' => $class_id))->result_array();
      foreach($subjects as $subject){
        ?>
        <tr>
          <td><?= $subject['name']; ?></td>
          <td>

            <div class="dropdown text-center">
    					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
    					<div class="dropdown-menu dropdown-menu-right">
    						<!-- item-->
    						<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/subject/edit/'.$subject['id'])?>', '<?= get_phrase('update_subject'); ?>');"><?= get_phrase('edit'); ?></a>
    						<!-- item-->
    						<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('subject/delete/'.$subject['id']); ?>', showAllSubjects)"><?= get_phrase('delete'); ?></a>
    					</div>
    				</div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
