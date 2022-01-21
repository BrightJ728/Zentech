<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('lecturer'); ?></th>
            <th><?= get_phrase('marks'); ?></th>
            <!-- <th><?= get_phrase('assignment'); ?></th> -->
            <th><?= get_phrase('attendance'); ?></th>
            <!-- <th><?= get_phrase('online_exam'); ?></th> -->
        </tr>
    </thead>
    <tbody>
		<?php
			$school_id = school_id();
			$lecturers = $this->db->get_where('lecturers', array('school_id' => $school_id))->result_array();
			foreach($lecturers as $lecturer){
                $permission = $this->db->get_where('lecturer_permissions', array('lecturer_id' => $lecturer['id'], 'class_id' => $class_id, 'section_id' => $section_id))->row_array();
		?>
		<tr>
            <td><?= $this->db->get_where('users', array('id' => $lecturer['user_id']))->row('name'); ?></td>
            <td>
                <input type="checkbox" value="<?= $permission['marks']; ?>" id="<?= $lecturer['id'].'1'; ?>" data-switch="success" onchange="togglePermission(this.id, 'marks', '<?= $lecturer['id']; ?>')" <?php if($permission['marks'] == 1) echo 'checked'; ?>>
                <label for="<?= $lecturer['id'].'1'; ?>" data-on-label="Yes" data-off-label="No">
            </td>
            <!-- <td>
                <input type="checkbox" value="<?= $permission['assignment']; ?>" id="<?= $lecturer['id'].'2'; ?>" data-switch="success" onchange="togglePermission(this.id, 'assignment', '<?= $lecturer['id']; ?>')" <?php if($permission['assignment'] == 1) echo 'checked'; ?>>
                <label for="<?= $lecturer['id'].'2'; ?>" data-on-label="Yes" data-off-label="No">
            </td> -->
            <td>
                <input type="checkbox" value="<?= $permission['attendance']; ?>" id="<?= $lecturer['id'].'3'; ?>" data-switch="success" onchange="togglePermission(this.id, 'attendance', '<?= $lecturer['id']; ?>')" <?php if($permission['attendance'] == 1) echo 'checked'; ?>>
                <label for="<?= $lecturer['id'].'3'; ?>" data-on-label="Yes" data-off-label="No">
            </td>
            <!-- <td>
                <input type="checkbox" value="<?= $permission['online_exam']; ?>" id="<?= $lecturer['id'].'4'; ?>" data-switch="success" onchange="togglePermission(this.id, 'online_exam', '<?= $lecturer['id']; ?>')" <?php if($permission['online_exam'] == 1) echo 'checked'; ?>>
                <label for="<?= $lecturer['id'].'4'; ?>" data-on-label="Yes" data-off-label="No">
            </td> -->
		</tr>
		<?php } ?>
	</tbody>
</table>
<!-- <script type="text/javascript">
    initDataTable('basic-datatable');
</script> -->
