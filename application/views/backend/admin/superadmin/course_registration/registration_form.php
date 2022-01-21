<?php 
    $school_id = school_id(); 
    $courses = $this->student_model->get_student_courses_for_current_semester_by_user_id(user_id());
?>

<form method="POST" class="col-12 d-block ajaxForm" action="<?=route ('course_registration/register'); ?>" id="course_registration" enctype="multipart/form data">
    <div class="border pl-3 pr-3">
        <div class="row border-bottom border-secondary mb-1 pt-2 pb-2">
            <div class="col-sm-2"><span class="lead"><?= get_phrase('code'); ?></span></div>
            <div class="col-sm-6"><span class="lead"><?= get_phrase('title'); ?></span></div>
                 <div class="col-sm-2"><span class="lead"><?= get_phrase('credit_hours'); ?></span></div>

            <div class="col-sm-2"><span class="lead"><?= get_phrase('select'); ?></span></div>
        </div>
        <?php foreach($courses as $course){?>
            <div class="row  border-bottom pb-1 pt-1 mt-2">
                <div class="col-sm-2"><?= $course['code']; ?> </div>
               <div class="col-sm-6"><?= $course['title']; ?> </div>
                 <div class="col-sm-2"><?= $course['credit_hours']; ?> </div>
               
                <div class="col-sm-2"><input type="checkbox" id="course<?= $course['id']; ?>" name="course_ids[]" value="<?= $course['id'] ?>" ></div>
            </div>
        <?php }?>
    </div>
    <div class="row form-group mt-2 col-sm-6 offset-sm-3">
        <button class="btn btn-block btn-primary" type="submit">Submit registration</button>
    </div>
</form>
<style>
    .swal2-actions {
        display: flex;
        justify-content: space-evenly!important;
    }
</style>
<script>
$(document).ready(function() {
    $(".ajaxForm").validate({}); // Jquery form validation initialization

    $(".ajaxForm").submit(function(e) {
        e.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, complete registration!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    var form = $(this);
                    ajaxSubmit(e, form, () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thank You',
                            text: 'Your registration has been recorded successfully.',
                        });
                        setTimeout(()=>{location.reload()}, 3000);
                    });
                } else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Sorry',
                        text: 'Your course registration was not submitted.',
                    });
                }
            });
        
    });
});

</script>
