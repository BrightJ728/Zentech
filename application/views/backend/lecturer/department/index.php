<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
            	<i class="mdi mdi-content-paste title_icon"></i> <?= get_phrase('department'); ?>
            	<button type="button" class="btn btn-icon btn-success btn-rounded mb-1 mt-3 alignToTitle float-right" onclick="rightModal('<?= site_url('modal/popup/department/create'); ?>', '<?= get_phrase('create_department'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_department'); ?></button>
        	</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body department_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllDepartments = function () {
        var url = '<?= route('department/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.department_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
