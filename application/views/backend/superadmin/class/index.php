<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
            <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('class'); ?>
            <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/class/create'); ?>', '<?= get_phrase('create_class'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_class'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body class_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllClasses = function () {
        var url = '<?= route('manage_class/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.class_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
