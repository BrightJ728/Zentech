<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
            	<i class="mdi mdi-content-paste title_icon"></i> <?= get_phrase('transcript'); ?>
            
        	</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="d-flex justify-content-center align-content-center" id="gif-loader">
                <img style="width: 60px; margin-top: 100px;" src="<?= site_url('assets/backend/images/straight-loader.gif'); ?>">
            </div>
            <div class="card-body records_content">
            </div>
        </div>
    </div>
</div>

<script>
    $('document').ready(function(){
        showAllRecords();
    });
    const showAllRecords = function () {
        const url = '<?= route('transcript/list'); ?>';
        let loader = document.querySelector("#gif-loader");
        loader.classList.remove("d-none");
        loader.classList.add("d-flex");
        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                loader.classList.remove("d-flex");
                loader.classList.add("d-none");
                $('.records_content').html(response);
                initDataTable('basic-datatable');
            },
            error: (err) => {
                $('.records_content').html("<p class='alert alert-warning'>Sorry problem occurred while retrieving records</p>");
                console.log(err);
            } 
        });
    }
</script>
