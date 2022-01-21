<?php
$lecturers = $this->db->get_where('lecturers', array('school_id' => school_id() ) )->result_array();
if(count($lecturers) > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('image'); ?></th>
            <th><?= get_phrase('name'); ?></th>
            <th><?= get_phrase('department'); ?></th>
            <th><?= get_phrase('courses'); ?></th>
            <th><?= get_phrase('options'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($lecturers as $lecturer){
                $courses = $this->lecturer_model->get_assigned_courses($lecturer["id"]);
            ?>
            <tr>
                <td><img class="rounded-circle" width="50" height="50" src="<?= $this->user_model->get_user_image($lecturer['user_id']); ?>"></td>
                <td><?= $this->db->get_where('users', array('id' => $lecturer['user_id']))->row('name'); ?></td>
                <td><?= $this->db->get_where('departments', array('id' => $lecturer['department_id']))->row('name'); ?></td>
                <td>
                    <table class="table table-borderless table-white">
                        <?php foreach($courses as $course){ ?>
                            <tr>
                                <td><?= $course["code"] ?></td>
                                <td><a href="javascript:void(0);" class="link" onclick="confirmModal('<?= route('lecturer/revoke_course/'.$course['course_id']); ?>', showAllLecturers )"><i class="fa fa-window-close"></i></a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/lecturer/assign_course/'.$lecturer['id']); ?>', '<?= get_phrase('assign_course'); ?>')"><?= get_phrase('assign_course'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/lecturer/edit/'.$lecturer['user_id']); ?>', '<?= get_phrase('update_lecturer'); ?>')"><?= get_phrase('edit'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('lecturer/delete/'.$lecturer['user_id']); ?>', showAllLecturers )"><?= get_phrase('delete'); ?></a>
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

<style>
    table.dataTable tbody td.focus, table.dataTable tbody th.focus {
        outline: 0px none #00000000!important;
        outline-offset: -1px;
        background-color: rgba(114,124,245,.15);
    }
</style>
