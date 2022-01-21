<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"> <i class="mdi mdi-power-plug title_icon"></i> <?= get_phrase('manage_addons'); ?>
                <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/addon/create') ?>', '<?= get_phrase('add_new_addon'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_new_addon'); ?></button>
            </h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-3"><?= get_phrase('installed_addons'); ?></h4>
                <div class="table-responsive-sm addon_content">
                    <?php include 'list.php'; ?>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<script>
var showAllAddons = function () {
    var url = '<?= route('addon_manager/list'); ?>';

    $.ajax({
        type : 'GET',
        url: url,
        success : function(response) {
            $('.addon_content').html(response);
            initDataTable("basic-datatable");
            setTimeout(
                function()
                {
                    location.reload();
                }, 1000);
            }
        });
    }
    </script>
