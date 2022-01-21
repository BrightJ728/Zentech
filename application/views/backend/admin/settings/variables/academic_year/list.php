<?php
  $academic_years = $this->db->get('academic_years')->result_array();
  if (count($academic_years) > 0):?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
      <thead>
        <tr style="background-color: #313a46; color: #ababab;">
          <th><?= get_phrase('description'); ?></th>
          <th><?= get_phrase('start_date'); ?></th>
          <th><?= get_phrase('end_date'); ?></th>
          <th><?= get_phrase('last_modified'); ?></th>
          <th><?= get_phrase('actions'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($academic_years as $academic_year){ ?>
          <tr>
            <td><?= $academic_year['description']; ?></td>
            <td><?= $academic_year['start_date']; ?></td>
            <td><?= $academic_year['end_date']; ?></td>
            <td><?= $academic_year['modified_at']; ?></td>
            <td>

              <div class="dropdown text-center">
                <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/settings/academic_year/edit/'.$academic_year['id']. '?view=variables/academic_year/edit&param1=' . $academic_year['id'])?>', '<?= get_phrase('update_course'); ?>');"><?= get_phrase('edit'); ?></a>
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('academic_years/delete/'.$academic_year['id']); ?>', showAllAcademicYears)"><?= get_phrase('delete'); ?></a>
                </div>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
  <?php endif; ?>
