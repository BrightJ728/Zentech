<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
            <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('manage_schools'); ?>
            <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/multi_school/create'); ?>', '<?= get_phrase('create_school'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_school'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body school_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllSchools = function () {
        var url = '<?= site_url('addons/multischool/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.school_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
    var redirectToDashboard = function () {
        var url = '<?= route('dashboard'); ?>';
        window.location.replace(url);
    }
</script>
