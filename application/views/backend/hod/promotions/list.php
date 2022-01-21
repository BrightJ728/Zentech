<?php
if (count($year_levels) > 0): ?>
    <div class="course-all">
        <div class="mb-2">
            <span class="font-13">Academic Year: </span> 
            <span class="font-16 font-weight-bold"><?= $academic_year["description"] ?></span>
        </div>
        <div class="row clearfix" id="course-items">
            <?php foreach($year_levels as $year_level){ 
                $registered_students = $this->student_model->get_course_registered_students($course["course_id"], $academic_year['id']);
                ?>
                
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card mcard_4 border p-3 rounded shadow">
                        <div class="body">
                            <div class="info">
                                <h5 class="mt-3 mb-1 card-title"><?= $year_level['description'] ?></h5>
                                <small class="text-muted"><?= $course['code'] ?></small><br><br>
                                <span class="text-muted"><?= get_phrase("registed_students") ?>: <?= count($registered_students) ?></span><br>
                            </div>
                            <div class="d-flex flex-wrap">
                                <span class="m-1">
                                    <a title="<?= get_phrase('exam') ?>" href="<?= route( "records/course_students/" . $year_level['course_id'] . "/"  . $academic_year['id']) ?>" class="btn btn-primary"><i class="fa fa-check-circle-o"></i> </a>
                                </span>
                                <span class="m-1">
                                    <a 
                                        title="<?= get_phrase('course_details') ?>"  
                                        class="btn btn-primary" >
                                        <i class="fa fa-info-circle"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php else: ?>
	<div class="jumbotron">
        <h3>Sorry...</h3>
        <p>System setup not complete.</p>
        <p class="danger text-danger">Contact Admin if you believe this is an error.</p>
    </div>
<?php endif; ?>