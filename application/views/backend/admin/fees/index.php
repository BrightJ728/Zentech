<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-cash title_icon"></i> <?= get_phrase('fees'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/fees/create'); ?>', '<?= get_phrase('add_school_fee'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_school_fee'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body fee_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllfees = function () {
        var url = '<?= route('fees/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.fee_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
