<?php if (count($enrolments) > 0): ?>
  <?php foreach ($enrolments as $enrolment): ?>
    <option value="<?= $enrolment['student_id']; ?>"><?= $enrolment['name']; ?></option>
  <?php endforeach; ?>
<?php else: ?>
  <option value=""><?= get_phrase('no_student_found'); ?></option>
<?php endif; ?>
