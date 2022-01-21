<?php 
	$school_id = school_id(); 
    $courses = $this->student_model->get_student_courses_for_current_semester_by_user_id(user_id());


    $courses_credit_hours = $this->student_model->get_courses_total_credit();

    $registered_courses = $this->student_model->get_student_registered_courses_id_for_current_semester_by_user_id();
    $registered_course_ids = array();
    $total = $this->crud_model->get_credit();
    $academic_year = $this->crud_model->get_current_academic_year();
    $semester = $this->crud_model->get_current_semester();
    foreach($registered_courses as $registered_course){
        $registered_course_ids[] = $registered_course["course_id"];

    }
//     foreach($courses_credit_hours as $registered_course_hour){

//          $registered_course_credit[] = $registered_course_hour["credit_hours"];

    
// }

?>
<?php if($semester !== NULL) { ?>
    <div class="heading">
        <p class="lead">You have already registered for <?= $academic_year["description"] ?> academic year semester <?= $semester["semester"] ?></p>
    </div>
    <div class="border pl-3 pr-3 rounded">
        <div class="row border-bottom border-secondary mb-1 pt-1 pb-1">
            <div class="col-sm-2"><span class="lead"><?= get_phrase('code'); ?></span></div>
            <div class="col-sm-4"><span class="lead"><?= get_phrase('title'); ?></span></div>
            <div class="col-sm-2"><span class="lead"><?= get_phrase('credit_hours'); ?></span></div>
            <div class="col-sm-2"><span class="lead"><?= get_phrase('select'); ?></span></div>
        </div>
        <?php foreach ($courses as $course) {
    if (in_array($course["id"], $registered_course_ids)) {?>
                <div class="row badge-dark-lighten border-bottom pb-1 pt-1 mt-2">
                    <div class="col-sm-2" id="code"><?= $course['code']; ?> </div>
                    <div class="col-sm-4" id="title"><?= $course['title']; ?> </div>
                    <div class="col-sm-2" id="credit_hours"><?= $course['credit_hours']; ?> </div>

                    <div class="col-sm-2"><input disabled type="checkbox" id="course<?= $course['id']; ?>" name="course_ids[]" value="<?= $course['id'] ?>" checked ></div>
                </div>
                <?php } else { ?>
                <div class="row  border-bottom pb-1 pt-1 mt-2">
                    <div class="col-sm-2"><?= $course['code']; ?> </div>
                    <div class="col-sm-4"><?= $course['title']; ?> </div>
                    <div class="col-sm-2"><?= $course['credit_hours']; ?> </div>

                    <div class="col-sm-2"><input disabled type="checkbox" id="course<?= $course['id']; ?>" name="course_ids[]" value="<?= $course['id'] ?>" ></div>
                </div>
        <?php
            }
}

        
?>

    </div>
    <br>
    <br>
         <div class="alert alert-primary" role="alert" style="width:100%"><p style="text-align: left;">Total credit hours  
           <?=  $courses_credit_hours  ?>  </p>
        
            


      </div>     

    <div class="row mt-2 ml-1">
        <div class="card">
            <div class="card-body">
                <label for="proof_of_registration"><?= get_phrase("print_proof_of_registration") ?></label>
                <a href="<?= route('proof_of_registration'); ?>" id="proof_of_registration_button"><button class="btn btn-primary"><?= get_phrase("print") ?></button></a>
            </div>
        </div>
    </div>

<?php }else{ ?>

    <div class="row ">
        <div class="col-xl-12">
            <div class="jumbotron">
                <h3>Sorry...</h3>
                <p>Semester has not been created yet.</p>
                <p class="danger text-danger">Please contact Administrator.</p>             </div>
        </div><!-- end col-->
    </div>
<?php } ?>