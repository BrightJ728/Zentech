<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('programs'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/settings/academic/create?view=variables/program/create'); ?>', '<?= get_phrase('create_program'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_program'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body program_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>


<script>

var showAllPrograms = function () {
    $.ajax({
        url: '<?= route('program/list?view=variables/program/list') ?>',
        success: function(response){
            $('.program_content').html(response);
        }
    });
}
</script>
