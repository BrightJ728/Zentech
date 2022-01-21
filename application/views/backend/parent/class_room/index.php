<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
            	<i class="mdi mdi-library title_icon title_icon"></i> <?= get_phrase('class_room'); ?>
            	<button type="button" class="btn btn-icon btn-success btn-rounded mb-1 mt-3 alignToTitle float-right" onclick="rightModal('<?= site_url('modal/popup/class_room/create'); ?>', '<?= get_phrase('create_class_room'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_class_room'); ?></button>
        	</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body class_room_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllClassRooms = function () {
        var url = '<?= route('class_room/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.class_room_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
