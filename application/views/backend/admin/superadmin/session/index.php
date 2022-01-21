<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-calendar-range title_icon"></i> <?= get_phrase('session'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/session/create'); ?>', '<?= get_phrase('create_new_session'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_session'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row session_content">
    <?php include 'list.php'; ?>
</div>


<script>
function makeSessionActive() {
    var session_id = $('#session_dropdown').val();
    var url = '<?= route('session_manager/active_session/'); ?>'+session_id
    $.ajax({
        type : 'GET',
        url: url,
        processData: false,
        contentType: false,
        dataType: 'json',
        success : function(response) {
            (response.status === true) ? toastr.success(response.notification) : toastr.error(response.notification);
            location.reload();
        }
    });
}

var showAllSessions = function () {
    var url = '<?= route('session_manager/list'); ?>';

    $.ajax({
        type : 'GET',
        url: url,
        success : function(response) {
            $('.session_content').html(response);
            initDataTable('basic-datatable');
            initSelect2(['#session_dropdown']);
        }
    });
}
</script>
