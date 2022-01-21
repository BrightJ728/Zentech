<?php
$school_id = school_id();
$fees = $this->accounting_m->get_academic_fees();
if (count($fees) > 0): ?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th><?= get_phrase('academic_year'); ?></th>
			<th><?= get_phrase('program'); ?></th>
			<th><?= get_phrase('level'); ?></th>
			<th><?= get_phrase('fee'); ?></th>
			<th><?= get_phrase('student_type'); ?></th>
			<th><?= get_phrase('options'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($fees as $fee): ?>
			<tr>
				<td><?= $fee['academic_year']; ?></td>
				<td><?= $fee['program']; ?></td>
				<td><?= $fee['year_level']; ?></td>
				<td><?= $fee['currency_symbol'] . " " .number_format($fee['amount']); ?></td>
				<td><?= get_phrase($fee['student_type']) ?></td>
				<td>
					<div class="dropdown text-center">
						<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
						<div class="dropdown-menu dropdown-menu-right">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/fees/edit/'.$fee['id'])?>', '<?= get_phrase('update_fee'); ?>');"><?= get_phrase('edit'); ?></a>
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('fees/delete/'.$fee['id']); ?>', showAllfees)"><?= get_phrase('delete'); ?></a>
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

