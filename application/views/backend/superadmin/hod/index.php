<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-account-circle title_icon"></i> <?= get_phrase('head_of_department'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/hod/create'); ?>', '<?= get_phrase('create_head_of_department'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('create_head_of_department'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body head_of_department_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
let showAllHODS = function () {
  let url = '<?= route('hod/list'); ?>';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      $('.head_of_department_content').html(response);
      initDataTable('basic-datatable');
    }
  });
}
</script>
