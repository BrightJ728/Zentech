<?php
$school_id = school_id();
$resources = $this->lecturer_model->get_course_resources($course_id);
if (count($resources) > 0): ?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th><?= get_phrase('description'); ?></th>
			<th style="width:50px"><?= get_phrase('options'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($resources as $resource): ?>
			<tr>
				<td><?= $resource['description']; ?></td>
				<td>
					<div class="dropdown text-center">
						<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
						<div class="dropdown-menu dropdown-menu-right">
							<!-- item-->
							<a  href="<?= course_resource_path($resource["src"]) ?>" download class="dropdown-item link" > Download</a>
						
							<!-- item-->
							<a target="blank" href="<?= course_resource_path($resource["src"]) ?>" class="dropdown-item link" > Preview</a>
							
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item link" onclick="confirmModal('<?= route('courses/delete_resource/'. $resource['id'])?>', showAllResources)" > Delete</a>
						</div>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
	<?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
