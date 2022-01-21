<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-account-circle title_icon"></i> <?= get_phrase('Exam_officers'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/dean/create'); ?>', '<?= get_phrase('create_exam_officer'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('create_exam_officer'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body dean_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
let showAllDeans = function () {
  let url = '<?= route('dean/list'); ?>';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      $('.dean_content').html(response);
      initDataTable('basic-datatable');
    }
  });
}
</script>
