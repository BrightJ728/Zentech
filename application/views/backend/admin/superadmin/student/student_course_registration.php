<?php $school_id = school_id(); ?>

<form method="POST" class="col-12 d-block ajaxForm" action="<?route ('student/student_course_registration'); ?>" id="student_course_registration" enctype="multipart/form data">
<?php 
    $student = $this->db->get_where('students', array('user_id'=>$this->session->userdata("user_id")))->row_array();
    
    
    $courses = $this->db->get_where('courses', array('level_id'=>$student["level_id"]))->result_array()();
?>
<?php foreach($courses as $course){?>

<?php }?>
     
<div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('register_courses'); ?></button>
    </div>

