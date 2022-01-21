<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-database title_icon"></i> <?= get_phrase('expense_category'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/expense_category/create'); ?>', '<?= get_phrase('add_expense_category'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_expense_category'); ?></button>
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
                <div class = "expense_category_content">
                    <?php include 'list.php'; ?>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<script>
var showAllExpenseCategories = function () {
    var url = '<?= route('expense_category/list'); ?>';

    $.ajax({
        type : 'GET',
        url: url,
        success : function(response) {
            $('.expense_category_content').html(response);
            initDataTable('basic-datatable');
        }
    });
}
</script>
