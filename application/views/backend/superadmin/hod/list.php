<?php
$hods = $this->db->get_where('head_of_departments', array('school_id' => school_id() ) )->result_array();
if(count($hods) > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('image'); ?></th>
            <th><?= get_phrase('name'); ?></th>
            <th><?= get_phrase('department'); ?></th>
            <th><?= get_phrase('options'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($hods as $hod){
                $courses = $this->lecturer_model->get_assigned_courses($hod["lecturer_id"]);
            ?>
            <tr>
                <td><img class="rounded-circle" width="50" height="50" src="<?= $this->user_model->get_user_image($hod['user_id']); ?>"></td>
                <td><?= $this->db->get_where('users', array('id' => $hod['user_id']))->row('name'); ?></td>
                <td><?= $this->db->get_where('departments', array('id' => $hod['department_id']))->row('name'); ?></td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/hod/edit/'.$hod['user_id']); ?>', '<?= get_phrase('update_head_of_department'); ?>')"><?= get_phrase('edit'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('hod/delete/'.$hod['user_id']); ?>', showAllHODS )"><?= get_phrase('delete'); ?></a>
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
