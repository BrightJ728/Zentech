<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
            <select name="department_id" id="department_id" class="form-control" required>
                <option value=""><?= get_phrase('select_a_department'); ?></option>
                    <?php
                        $departments = $this->db->get_where('departments', array('school_id' => school_id()))->result_array();
                        foreach($departments as $department){
                    ?>
                        <option value="<?= $department['id']; ?>" <?php if($department_id == $department['id']) echo 'selected'; ?>><?= $department['name']; ?></option>
                    <?php } ?>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-block btn-secondary" onclick="filter_department()" ><?= get_phrase('filter'); ?></button>
        </div>
    </div>
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('name'); ?></th>
            <th><?= get_phrase('department'); ?></th>
            <th><?= get_phrase('designation'); ?></th>
            <th><?= get_phrase('options'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $school_id = school_id();
            $lecturers = $this->db->get_where('lecturers', array('department_id' => $department_id, 'school_id' => $school_id))->result_array();
            foreach($lecturers as $lecturer){
        ?>
        <tr>
            <td><?= $this->db->get_where('users', array('id' => $lecturer['user_id']))->row('name'); ?></td>
            <td><?= $this->db->get_where('departments', array('id' => $lecturer['department_id']))->row('name'); ?></td>
            <td><?= $lecturer['designation']; ?></td>
            <td>
                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirmModal('<?= site_url('modal/popup/syllabus/assign_permission'); ?>')" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= get_phrase('assign_permission_for_lecturers'); ?>"> <i class="dripicons-checklist"></i></button>
                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="rightModal('<?= site_url('modal/popup/lecturer/update/'.$lecturer['user_id']); ?>', '<?= get_phrase('update_lecturer'); ?>')" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= get_phrase('update_lecturer'); ?>"> <i class="mdi mdi-wrench"></i></button>
                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirmModal('<?= site_url('modal/popup/lecturer/delete/'.$lecturer['user_id']); ?>')" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= get_phrase('delete_lecturer'); ?>"> <i class="mdi mdi-window-close"></i></button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script type="text/javascript">
    initDataTable('basic-datatable');
</script>
