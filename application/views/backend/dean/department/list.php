<?php
$school_id = school_id();
$departments = $this->db->get_where('departments', array('school_id' => $school_id))->result_array();
if (count($departments) > 0): ?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th><?= get_phrase('name'); ?></th>
			<th><?= get_phrase('options'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($departments as $department): ?>
			<tr>
				<td><?= $department['name']; ?></td>
				<td>
					<div class="dropdown text-center">
						<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
						<div class="dropdown-menu dropdown-menu-right">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/department/edit/'.$department['id'])?>', '<?= get_phrase('update_department'); ?>');"><?= get_phrase('edit'); ?></a>
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('department/delete/'.$department['id']); ?>', showAllDepartments)"><?= get_phrase('delete'); ?></a>
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
