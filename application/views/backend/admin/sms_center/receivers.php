<?php if ($receiver == 'parent'):
  $students = $this->user_model->get_student_details_by_id('section', $section_id); ?>
  <div class="table-responsive-sm">
    <form class="parentAjaxForm" action="<?= site_url('addons/sms_center/send'); ?>" method="post" enctype="multipart/form-data">
      <table class="table table-bordered table-centered table-sm mb-0">
        <thead>
          <tr>
            <th><?= get_phrase('parent').' ('.get_phrase('receiver').')'; ?> <span style="float: right"> <a href="javascript:void(0);" onclick="checkAll()"><?= get_phrase('check_all'); ?></a> </span> </th>
            <th><?= get_phrase('student'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($students as $key => $student):
            $parent_details = $this->user_model->get_parent_by_id($student['parent_id'])->row_array(); ?>
            <tr>
              <td>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="<?= $key; ?>" name="phones[]" value="<?= $parent_details['phone']; ?>">
                  <label class="custom-control-label" for="<?= $key; ?>">
                    <?= "<b>".$parent_details['name']."</b><br/><small>".get_phrase('phone').': <strong>'.$parent_details['phone']."</strong></small>"; ?>
                  </label>
                </div>
                <input type="hidden" class="messages-to-send" name="messages[]" value="">
              </td>
              <td>
                <?= $student['name']; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </form>
  </div>
<?php elseif ($receiver == 'student'):
  $students = $this->user_model->get_student_details_by_id('section', $section_id); ?>
  <div class="table-responsive-sm">
    <form class="studentAjaxForm" action="<?= site_url('addons/sms_center/send'); ?>" method="post" enctype="multipart/form-data">
      <table class="table table-bordered table-centered table-sm mb-0">
        <thead>
          <tr>
            <th><?= get_phrase('student').' ('.get_phrase('receiver').')'; ?> <span style="float: right"> <a href="javascript:void(0);" onclick="checkAll()"><?= get_phrase('check_all'); ?></a> </span> </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($students as $key => $student): ?>
            <tr>
              <td>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="<?= $key; ?>" name="phones[]" value="<?= $student['phone']; ?>">
                  <label class="custom-control-label" for="<?= $key; ?>">
                    <?= "<b>".$student['name']."</b><br/><small>".get_phrase('phone').": <strong>".$student['phone']."</strong></small>"; ?>
                  </label>
                </div>
                <input type="hidden" class="messages-to-send" name="messages[]" value="">
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </form>
  </div>

<?php elseif ($receiver == 'lecturer'):
  $lecturers = $this->user_model->get_lecturers()->result_array(); ?>
  <div class="table-responsive-sm">
    <form class="lecturerAjaxForm" action="<?= site_url('addons/sms_center/send'); ?>" method="post" enctype="multipart/form-data">
      <table class="table table-bordered table-centered table-sm mb-0">
        <thead>
          <tr>
            <th><?= get_phrase('lecturer').' ('.get_phrase('receiver').')'; ?> <span style="float: right"> <a href="javascript:void(0);" onclick="checkAll()"><?= get_phrase('check_all'); ?></a> </span> </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($lecturers as $key => $lecturer): ?>
            <tr>
              <td>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="<?= $key; ?>" name="phones[]" value="<?= $lecturer['phone']; ?>">
                  <label class="custom-control-label" for="<?= $key; ?>">
                    <?= "<b>".$lecturer['name']."</b><br/><small>".get_phrase('phone').": <strong>".$lecturer['phone']."</strong></small>"; ?>
                  </label>
                </div>
                <input type="hidden" class="messages-to-send" name="messages[]" value="">
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </form>
  </div>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>

<script type="text/javascript">

$(".parentAjaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, doNothing);
});

$(".studentAjaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, doNothing);
});

$(".lecturerAjaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, doNothing);
});

function checkAll() {
  $('input:checkbox').prop('checked', "checked");
}

function doNothing() {

}
</script>
