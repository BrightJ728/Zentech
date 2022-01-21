<?php
$students = $this->student_model->get_students_by_department($department_id, "id, name, first_name, last_name");
print_r($students);
if (count($students) > 0): ?>
  <option selected value=''><?= get_phrase("choose") ?>...</option>
  <?php foreach ($students as $student): ?>
    <option value="<?= $student['id']; ?>"><?= $student['name']; ?></option>
  <?php endforeach; ?>
<?php else: ?>
  <option value=""><?= get_phrase('no_student_found'); ?></option>
<?php endif; ?>