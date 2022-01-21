<?php 
  $academic_year_semesters = $this->db->get_where('academic_years_view', array('id' => $param1))->result_array(); 
    $academic_semesters = $this->db->get_where('semesters_view',array('academic_year_id' => $param1))->result_array(); 

  $school_data = $this->settings_model->get_current_school_data();
?>

<form id="academic-year-form" class="academic-year-form" action="<?= route('academic_years/update/'. $param1); ?>">
    <h4 class="tab">Academic Year</h4>
    <fieldset>
		<div class="form-group col-md-12">
			<label for="description"><?= get_phrase('description'); ?></label>
			<select name="description" id="description" class="form-control select2" data-toggle="select2" required>
			<option value=""><?= get_phrase('select_a_description'); ?></option>
			<?php
				$current_year = date("Y"); 
				for($i = $current_year + 1; $i > $current_year - 10; $i--){ ?>
					<option <?= $academic_year_semesters[0]["description"] == $i . "/" . strVal($i + 1) ? "selected": "" ?> value="<?=  $i . "/" . strVal($i + 1) ?>"><?= $i . "/" . strVal($i + 1) ?></option>
				<?php } ?>
			</select>
			<small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_level'); ?></small>
		</div>
    </fieldset>
	<?php 
		for($i = 1 ; $i < $school_data["number_of_semesters"] + 1 ; $i++): 
		$j = $i -1;?>

		<h4 class="tab">Semester <?= $i ?></h4>
		<fieldset>
			<?php foreach($academic_semesters as $acad){ ?>
			<?php } ?>
			<div class="form-group col-md-12">



				<label for="reporting_dates_start_date<?= $i ?>"><?= get_phrase('reporting_dates'); ?></label>
				<div class="form-row">
					<div class="col">
						<input type="date" class="form-control" id="reporting_dates_start_date<?= $i ?>" name="reporting_date_start_date<?= $i ?>" value="<?=   $academic_semesters[$j]["reporting_date_start_date"] ?>" required>
						<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('start_date'); ?></small>
					</div>
					<div class="col">
						<input type="date" class="form-control" id="reporting_dates_end_date<?= $i ?>" name="reporting_date_end_date<?= $i ?>" value="<?=   $academic_semesters[$j]["reporting_date_end_date"] ?>"required>
						<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('end_date'); ?></small>
					</div>

				</div>
			</div>
			<div class="form-group col-md-12">
			<label for="teaching_begins"><?= get_phrase('teaching_begins'); ?></label>
			<input type="date" class="form-control" id="teaching_begins<?= $i ?>" name="teaching_begins<?= $i ?>" value="<?=   $academic_semesters[$j]["teaching_begins"] ?>"required>
			<small id="name_help" class="form-text text-muted"><?= get_phrase('date_teaching_begins'); ?></small>
			</div>
			<div class="form-group col-md-12">
			<label for="registration_deadline<?= $i ?>"><?= get_phrase('registration_deadline'); ?></label>
			<input type="date" class="form-control" id="registration_deadline<?= $i ?>" name="registration_deadline<?= $i ?>" value="<?=   $academic_semesters[$j]["registration_deadline"] ?>"required>
			<small id="name_help" class="form-text text-muted"><?= get_phrase('registration_deadline'); ?></small>
			</div>
			<div class="form-group col-md-12">
			<label for="late_registration_deadline"><?= get_phrase('late_registration_deadline'); ?></label>
			<input type="date" class="form-control" id="late_registration_deadline<?= $i ?>" name="late_registration_deadline<?= $i ?>" value="<?=   $academic_semesters[$j]["late_registration_deadline"] ?>"required>
			<small id="name_help" class="form-text text-muted"><?= get_phrase('late_registration_deadline'); ?></small>
			</div>
			<div class="form-group col-md-12">
				<label for="mid_semester_exams_start_date<?= $i ?><?= $i ?>"><?= get_phrase('mid_semester_exams'); ?></label>
				<div class="form-row">
					<div class="col">
						<input type="date" class="form-control" id="mid_semester_exams_start_date<?= $i ?>" name="mid_semester_exams_start_date<?= $i ?>" value="<?=   $academic_semesters[$j]["mid_semester_exams_start_date"] ?>"required>
						<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('start_date'); ?></small>
					</div>
					<div class="col">
						<input type="date" class="form-control" id="mid_semester_exams_end_date<?= $i ?>" name="mid_semester_exams_end_date<?= $i ?>" value="<?=   $academic_semesters[$j]["mid_semester_exams_end_date"] ?>"required>
						<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('end_date'); ?></small>
					</div>
				</div>
			</div>
			<div class="form-group col-md-12">
			<label for="teaching_ends"><?= get_phrase('teaching_ends'); ?></label>
			<input type="date" class="form-control" id="teaching_ends<?= $i ?>" name="teaching_ends<?= $i ?>" value="<?=   $academic_semesters[$j]["teaching_ends"] ?>"required>
			<small id="name_help" class="form-text text-muted"><?= get_phrase('teaching_ends'); ?></small>
			</div>
		
			<div class="form-group col-md-12">
			<label for="revision_period_start_date<?= $i ?>"><?= get_phrase('revision_period'); ?></label>
			<div class="form-row">
				<div class="col">
					<input type="date" class="form-control" id="revision_period_start_date<?= $i ?>" name="revision_period_start_date<?= $i ?>" value="<?=   $academic_semesters[$j]["revision_period_start_date"] ?>"required>
					<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('start_date'); ?></small>
				</div>
				<div class="col">
					<input type="date" class="form-control" id="revision_period_end_date<?= $i ?>" name="revision_period_end_date<?= $i ?>" value="<?=   $academic_semesters[$j]["revision_period_end_date"] ?>"required>
					<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('end_date'); ?></small>
				</div>
				</div>
			</div>
			<div class="form-group col-md-12">
			<label for="final_semester_exams_start_date<?= $i ?>"><?= get_phrase('final_semester_exams'); ?></label>
			<div class="form-row">
				<div class="col">
					<input type="date" class="form-control" id="final_semester_exams_start_date<?= $i ?>" name="final_semester_exams_start_date<?= $i ?>" value="<?=   $academic_semesters[$j]["final_semester_exams_start_date"] ?>"required>
					<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('start_date'); ?></small>
				</div>
				<div class="col">
					<input type="date" class="form-control" id="final_semester_exams_end_date<?= $i ?>" name="final_semester_exams_end_date<?= $i ?>" value="<?=   $academic_semesters[$j]["final_semester_exams_end_date"] ?>"required>
					<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('end_date'); ?></small>
				</div>
				</div>
			</div>
			<div class="form-group col-md-12">
			<label for="vacation_period_start_date<?= $i ?>"><?= get_phrase('vacation_period'); ?></label>
			<div class="form-row">
				<div class="col">
					<input type="date" class="form-control" id="vacation_period_start_date<?= $i ?>" name="vacation_period_start_date<?= $i ?>" value="<?=   $academic_semesters[$j]["vacation_period_start_date"] ?>"required>
					<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('start_date'); ?></small>
				</div>
				<div class="col">
					<input type="date" class="form-control" id="vacation_period_end_date<?= $i ?>" name="vacation_period_end_date<?= $i ?>" value="<?=   $academic_semesters[$j]["vacation_period_end_date"] ?>"required>
					<small id="name_help" class="form-text text-muted pl-3"><?= get_phrase('end_date'); ?></small>
				</div>

				</div>

			</div>
		</fieldset>



	<?php endfor ?>
	
