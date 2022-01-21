<?php 
      $students = $this->db->get('students')->result_array();
      $academic_years = $this->db->get('academic_years')->result_array();
    $transcripts = $this->db->get_where('transcript', array('id' => $param1))->row_array(); ?>

<form method="POST" class="d-block ajaxForm" action="<?= route('transcript/update/'.$param1);  ?>">
<div class="form-row">
  <div class="form-group col-md-12">
        <label for="student_id_on_create"><?= get_phrase('student'); ?></label>
        <select name="student_id" id="student_id_on_create" class="form-control select2" data-toggle="select2" required>
            <option value=""><?= get_phrase('select_a_student'); ?></option>
            <?php
           
            foreach ($students as $student) {
                ?>
            <option value="<?= $student['id']; ?>" <?php if($student['id'] == $transcripts['student_id']){ echo 'selected'; } ?> ><?= $student['first_name']. " "?><?= $student['last_name']. " " ?><?= $student['middle_name']; ?></option>
            <?php
            } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_student'); ?></small>
        </div>
        
        <div class="form-group col-md-12">
        <label for="academic_year"><?= get_phrase('academic_year'); ?></label>
        <select name="academic_year" id="academic_year" class="form-control select2" data-toggle="select2" required>
            <option value=""><?= get_phrase('select_a_academic_year'); ?></option>
            <?php
            
            foreach ($academic_years as $academic_year) {
                ?>
            <option value="<?= $academic_year['description']; ?>" <?php if($academic_year['description'] == $transcripts['academic_year']){ echo 'selected'; } ?> ><?= $academic_year['description']; ?></option>
            <?php
            } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_academic_year'); ?></small>
        </div>

        <div class="form-group col-md-12">
        <label for="semester"><?= get_phrase('semester'); ?></label>
        <select id="semester" name="semester" class="form-control select2" data-toggle="select2" required>
            <option value=""><?= get_phrase('select_a_semester'); ?></option>
            <?php
            $settings = $this->settings_model->get_current_school_data();
            for ($i = 1; $i <= $settings["number_of_semesters"] ; $i++) {?>
            <option value="<?= $i ?>" <?php if($i == $transcripts['semester']){ echo 'selected'; } ?> ><?= $i ?></option>
            <?php } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_semester'); ?></small>
        </div>
       
        <div class="form-group col-md-12">
        <label for="name"><?= get_phrase('total_grade_point'); ?></label>
        <input type="text" class="form-control" id="total_point" value="<?= $transcripts['total_point'] ?>" name="total_point" required>
        <small id="name_help" class="form-text text-muted"><?= get_phrase('total_grade_point'); ?></small>
        </div>
		
        <div class="form-group col-md-12">
        <label for="name"><?= get_phrase('gpa'); ?></label>
        <input type="text" class="form-control" id="gpa" value="<?= $transcripts['gpa'] ?>" name="gpa" required>
        <small id="name_help" class="form-text text-muted"><?= get_phrase('gpa'); ?></small>
        </div>
        <div class="form-group  col-md-12">
			<button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_transcript'); ?></button>
		</div>
	</div>

</form>
<script>

	$(".ajaxForm").validate({}); // Jquery form validation initialization
	$(".ajaxForm").submit(function(e) {
		let form = $(this);
		ajaxSubmit(e, form, showAllTranscript);
	});
</script>
