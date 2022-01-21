<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"> <i class="mdi mdi-database title_icon"></i> <?= get_phrase('languages'); ?>
                <button type="button" class="btn btn-icon btn-success mb-1 btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/language/create'); ?>', '<?= get_phrase('add_language'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_language'); ?></button>
            </h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class = "language_content">
                    <?php include 'list.php'; ?>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<script>
var showAllLanguages = function () {
    var url = '<?= route('language/list'); ?>';

    $.ajax({
        type : 'GET',
        url: url,
        success : function(response) {
            $('.language_content').html(response);
            initDataTable('basic-datatable');
        }
    });
}
</script>
