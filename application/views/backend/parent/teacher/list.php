<?php
$school_id = school_id();
$check_data = $this->db->get_where('lecturers', array('school_id' => $school_id));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?= get_phrase('name'); ?></th>
            <th><?= get_phrase('department'); ?></th>
            <th><?= get_phrase('designation'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $lecturers = $this->db->get_where('lecturers', array('school_id' => $school_id))->result_array();
        foreach($lecturers as $lecturer){
            ?>
            <tr>
                <td><?= $this->db->get_where('users', array('id' => $lecturer['user_id']))->row('name'); ?></td>
                <td><?= $this->db->get_where('departments', array('id' => $lecturer['department_id']))->row('name'); ?></td>
                <td><?= $lecturer['designation']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
