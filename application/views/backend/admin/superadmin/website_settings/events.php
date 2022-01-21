<div class="card">
  <div class="card-body">
    <h4 class="header-title"><?= get_phrase('events') ;?>
      <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/website_settings/create_event'); ?>', '<?= get_phrase('create_event'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('create_event'); ?></button>
    </h4>
    <br><br>
    <div class="alert alert-warning" role="alert">
      <i class="dripicons-information mr-2"></i> <?= get_phrase('this_events_will_get_appeared_at'); ?> <strong><?= get_phrase('website'); ?> ( <?= get_phrase('frontend'); ?> ) <?= get_phrase('events'); ?></strong>.
    </div>
    <?php $school_id = school_id(); ?>
    <?php $events = $this->db->get_where('frontend_events', array('school_id' => $school_id)); ?>
    <?php if($events->num_rows() > 0): ?>
      <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead>
          <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('event_title'); ?></th>
            <th><?= get_phrase('date'); ?></th>
            <th><?= get_phrase('status'); ?></th>
            <th><?= get_phrase('options'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $events = $events->result_array();
          foreach($events as $event){
            ?>
            <tr>
              <td><?= $event['title']; ?></td>
              <td><?= date('D, d M Y', $event['timestamp']); ?></td>
              <td>
                <?php if ($event['status']): ?>
                  <span class="badge badge-success"><?= get_phrase('active'); ?></span>
                <?php else: ?>
                  <span class="badge badge-danger"><?= get_phrase('inactive'); ?></span>
                <?php endif; ?>
              </td>
              <td>
                <div class="dropdown text-center">
                  <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/website_settings/edit_event/'.$event['frontend_events_id']); ?>', '<?= get_phrase('update_event'); ?>');"><?= get_phrase('edit'); ?></a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('events/delete/'.$event['frontend_events_id']); ?>', showAllEvents)"><?= get_phrase('delete'); ?></a>
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
  </div> <!-- end card body-->
</div>
