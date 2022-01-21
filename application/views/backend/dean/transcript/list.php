<?php

  $transcripts = $this->crud_model->get_transcript();
  if (count($transcripts) > 0):?>
    <table id="datatable-buttons1" class="table table-striped dt-responsive nowrap" width="100%">
      <thead>
        <tr style="background-color: #313a46; color: #ababab;">
          <th>Student name</th>         
          <th>Academic year</th>
          <th>Semester</th>
          <th>Total grade point</th>
          <th>Weighted average</th>
          <th><?= get_phrase('actions'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php 
       
        foreach($transcripts as $transcript){ ?>
          <tr>
            <td><?= $transcript['first_name'] ." ". $transcript["last_name"] ?></td>
            <td><?= $transcript['academic_year']; ?></td>
            <td><?= $transcript['semester']; ?></td>
            <td><?= $transcript['total_point']; ?></td>
            <td><?= $transcript['gpa']; ?></td>
            <td>

              <div class="dropdown text-center">
                <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/transcript/edit/'.$transcript['id'])?>', '<?= get_phrase('update_transcript'); ?>');"><?= get_phrase('edit'); ?></a>
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('transcript/delete/'.$transcript['id']); ?>', showAllTranscript)"><?= get_phrase('delete'); ?></a>
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

  <script>
    $(document).ready(function () {
      initDataTableWithButtons('datatable-buttons1');
     $(".ajaxForm").validate({}); // Jquery form validation initialization
	$(".ajaxForm").submit(function(e) {
		let form = $(this);
		ajaxSubmit(e, form, showAllTranscript);
	});
    });
</script>
