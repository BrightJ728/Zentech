<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
            	<i class="mdi mdi-grease-pencil title_icon"></i> <?= get_phrase('Exam'); ?>
            	<button type="button" class="btn btn-icon btn-success btn-rounded mb-1 mt-3 alignToTitle float-right" onclick="rightModal('<?= site_url('modal/popup/exam/create'); ?>', '<?= get_phrase('create_exam'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_exam'); ?></button>
        	</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body exam_content">
              <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllExams = function () {
        var url = '<?= route('exam/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.exam_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
