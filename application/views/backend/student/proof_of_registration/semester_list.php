<?php
	$semesters = $this->crud_model->get_current_semester_by_academic_year($academic_year_id);
	if (count($semesters) > 0): ?>
		<option selected value=''><?= get_phrase("choose") ?>...</option>
		<?php foreach ($semesters as $semester): ?>
			<option value="<?= $semester['id']; ?>"><?= $semester['semester']; ?></option>
		<?php endforeach; ?>
		<?php else: ?>
		<option value=""><?= get_phrase('no_semester_found'); ?></option>
	<?php endif; ?>