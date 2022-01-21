<?php
$courses = $this->db->get_where('courses', array('class_id' => $class_id))->result_array();
if (count($courses) > 0):
  foreach ($courses as $course): ?>
    <option value="<?= $course['id']; ?>"><?= $course['name']; ?></option>
  <?php endforeach; ?>
<?php else: ?>
  <option value=""><?= get_phrase('no_course_found'); ?></option>
<?php endif; ?>
