<?php
$school_id = school_id();
$check_data = $this->db->get_where('users', array('school_id' => $school_id, 'role' => 'accountant'));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th><?= get_phrase('name'); ?></th>
			<th><?= get_phrase('email'); ?></th>
			<th><?= get_phrase('options'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$users = $this->db->get_where('users', array('school_id' => $school_id, 'role' => 'accountant'))->result_array();
		foreach($users as $user){
			?>
			<tr>
				<td><?= $user['name']; ?></td>
				<td><?= $user['email']; ?></td>
				<td>
					<div class="dropdown text-center">
						<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
						<div class="dropdown-menu dropdown-menu-right">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/accountant/edit/'.$user['id'])?>', '<?= get_phrase('update_accountant'); ?>');"><?= get_phrase('edit'); ?></a>
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('accountant/delete/'.$user['id']); ?>', showAllAccountants )"><?= get_phrase('delete'); ?></a>
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
