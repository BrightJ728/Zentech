<?php
$school_id = school_id();
$registered_students = $this->student_model->get_course_registered_students($course_id, $academic_year_id);
if (count($registered_students) > 0): ?>
<table id="datatable-buttons1" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th><?= get_phrase('name'); ?></th>
			<th><?= get_phrase('program'); ?></th>
			<th><?= get_phrase('level'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($registered_students as $register_student): ?>
			<tr>
				<td><?= $register_student['first_name'] . " " . $register_student['last_name'] ?></td>
				<td><?= $register_student['program'] ?></td>
				<td><?= $register_student['level'] ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
	<?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
