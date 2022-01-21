<?php
$sections = $this->db->get_where('sections', array('class_id' => $class_id))->result_array();
if (count($sections) > 0):
  foreach ($sections as $section): ?>
    <option value="<?= $section['id']; ?>"><?= $section['name']; ?></option>
  <?php endforeach; ?>
<?php else: ?>
  <option value=""><?= get_phrase('no_section_found'); ?></option>
<?php endif; ?>
