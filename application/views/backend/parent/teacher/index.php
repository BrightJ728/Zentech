<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?= get_phrase('lecturers'); ?> </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body lecturer_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAlllecturers = function () {
        var url = '<?= route('lecturer/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.lecturer_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
