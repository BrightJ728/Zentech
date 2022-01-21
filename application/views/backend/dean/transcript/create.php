<?php 
   $students = $this->db->get('students')->result_array();
   $academic_years = $this->db->get('academic_years')->result_array();
?>
<form method="POST" class="d-block ajaxForm" action="<?= route('transcript/create'); ?>">
<div class="form-row">
  <div class="form-group col-md-12">
            <label for="student_id"><?= get_phrase('student'); ?></label>
            <select required type="text" name="student_id" class="form-control" id="student_id" required>
                <option value=''><?= get_phrase("choose") ?>...</option>
                <?php foreach($students as $student){ ?>
					<option value="<?= $student['id']; ?>"><?= $student['first_name']. " "?><?= $student['last_name']. " " ?><?= $student['middle_name']; ?></option>
                <?php } ?>
            </select> 
            <small id="program_id_help" class="form-text text-muted"><?= get_phrase('select_student'); ?></small>
        </div> 
    
        <div class="form-group col-md-12">
            <label for="academic_year"><?= ucwords(get_phrase('academic_year')); ?></label>
            <select required type="text" name="academic_year" class="form-control" id="academic_year" required>
                <option value=''>--<?= get_phrase("Choose") ?>--</option>
                <?php foreach($academic_years as $academic_year){ ?>
                    <option value="<?= $academic_year['description']; ?>"><?= $academic_year['description']; ?></option>
                <?php } ?>
            </select> 
            <small id="academic_year_id_help" class="form-text text-muted"><?= get_phrase('provide_academic_year'); ?></small>
        </div> 

        <div class="form-group col-md-12">
			<label for="semester"><?= get_phrase('semester'); ?></label>
			<select id="semester" name="semester" class="form-control select2" data-toggle="select2" required>
				<option value=""><?= get_phrase('select_a_semester'); ?></option>
				<?php
				$settings = $this->settings_model->get_current_school_data();
				for ($i = 1; $i <= $settings["number_of_semesters"] ; $i++) {?>
				<option value="<?= $i ?>"><?= $i ?></option>
				<?php } ?>
			</select>
			<small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_semester'); ?></small>
		</div>
        <div class="form-group col-md-12">
			<label for="name"><?= get_phrase('total_grade_point'); ?></label>
			<input type="text" class="form-control" id="total_point" name="total_point" required>
			<small id="name_help" class="form-text text-muted"><?= get_phrase('total_grade_point'); ?></small>
		</div>

		<div class="form-group col-md-12">
			<label for="name"><?= get_phrase('weighted_average'); ?></label>
			<input type="text" class="form-control" id="gpa" name="gpa" required>
			<small id="name_help" class="form-text text-muted"><?= get_phrase('weighted_average'); ?></small>
		</div>
        <div class="form-group  col-md-12">
			<button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_transcript'); ?></button>
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
