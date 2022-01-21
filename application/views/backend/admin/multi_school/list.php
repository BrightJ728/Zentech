<?php
$school_id = school_id();
$schools = $this->db->get_where('schools')->result_array();
if (count($schools) > 0): ?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
  <thead>
    <tr style="background-color: #313a46; color: #ababab;">
      <th><?= get_phrase('name'); ?></th>
      <th><?= get_phrase('address'); ?></th>
      <th><?= get_phrase('phone'); ?></th>
      <th><?= get_phrase('options'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($schools as $school): ?>
      <tr>
        <td>
          <?= $school['name']; ?>
          <?php if (school_id() == $school['id']): ?>
              <i class="mdi mdi-check-circle" style="color: #4CAF50;"></i>
          <?php endif; ?>
        </td>
        <td><?= $school['address']; ?></td>
        <td><?= $school['phone']; ?></td>
        <td>
          <div class="dropdown text-center">
            <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= site_url('addons/multischool/activate/'.$school['id']); ?>', showAllSchools)"><?= get_phrase('active'); ?></a>
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/multi_school/edit/'.$school['id'])?>', '<?= get_phrase('update_school'); ?>');"><?= get_phrase('edit'); ?></a>
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= site_url('addons/multischool/delete/'.$school['id']); ?>', showAllSchools)"><?= get_phrase('delete'); ?></a>
            </div>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
