<?php
$subjects = $this->db->get_where('subjects', array('class_id' => $class_id))->result_array();
if (count($subjects) > 0):
  foreach ($subjects as $subject): ?>
    <option value="<?= $subject['id']; ?>"><?= $subject['name']; ?></option>
  <?php endforeach; ?>
<?php else: ?>
  <option value=""><?= get_phrase('no_subject_found'); ?></option>
<?php endif; ?>
