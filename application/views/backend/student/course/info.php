<?php
$school_id = school_id();
$course = $this->crud_model->get_courses($course_id);
if ($course !== null): ?>
<table id="datatable-buttons1" class="table table-striped dt-responsive nowrap" width="100%">
	<tbody>
        <tr><td><?= ucwords(get_phrase("course_code"))?></td><td><?= $course['code'] ?></td></tr>
        <tr><td><?= ucwords(get_phrase("course_title"))?></td><td><?= $course['title'] ?></td></tr>
        <tr><td><?= ucwords(get_phrase("department"))?></td><td><?= $course['department'] ?></td></tr>
        <tr><td><?= ucwords(get_phrase("level"))?></td><td><?= $course['level'] ?></td></tr>
        <tr><td><?= ucwords(get_phrase("semester"))?></td><td><?= $course['semester'] ?></td></tr>
	</tbody>
</table>
<?php else: ?>
	<?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
