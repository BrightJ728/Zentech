<?php 
	
?>

<!--title-->
<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title">
					<i class="mdi mdi-account-circle title_icon"></i> <?= get_phrase('records'); ?>
				</h4>
				<a href='<?= route('vetting') ?>' class="btn btn-primary btn-rounded"> <i class="mdi mdi-arrow-left"></i> <?= get_phrase('back'); ?></a>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card p-2">
			<div class="info">
			<table class="table-borderless ml-3">
				<tr>
					<td colspan="2" style="min-width:120px">Title:</td>
					<td><span class="font-16 font-weight-bold"><?= $course['title'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">Code:</td>
					<td><span class="font-16 font-weight-bold"><?= $course['code'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">Academic Year:</td>
					<td><span class="font-16 font-weight-bold"><?= $academic_year['description'] ?></span></td>
				</tr>
			</table>
			
            <div class="card-body materials_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
	const showAllRecords = () => {
		$.ajax({
			url: '<?= route("records/course_students/{$course['id']}/{$academic_year['id']}") ?>',
			success: function(response){
				$('.materials_content').html(response);
			}
		});
	}
	function calcTotal(student_id, type = "bulk"){
		setTimeout(() => {

			let class_mark;
			let exam_mark;
			let total_mark_element;

			if(type === "bulk"){
				class_mark = document.querySelector("#class_mark-" + student_id).value;
				exam_mark = document.querySelector("#exam_mark-" + student_id).value;
				total_mark_element = document.querySelector("#total_mark-" + student_id);
			}else{
				class_mark = document.querySelector("#class_mark-0").value;
				exam_mark = document.querySelector("#exam_mark-0").value;
				total_mark_element = document.querySelector("#total_mark-0");
			}

			class_mark = parseFloat(class_mark);
			exam_mark = parseFloat(exam_mark);

			if(isFinite(class_mark) && isFinite(exam_mark)){
				total_mark_element.innerHTML = class_mark + exam_mark;
			}else{
				total_mark_element.innerHTML = "N/A";
			}
		}, 50)
	}
	window.addEventListener('DOMContentLoaded', (event) => {
		const numberInputs = document.querySelectorAll("input[type=number]");
		
		numberInputs.forEach((input) => {
			input.addEventListener("keyup", () =>{
				let min = parseInt(input.min) || 0; // if min attribute is not defined, 0 is default
				let max = parseInt(input.max) || 100; // if max attribute is not defined, 100 is default
				let val = parseInt(input.value) || (min); // if input char is not a number the value will be (min - 1) so first condition will be true
				
				if (val < min)
					input.value = min;
				if (val > max)
					input.value = max;
			});
		});

	});
</script>
