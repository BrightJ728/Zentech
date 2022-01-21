<?php
$school_id = school_id();
$exams = $this->db->get_where('exams', array('school_id' => $school_id, 'session' => active_session()))->result_array();

if (count($exams) > 0): ?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('exam_name'); ?></th>
            <th><?= get_phrase('starting_date'); ?></th>
            <th><?= get_phrase('ending_date'); ?></th>
            <th><?= get_phrase('options'); ?></th>
        </tr>
    </thead>
    <tbody>
	<?php foreach($exams as $exam):?>
	<tr>
	    <td><?= $exam['name']; ?></td>
	    <td><?= date('D, d-M-Y', $exam['starting_date']); ?></td>
	    <td><?= date('D, d-M-Y', $exam['ending_date']); ?></td>
	    <td>
	    	<button type="button" class="btn btn-icon btn-secondary btn-sm btn-dark" style="margin-right:5px;" onclick="rightModal('<?= site_url('modal/popup/exam/edit/'.$exam['id'])?>', '<?= get_phrase('update_exam'); ?>');" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= get_phrase('update_exam_info'); ?>"> <i class="mdi mdi-wrench"></i></button>

	    	<button id="uname" type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirmModal('<?= route('exam/delete/'.$exam['id']); ?>', showAllExams)" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= get_phrase('delete_exam'); ?>"> <i class="mdi mdi-window-close"></i></button>
	    </td>
	</tr>
<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
	<?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
