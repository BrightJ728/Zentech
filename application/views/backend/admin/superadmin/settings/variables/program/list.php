<?php
  $school_id = school_id();
  $programs = $this->db->get('programs')->result_array();
  if (count($programs) > 0):?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
      <thead>
        <tr style="background-color: #313a46; color: #ababab;">
          <th><?= get_phrase('description'); ?></th>         
          <th><?= get_phrase('last_modified'); ?></th>
          <th><?= get_phrase('actions'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($programs as $program){ ?>
          <tr>
            <td><?= $program['description']; ?></td>
            <td><?= $program['modified_at']; ?></td>
            <td>

              <div class="dropdown text-center">
                <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/settings/academic/edit/'.$program['id']. '?view=variables/program/edit&param1=' . $program['id'])?>', '<?= get_phrase('update_program'); ?>');"><?= get_phrase('edit'); ?></a>
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('program/delete/'.$program['id']); ?>', showAllPrograms)"><?= get_phrase('delete'); ?></a>
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




