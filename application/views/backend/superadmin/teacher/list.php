<?php
$school_id = school_id();
$check_data = $this->db->get_where('lecturers', array('school_id' => $school_id));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('image'); ?></th>
            <th><?= get_phrase('name'); ?></th>
            <th><?= get_phrase('department'); ?></th>
            <th><?= get_phrase('designation'); ?></th>
            <th><?= get_phrase('options'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $lecturers = $this->db->get_where('lecturers', array('school_id' => $school_id))->result_array();
        foreach($lecturers as $lecturer){
            ?>
            <tr>
                <td><img class="rounded-circle" width="50" height="50" src="<?= $this->user_model->get_user_image($lecturer['user_id']); ?>"></td>
                <td><?= $this->db->get_where('users', array('id' => $lecturer['user_id']))->row('name'); ?></td>
                <td><?= $this->db->get_where('departments', array('id' => $lecturer['department_id']))->row('name'); ?></td>
                <td><?= $lecturer['designation']; ?></td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/lecturer/permission_overview/'.$lecturer['id'].'/'.$lecturer['user_id']); ?>', '<?= get_phrase('assigned_permissions'); ?>')"><?= get_phrase('permissions'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/lecturer/edit/'.$lecturer['user_id']); ?>', '<?= get_phrase('update_lecturer'); ?>')"><?= get_phrase('edit'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('lecturer/delete/'.$lecturer['user_id']); ?>', showAlllecturers )"><?= get_phrase('delete'); ?></a>
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
