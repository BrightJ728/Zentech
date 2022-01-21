<?php
	$courses = $this->lecturer_model->get_assigned_courses_by_user_id(user_id());
	$academic_year = $this->crud_model->get_academic_years($academic_year_id);
	if (count($courses) > 0): ?>
		<div class="course-all">
			<div class="mb-2">
				<span class="font-13">Academic Year: </span> 
				<span class="font-16 font-weight-bold"><?= $academic_year["description"] ?></span>
			</div>
			<div class="row">
				<div class="form-group search-bar">
					<div class="input-group input-group-transparent">
						<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
						<input type="text" class="form-control" onkeyup="filter_courses(this.value)" placeholder="Search...">
					</div>
				</div>
			</div>
			<div class="row clearfix" id="course-items">
				<?php foreach($courses as $course){ 
					$registered_students = $this->student_model->get_course_registered_students($course["course_id"], $academic_year_id);
					?>
					<div class="col-xl-3 col-lg-4 col-md-6">
						<div class="card mcard_4 border rounded shadow p-2">
							<div class="body">
								<div class="info">
									<h5 class="mt-3 mb-1 card-title"><?= $course['title'] ?></h5>
									<small class="text-muted"><?= $course['code'] ?></small><br><br>
									<span class="text-muted"><?= get_phrase("registered_students") ?>: <?= count($registered_students) ?></span><br>
								</div>
								<div class="d-flex flex-wrap">
									<span class="m-1">
										<a title="<?= get_phrase('resources') ?>" href="<?= route("courses/resource/"). $course["course_id"] ?>" class="btn btn-primary"><i class="fa fa-book"></i> </a>
									</span>
									<span class="m-1">
										<a title="<?= get_phrase('students') ?>" href="javaScript:void(0);" onclick="return showAjaxModal('<?= route('courses/students_list/' . $course['course_id']  . '/' . $academic_year_id )?>', '<?= get_phrase('registered_students'); ?>', ()=>{initDataTableWithButtons('datatable-buttons1')});" class="btn btn-primary"><i class="fa fa-users"></i> </a>
									</span>
									<span class="m-1">
										<a 
											title="<?= get_phrase('course_details') ?>"  
											class="btn btn-primary" 
											href="javaScript:void(0);" 
											onclick="return showAjaxModal('<?= route('courses/info/' . $course['course_id'])?>', '<?= get_phrase('course_details'); ?>');">
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
			<p>You have not been assigned to any courses.</p>
			<p class="danger text-danger">Contact Admin if you believe this is an error.</p>
		</div>
	<?php endif; ?>
