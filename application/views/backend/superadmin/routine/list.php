<?php if(isset($class_id) && isset($section_id)): ?>
    <table class="table table-striped table-bordered table-centered mb-0">
        <tbody>
            <tr>
                <td style="font-weight: bold; width : 100px;"><?= get_phrase('saturday'); ?></td>
                <td class="m-1">

                        <?php
                            $satureday_routines = $this->db->get_where('routines', array('class_id' => $class_id, 'section_id' => $section_id, 'session_id' => active_session(), 'day' => 'saturday'))->result_array();
                        	foreach($satureday_routines as $satureday_routine){
                        ?>
                            <div class="btn-group text-left">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	<?= $this->db->get_where('subjects', array('id' => $satureday_routine['subject_id']))->row('name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	<?= $satureday_routine['starting_hour'].':'.$satureday_routine['starting_minute'].' - '.$satureday_routine['ending_hour'].':'.$satureday_routine['ending_minute']; ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	<?= $this->user_model->get_user_details($this->db->get_where('lecturers', array('id' => $satureday_routine['lecturer_id']))->row('user_id'), 'name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	<?= $this->db->get_where('class_rooms', array('id' => $satureday_routine['room_id']))->row('name'); ?>
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/routine/edit/'.$satureday_routine['id'])?>', '<?= get_phrase('update_routine'); ?>');"><?= get_phrase('edit'); ?></a>
                                    <a class="dropdown-item" onclick="confirmModal('<?= route('routine/delete/'.$satureday_routine['id']); ?>', getFilteredClassRoutine)"><?= get_phrase('delete'); ?></a>
                                </div>
                            </div>
                        <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; width : 100px;"><?= get_phrase('sunday'); ?></td>
                <td class="m-1">

                        <?php
                        	$sunday_routines = $this->db->get_where('routines', array('class_id' => $class_id, 'section_id' => $section_id, 'session_id' => active_session(), 'day' => 'sunday'))->result_array();
                        	foreach($sunday_routines as $sunday_routine){
                        ?>
                            <div class="btn-group text-left">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	<?= $this->db->get_where('subjects', array('id' => $sunday_routine['subject_id']))->row('name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	<?= $sunday_routine['starting_hour'].':'.$sunday_routine['starting_minute'].' - '.$sunday_routine['ending_hour'].':'.$sunday_routine['ending_minute']; ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	<?= $this->user_model->get_user_details($this->db->get_where('lecturers', array('id' => $sunday_routine['lecturer_id']))->row('user_id'), 'name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	<?= $this->db->get_where('class_rooms', array('id' => $sunday_routine['room_id']))->row('name'); ?>
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/routine/edit/'.$sunday_routine['id'])?>', '<?= get_phrase('update_routine'); ?>');"><?= get_phrase('edit'); ?></a>
                                    <a class="dropdown-item" onclick="confirmModal('<?= route('routine/delete/'.$sunday_routine['id']); ?>', getFilteredClassRoutine)"><?= get_phrase('delete'); ?></a>
                                </div>
                            </div>
                        <?php } ?>

                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; width : 100px;"><?= get_phrase('monday'); ?></td>
                <td class="m-1">

                        <?php
                        	$monday_routines = $this->db->get_where('routines', array('class_id' => $class_id, 'section_id' => $section_id, 'session_id' => active_session(), 'day' => 'monday'))->result_array();
                        	foreach($monday_routines as $monday_routine){
                        ?>
                            <div class="btn-group text-left">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	<?= $this->db->get_where('subjects', array('id' => $monday_routine['subject_id']))->row('name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	<?= $monday_routine['starting_hour'].':'.$monday_routine['starting_minute'].' - '.$monday_routine['ending_hour'].':'.$monday_routine['ending_minute']; ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	<?= $this->user_model->get_user_details($this->db->get_where('lecturers', array('id' => $monday_routine['lecturer_id']))->row('user_id'), 'name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	<?= $this->db->get_where('class_rooms', array('id' => $monday_routine['room_id']))->row('name'); ?>
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/routine/edit/'.$monday_routine['id'])?>', '<?= get_phrase('update_routine'); ?>');"><?= get_phrase('edit'); ?></a>
                                    <a class="dropdown-item" onclick="confirmModal('<?= route('routine/delete/'.$monday_routine['id']); ?>', getFilteredClassRoutine)"><?= get_phrase('delete'); ?></a>
                                </div>
                            </div>
                        <?php } ?>

                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; width : 100px;"><?= get_phrase('tuesday'); ?></td>
                <td class="m-1">

                        <?php
                        	$tuesday_routines = $this->db->get_where('routines', array('class_id' => $class_id, 'section_id' => $section_id, 'session_id' => active_session(), 'day' => 'tuesday'))->result_array();
                        	foreach($tuesday_routines as $tuesday_routine){
                        ?>
                            <div class="btn-group text-left">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	<?= $this->db->get_where('subjects', array('id' => $tuesday_routine['subject_id']))->row('name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	<?= $tuesday_routine['starting_hour'].':'.$tuesday_routine['starting_minute'].' - '.$tuesday_routine['ending_hour'].':'.$tuesday_routine['ending_minute']; ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	<?= $this->user_model->get_user_details($this->db->get_where('lecturers', array('id' => $tuesday_routine['lecturer_id']))->row('user_id'), 'name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	<?= $this->db->get_where('class_rooms', array('id' => $tuesday_routine['room_id']))->row('name'); ?>
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/routine/edit/'.$tuesday_routine['id'])?>', '<?= get_phrase('update_routine'); ?>');"><?= get_phrase('edit'); ?></a>
                                    <a class="dropdown-item" onclick="confirmModal('<?= route('routine/delete/'.$tuesday_routine['id']); ?>', getFilteredClassRoutine)"><?= get_phrase('delete'); ?></a>
                                </div>
                            </div>
                        <?php } ?>

                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; width : 100px;"><?= get_phrase('wednesday'); ?></td>
                <td class="m-1">

                        <?php
                        	$wednesday_routines = $this->db->get_where('routines', array('class_id' => $class_id, 'section_id' => $section_id, 'session_id' => active_session(), 'day' => 'wednesday'))->result_array();
                        	foreach($wednesday_routines as $wednesday_routine){
                        ?>
                            <div class="btn-group text-left">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	<?= $this->db->get_where('subjects', array('id' => $wednesday_routine['subject_id']))->row('name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	<?= $wednesday_routine['starting_hour'].':'.$wednesday_routine['starting_minute'].' - '.$wednesday_routine['ending_hour'].':'.$wednesday_routine['ending_minute']; ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	<?= $this->user_model->get_user_details($this->db->get_where('lecturers', array('id' => $wednesday_routine['lecturer_id']))->row('user_id'), 'name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	<?= $this->db->get_where('class_rooms', array('id' => $wednesday_routine['room_id']))->row('name'); ?>
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/routine/edit/'.$wednesday_routine['id'])?>', '<?= get_phrase('update_routine'); ?>');"><?= get_phrase('edit'); ?></a>
                                    <a class="dropdown-item" onclick="confirmModal('<?= route('routine/delete/'.$wednesday_routine['id']); ?>', getFilteredClassRoutine)"><?= get_phrase('delete'); ?></a>
                                </div>
                            </div>
                        <?php } ?>

                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; width : 100px;"><?= get_phrase('thursday'); ?></td>
                <td class="m-1">

                        <?php
                        	$thursday_routines = $this->db->get_where('routines', array('class_id' => $class_id, 'section_id' => $section_id, 'session_id' => active_session(), 'day' => 'thursday'))->result_array();
                        	foreach($thursday_routines as $thursday_routine){
                        ?>
                            <div class="btn-group text-left">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	<?= $this->db->get_where('subjects', array('id' => $thursday_routine['subject_id']))->row('name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	<?= $thursday_routine['starting_hour'].':'.$thursday_routine['starting_minute'].' - '.$thursday_routine['ending_hour'].':'.$thursday_routine['ending_minute']; ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	<?= $this->user_model->get_user_details($this->db->get_where('lecturers', array('id' => $thursday_routine['lecturer_id']))->row('user_id'), 'name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	<?= $this->db->get_where('class_rooms', array('id' => $thursday_routine['room_id']))->row('name'); ?>
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/routine/edit/'.$thursday_routine['id'])?>', '<?= get_phrase('update_routine'); ?>');"><?= get_phrase('edit'); ?></a>
                                    <a class="dropdown-item" onclick="confirmModal('<?= route('routine/delete/'.$thursday_routine['id']); ?>', getFilteredClassRoutine)"><?= get_phrase('delete'); ?></a>
                                </div>
                            </div>
                        <?php } ?>

                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; width : 100px;"><?= get_phrase('friday'); ?></td>
                <td class="m-1">

                        <?php
                        	$friday_routines = $this->db->get_where('routines', array('class_id' => $class_id, 'section_id' => $section_id, 'session_id' => active_session(), 'day' => 'friday'))->result_array();
                        	foreach($friday_routines as $friday_routine){
                        ?>
                            <div class="btn-group text-left">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	<?= $this->db->get_where('subjects', array('id' => $friday_routine['subject_id']))->row('name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	<?= $friday_routine['starting_hour'].':'.$friday_routine['starting_minute'].' - '.$friday_routine['ending_hour'].':'.$friday_routine['ending_minute']; ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	<?= $this->user_model->get_user_details($this->db->get_where('lecturers', array('id' => $friday_routine['lecturer_id']))->row('user_id'), 'name'); ?>
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	<?= $this->db->get_where('class_rooms', array('id' => $friday_routine['room_id']))->row('name'); ?>
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/routine/edit/'.$friday_routine['id'])?>', '<?= get_phrase('update_routine'); ?>');"><?= get_phrase('edit'); ?></a>
                                    <a class="dropdown-item" onclick="confirmModal('<?= route('routine/delete/'.$friday_routine['id']); ?>', getFilteredClassRoutine)"><?= get_phrase('delete'); ?></a>
                                </div>
                            </div>
                        <?php } ?>

                </td>
            </tr>
        </tbody>
    </table>
<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>


<style>
    .dropdown-toggle::after{
        display: none;
    }
</style>
