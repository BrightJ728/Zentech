<?php $check_data = $this->db->get_where('grades', array('school_id' => school_id(), 'session' => active_session()));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('grade'); ?></th>
            <th><?= get_phrase('grade_point'); ?></th>
            <th><?= get_phrase('mark_from'); ?></th>
            <th><?= get_phrase('mark_upto'); ?></th>
            <th><?= get_phrase('options'); ?></th>
        </tr>
    </thead>
    <tbody>
	<?php
		$grades = $this->db->get_where('grades', array('school_id' => school_id(), 'session' => active_session()))->result_array();
		foreach($grades as $grade){
	?>
	<tr>
	    <td><?= $grade['name']; ?></td>
	    <td><?= $grade['grade_point']; ?></td>
	    <td><?= $grade['mark_from']; ?></td>
	    <td><?= $grade['mark_upto']; ?></td>
	    <td>
				<div class="dropdown text-center">
					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
					<div class="dropdown-menu dropdown-menu-right">
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/grade/edit/'.$grade['id'])?>', '<?= get_phrase('update_grade'); ?>');"><?= get_phrase('edit'); ?></a>
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('grade/delete/'.$grade['id']); ?>', showAllGrades )"><?= get_phrase('delete'); ?></a>
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
