<form name="assessment_form" class="d-block ajaxForm" method="POST" action="<?= route("records/update_student_record") ?>">
	<input type="hidden" name="record_id" value="<?= $record['id']?>" />
	<div class="form-group">
		<label>Course</label>
		<div class="form-control">
			<span class="font-16 font-weight-bold"><?= $record['course_title'] ?></span>
		</div>
	</div>
	<div class="form-group">
		<label>Academic Year</label>
		<div class="form-control">
			<span class="font-16 font-weight-bold"><?= $record['academic_year'] ?></span>
		</div>
	</div>
	<div class="form-group">
		<label>Name</label>
		<div class="form-control">
			<span class="font-16 font-weight-bold"><?= $record['first_name'] . " " . $record['last_name'] ?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label>Class Score(30%)</label>
		<input type="number" min="0" max="30" value="<?= $record["class_score"] ?? '' ?>" onkeyup="calcTotal(0, 'single')" class="form-control" name="class_mark" id="class_mark-0" placeholder="class mark"/>
	</div>
	<div class="form-group">
		<label>Exam Score(70%)</label>
		<input type="number" min="0" max="70" value="<?= $record["exam_score"] ?? '' ?>" onkeyup="calcTotal(0, 'single')" class="form-control" name="exam_mark" id="exam_mark-0" placeholder="exam mark"/>
	</div>
	<div class="form-group">
		<label>Total Score (100%)</label>
		<div class="form-control">
			<span id="total_mark-0"><?= $record["class_score"] + $record["exam_score"] ?><span>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
</form>

<script>
	$(document).ready(function () {
        $(".ajaxForm").validate({}); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, () => {window.location.reload()});
        });
    });
</script>
