<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('academic_year'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/settings/academic_years/create?view=variables/academic_year/create'); ?>', '<?= get_phrase('create_academic_year'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_academic_year'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body academic_year_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>


<script>

var showAllAcademicYears = function () {
    $.ajax({
        url: '<?= route('academic_years/list?view=variables/academic_year/list') ?>',
        success: function(response){
            $('.academic_year_content').html(response);
        }
    });
}
</script>
