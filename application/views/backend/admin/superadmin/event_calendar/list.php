<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="alert alert-warning" role="alert">
			<i class="dripicons-information mr-2"></i> <?= get_phrase('this_events_will_get_appeared_at'); ?> <strong><?= get_phrase('user'); ?> ( <?= get_phrase('backend'); ?> ) <?= get_phrase('panel_events'); ?></strong>.
		</div>
		<div class="card">
			<div class="card-body">
				<?php $school_id = school_id(); ?>
				<?php $query = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session())); ?>
				<?php if($query->num_rows() > 0): ?>
					<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
						<thead>
							<tr style="background-color: #313a46; color: #ababab;">
								<th><?= get_phrase('event_title'); ?></th>
								<th><?= get_phrase('from'); ?></th>
								<th><?= get_phrase('to'); ?></th>
								<th><?= get_phrase('options'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$event_calendars = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session()))->result_array();
							foreach($event_calendars as $event_calendar){
								?>
								<tr>
									<td><?= $event_calendar['title']; ?></td>
									<td><?= date('D, d M Y', strtotime($event_calendar['starting_date'])); ?></td>
									<td><?= date('D, d M Y', strtotime($event_calendar['ending_date'])); ?></td>
									<td>
										<div class="dropdown text-center">
											<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
											<div class="dropdown-menu dropdown-menu-right">
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/event_calendar/edit/'.$event_calendar['id']); ?>', '<?= get_phrase('update_event'); ?>');"><?= get_phrase('edit'); ?></a>
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('event_calendar/delete/'.$event_calendar['id']); ?>', showAllEvents)"><?= get_phrase('delete'); ?></a>
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
			</div>
		</div>
	</div>
</div>
