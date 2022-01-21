<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
            	<i class="mdi mdi-grease-pencil title_icon"></i> <?= get_phrase('Grade'); ?>
            	<button type="button" class="btn btn-icon btn-success btn-rounded mb-1 mt-3 alignToTitle float-right" onclick="rightModal('<?= site_url('modal/popup/grade/create'); ?>', '<?= get_phrase('add_grade'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_grade'); ?></button>
        	</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body grade_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllGrades = function () {
        var url = '<?= route('grade/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.grade_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
