<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-account-circle title_icon"></i> <?= get_phrase('all_admins'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/admin/create'); ?>', '<?= get_phrase('create_admin'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('create_admin'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body admin_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
var showAllAdmins = function () {
  var url = '<?= route('admin/list'); ?>';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      $('.admin_content').html(response);
      initDataTable('basic-datatable');
    }
  });
}
</script>
