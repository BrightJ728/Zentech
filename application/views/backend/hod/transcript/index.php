<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
            	<i class="mdi mdi-content-paste title_icon"></i> <?= get_phrase('transcript'); ?>
                <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/transcript/create'); ?>', '<?= get_phrase('create_transcript'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_transcript'); ?></button>
        	</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body transcript_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>



<script>
    var showAllTranscript = function () {
        var url = '<?= route('transcript/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.transcript_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>