</form>

<script>
$(document).ready(function() {
	let dates = $("input[type=date]");
	for(let i = 0; i < dates.length; i++){
		let j = i + 1;
		dates[i].value = "2021-01-" + j.toLocaleString('en', {minimumIntegerDigits:2});
	}
	let form = $("#academic-year-form");
	form.steps({
		headerTag: "h4",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft",
		onStepChanging: function (event, currentIndex, newIndex)
		{
			// Allways allow previous action even if the current form is not valid!
			if (currentIndex > newIndex)
			{
				return true;
			}
			// Forbid next action on "Warning" step if the user is to young
			if (newIndex === 3 )
			{
				return false;
			}
			// Needed in some cases if the user went back (clean up)
			if (currentIndex < newIndex)
			{
				// To remove error styles
				form.find(".body:eq(" + newIndex + ") label.error").remove();
				form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
			}
			form.validate().settings.ignore = ":disabled,:hidden";
			return form.valid();
		},
		onStepChanged: function (event, currentIndex, priorIndex)
		{
			// Used to skip the "Warning" step if the user is old enough.
			if (currentIndex === 2 )
			{
				form.steps("next");
			}
			// Used to skip the "Warning" step if the user is old enough and wants to the previous step.
			if (currentIndex === 2 && priorIndex === 3)
			{
				form.steps("previous");
			}
		},
		onFinishing: async function (event, currentIndex)
		{
			form.validate().settings.ignore = ":disabled";
            if (form.valid()) {
                let res = ajaxSubmitWizzard(form, "academic-year-form");
                return res;
            }else{
				toastr.error("Problem occurred while saving\nContact Support")
				return false;
			}
		},
		onFinished: function (event, currentIndex)
		{
			showAllAcademicYears();
		}
	}).validate({
		errorPlacement: function errorPlacement(error, element) { element.before(error); },
		rules: {
			confirm: {
				equalTo: "#password-2"
			}
		}
	});
});

 $(".academic-year-form").submit(function(e) {
  let form = $(this);
  ajaxSubmit(e, form, showAllAcademicYears);
}); 
</script>