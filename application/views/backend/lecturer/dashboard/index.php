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
            <div class="col-xl-8">
                <div class="row">
                   
                    <div class="col-lg-8">
                        <div class="card widget-flat" id="lecturer" style="on">
                            <div class="card-body">
                                <div class="float-right">
                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                </div>
                                <h5 class="text-muted font-weight-normal mt-0" title="Number of lecturer"> <i class="mdi mdi-account-group title_icon"></i><?= get_phrase('courses'); ?>  <a href="<?= route('lecturer'); ?>" style="color: #6c757d; display: none;" id = "lecturer_list"><i class = "mdi mdi-export"></i></a></h5>
                                <h3 class="mt-3 mb-3">
                                    <?php
                                        $courses = $this->lecturer_model->get_assigned_courses_by_user_id(user_id());
                                        echo count($courses);
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap"><?= get_phrase('total_number_of_courses'); ?></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div> <!-- end col -->
            <div class="col-xl-4">
                <div class="card bg-primary">
                    <div class="card-body">
                        <h4 class="header-title text-white mb-2"><?= get_phrase('todays_attendance'); ?></h4>
                        <div class="text-center">
                            <h3 class="font-weight-normal text-white mb-2">
                                <?= $this->crud_model->get_todays_attendance(); ?>
                            </h3>
                            <p class="text-light text-uppercase font-13 font-weight-bold"><?= $this->crud_model->get_todays_attendance(); ?> <?= get_phrase('students_are_attending_today'); ?></p>
                            <!-- <a href="<?= route('attendance'); ?>" class="btn btn-outline-light btn-sm mb-1"><?= get_phrase('go_to_attendance'); ?>
                                <i class="mdi mdi-arrow-right ml-1"></i>
                            </a> -->

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?= get_phrase('recent_events'); ?><a href="<?= route('event_calendar'); ?>" style="color: #6c757d;"><i class = "mdi mdi-export"></i></a></h4>
                        <?php include 'event.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col-->
</div>

<script>
$(document).ready(function() {
    initDataTable("expense-datatable");
});
</script>
