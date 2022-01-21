<?php
	$courses = $this->student_model->get_student_registered_courses_by_user_id(user_id());
	
	if (count($courses) > 0): ?>
		<div class="course-all">
			<div class="row">
				<div class="form-group search-bar">
					<div class="input-group input-group-transparent">
						<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
						<input type="text" class="form-control" onkeyup="filter_courses(this.value)" placeholder="Search...">
					</div>
				</div>
			</div>
			<div class="row clearfix" id="course-items">
				<?php foreach($courses as $course){ ?>
					<div class="col-xl-3 col-lg-4 col-md-6">
						<div class="card mcard_4 border rounded shadow">
							<div class="body">
								<div class="info">
									<h5 class="mt-3 mb-1 card-title"><?= $course['course_title'] ?></h5>
									<small class="text-muted"><?= $course['course_code'] ?></small><br><br>
								</div>
								<div class="d-flex flex-wrap">
									<span class="m-1">
										<a title="<?= get_phrase('resources') ?>" href="<?= route("courses/resource/"). $course["course_id"] ?>" class="btn btn-primary"><i class="fa fa-book"></i> </a>
									</span>
									<span class="m-1">
										<a title="<?= get_phrase('course_details') ?>"  class="btn btn-primary" href="javaScript:void(0);" onclick="return showAjaxModal('<?= route('courses/info/' . $course['course_id'])?>', '<?= get_phrase('course_details'); ?>');"><i class="my-icon my-icon-eye-outline"></i></a>
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
			<p>You have not registered for any courses this semester.</p>
			<p class="danger text-danger">Contact Admin if you believe this is an error.</p>
		</div>
	<?php endif; ?>
