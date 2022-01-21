<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
            <i class="mdi mdi-account-circle title_icon"></i> <?= get_phrase('librarian'); ?>
            <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/librarian/create'); ?>', '<?= get_phrase('create_librarian'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_librarian'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body librarian_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllLibrarians = function () {
        var url = '<?= route('librarian/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.librarian_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
