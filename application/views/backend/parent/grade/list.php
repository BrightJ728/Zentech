<?php $check_data = $this->db->get_where('grades', array('school_id' => school_id(), 'session' => active_session()));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('grade'); ?></th>
            <th><?= get_phrase('grade_point'); ?></th>
            <th><?= get_phrase('mark_from'); ?></th>
            <th><?= get_phrase('mark_upto'); ?></th>
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
	</tr>
	<?php } ?>
	</tbody>
</table>
<?php else: ?>
	<?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
