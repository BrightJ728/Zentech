<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('relationships'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/settings/academic/create?view=variables/relationship/create'); ?>', '<?= get_phrase('create_relationship'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_program'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body relationship_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>


<script>

var showAllRelationships = function () {
    $.ajax({
        url: '<?= route('relationship/list?view=variables/relationship/list') ?>',
        success: function(response){
            $('.relationship_content').html(response);
        }
    });
}
</script>
