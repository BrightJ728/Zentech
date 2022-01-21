<?php
if (isset($department_id)):
  	$school_id  = school_id();
  	if(is_numeric($department_id))
		$courses = $this->db->get_where('courses_view', array('school_id' => school_id(), "department_id" => $department_id  ))->result_array();
	else
		$courses = $this->db->get_where('courses_view', array('school_id' => school_id()))->result_array();
	if (count($courses) > 0):?>
		<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
		<thead>
			<tr style="background-color: #313a46; color: #ababab;">
			<th><?= get_phrase('code'); ?></th>
			<th><?= get_phrase('title'); ?></th>
			<th><?= get_phrase('credit_hours'); ?></th>
			<th><?= get_phrase('level'); ?></th>
			<th><?= get_phrase('semester'); ?></th>
			<th><?= get_phrase('department'); ?></th>

			<th><?= get_phrase('options'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($courses as $course){ ?>
			<tr>
				<td><?= $course['code']; ?></td>
				<td><?= $course['title']; ?></td>
				<td><?= $course['credit_hours']; ?></td>

				<td><?= $course['level']; ?></td>
				<td><?= $course['semester']; ?></td>
				<td><?= $course['department']; ?></td>

				<td>

				<div class="dropdown text-center">
					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
					<div class="dropdown-menu dropdown-menu-right">
					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/course/edit/'.$course['id'])?>', '<?= get_phrase('update_course'); ?>');"><?= get_phrase('edit'); ?></a>
					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('courses/delete/'.$course['id']); ?>', showAllCourses)"><?= get_phrase('delete'); ?></a>
					</div>
				</div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		</table>
	<?php else: ?>
		<?php include APPPATH.'views/backend/empty.php'; ?>
	<?php endif; ?>
	<?php else: 
	$school_id  = school_id();
	$courses = $this->db->get_where('courses_view', array('school_id' => school_id() ))->result_array();
	if (count($courses) > 0):?>
		<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
		<thead>
			<tr style="background-color: #313a46; color: #ababab;">
			<th><?= get_phrase('code'); ?></th>
			<th><?= get_phrase('title'); ?></th>
						<th><?= get_phrase('credit_hours'); ?></th>
			<th><?= get_phrase('level'); ?></th>
			<th><?= get_phrase('semester'); ?></th>
			<th><?= get_phrase('department'); ?></th>
			<th><?= get_phrase('options'); ?></th>
			</tr>
		</thead>
		<tbody>
		
			<?php foreach($courses as $course){ ?>
			<tr>
				<td><?= $course['code']; ?></td>
				<td><?= $course['title']; ?></td>
				<td><?= $course['credit_hours']; ?></td>

				<td><?= $course['level']; ?></td>
				<td><?= $course['semester']; ?></td>
				<td><?= $course['department']; ?></td>
				<td>

				<div class="dropdown text-center">
					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
					<div class="dropdown-menu dropdown-menu-right">
					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/course/edit/'.$course['id'])?>', '<?= get_phrase('update_course'); ?>');"><?= get_phrase('edit'); ?></a>
					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('courses/delete/'.$course['id']); ?>', showAllCourses)"><?= get_phrase('delete'); ?></a>
					</div>
				</div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		</table>
	<?php else: ?>
		<?php include APPPATH.'views/backend/empty.php'; ?>
	<?php endif; ?>
<?php endif; ?>
