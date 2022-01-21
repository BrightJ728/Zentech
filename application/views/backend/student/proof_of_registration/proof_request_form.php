<?php 
	$academic_years = $this->crud_model->get_academic_years();
	$settings = $this->settings_model->get_current_school_data();
?>
<form method="POST" class="col-12 d-block ajaxForm" action="<?=route ('proof_of_registration/pdf'); ?>" id="course_registration" enctype="multipart/form data">
	<div class="form-group col-md-8">
		<label for="academic_year_id"><?= ucwords( get_phrase('academic_year') ) ?></label>
		<select name="academic_year_id" id="academic_year_id" class="form-control select2" data-toggle="select2" onchange="getSemesters(this.value)" required>
			<option value=""><?= get_phrase('select_academic_year'); ?></option>
			<?php foreach($academic_years as $academic_year): ?>
			<option value="<?= $academic_year['id']; ?>"><?= $academic_year['description']; ?></option>
			<?php endforeach; ?>
		</select>
		<small id="class_help" class="form-text text-muted"><?= get_phrase('select_an_academic_year'); ?></small>
	</div>
	<div class="form-group col-md-8">
		<label for="semester_id"><?= get_phrase('semester'); ?></label>
		<select id="semester_id" name="semester_id" class="form-control select2" disabled data-toggle="select2" required>
		<option selected value=''><?= get_phrase("choose") ?>...</option>
		</select>
		<small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_semester'); ?></small>
	</div>

	<div class="text-left">
        <button aria-label="submit" type="submit" class="btn btn-primary col-md-2 col-sm-6 mb-4"><?= get_phrase('print'); ?></button>
    </div>
</form>

<script>
	function getSemesters(academic_year_id) {
		console.log("called");
		if(academic_year_id !== "" && isFinite(academic_year_id)){
			$.ajax({
				url: "<?= route('proof_of_registration/semester_academic_year'); ?>/" + academic_year_id,
				success: function(response){
					if(response == ""){
						$('#semester_id').html('<option selected value=""><?= get_phrase("choose") ?>...</option>');
					}else{
						$('#semester_id').html(response);
						$('#semester_id').removeAttr("disabled");
					}
				},
				error: function(response){
					$('#semester_id').html('<option selected value=""><?= get_phrase("choose") ?>...</option>');
					$('#semester_id').attr("disabled", "disabled")
					toastr.error('<?= get_phrase("error_occurred")?>');
				}
			});
		}else{
			$('#semester_id').html('<option value=""><?= get_phrase('no_semesters_found'); ?></option>');
		}
	}
</script>