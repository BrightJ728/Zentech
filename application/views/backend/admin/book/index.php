<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                    <i class="mdi mdi-database title_icon"></i> <?= get_phrase('book'); ?>
                    <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/book/create'); ?>', '<?= get_phrase('add_book'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_book'); ?></button>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end page title -->

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class = "book_content">
                    <?php include 'list.php'; ?>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<script>
var showAllBooks = function () {
    var url = '<?= route('book/list'); ?>';

    $.ajax({
        type : 'GET',
        url: url,
        success : function(response) {
            $('.book_content').html(response);
            initDataTable('basic-datatable');
        }
    });
}
</script>
