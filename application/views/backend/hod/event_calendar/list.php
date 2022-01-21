<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
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
