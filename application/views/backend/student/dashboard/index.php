<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-view-dashboard title_icon"></i> <?= get_phrase('dashboard'); ?> </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->

<div class="row ">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-7 col-md-6">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="card widget-flat" id="student" >
                          <div class="card-body">
                              <div class="float-right">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Number of Student"> <i class="mdi mdi-account-group title_icon"></i>  <?= get_phrase('courses'); ?> <a href="<?= route('student'); ?>" style="color: #6c757d; display: none;" id = "student_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                  <?= $courses ?>
                              </h3>
                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?= get_phrase('registered_courses'); ?></span>
                              </p>
                          </div> <!-- end card-body-->
                      </div> <!-- end card-->
                  </div> <!-- end col-->

              </div> <!-- end row -->

            </div> <!-- end col -->
            <div class="col-xl-5 col-md-6">
                
                <div class="card min-height-300">
                    <div class="card-title pr-3 pl-3 pb-2 pt-2">
                        <h4 class="header-title"><?= get_phrase('profile'); ?></h4>
                    </div>
                    <div class="d-flex justify-content-center align-content-center" id="gif-loader">
                        <img style="width: 60px; margin-top: 100px;" src="<?= site_url('assets/backend/images/straight-loader.gif'); ?>">
                    </div>
                    <div class="card-body records_content pt-0 mt-0"> </div>
                </div>
            </div>
        </div>
    </div><!-- end col-->
</div>
<style>
    .min-height-300{
        min-height: 300px;
    }
</style>
<script>
$(document).ready(function() {
    initDataTable("expense-datatable");
});
    $('document').ready(function(){
        getProfile();
    });
    const getProfile = function () {
        const url = '<?= route('dashboard/profile'); ?>';
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
