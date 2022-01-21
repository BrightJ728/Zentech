<div class="row" style="min-width: 300px;">
    <div class="col-md-12">
        <h5 class="text-center"><?= $this->db->get_where('users', array('id' => $param2))->row('name'); ?></h5>
        <?php $lecturer_permissions = $this->db->get_where('lecturer_permissions', array('lecturer_id' => $param1))->result_array();
            $count = 0;
            foreach($lecturer_permissions as $lecturer_permission){
                $count++;
        ?>
                <table class="table table-hover table-centered table-bordered mb-0" style="margin-bottom: 50px !important; background-color: #FAFAFA;">
                    <tbody>
                        <tr>
                            <td><?= get_phrase('class'); ?></td>
                            <td>
                                <?= $this->db->get_where('classes', array('id' => $lecturer_permission['class_id']))->row('name'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= get_phrase('section'); ?></td>
                            <td>
                                <?= $this->db->get_where('sections', array('id' => $lecturer_permission['section_id']))->row('name'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= get_phrase('marks'); ?></td>
                            <td>
                                <i class="mdi mdi-circle text-<?php if($lecturer_permission['marks'] == 1){echo 'success';}else{echo 'danger';} ?>"></i>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td><?= get_phrase('assignment'); ?></td>
                            <td>
                                <i class="mdi mdi-circle text-<?php if($lecturer_permission['assignment'] == 1){echo 'success';}else{echo 'danger';} ?>"></i>
                            </td>
                        </tr> -->
                        <tr>
                            <td><?= get_phrase('attendance'); ?></td>
                            <td>
                                <i class="mdi mdi-circle text-<?php if($lecturer_permission['attendance'] == 1){echo 'success';}else{echo 'danger';} ?>"></i>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td><?= get_phrase('online_exam'); ?></td>
                            <td>
                                <i class="mdi mdi-circle text-<?php if($lecturer_permission['online_exam'] == 1){echo 'success';}else{echo 'danger';} ?>"></i>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
        <?php } ?>
        <?php if($count == 0){ ?>
            <p class = "text-center"><?= get_phrase('no_permission_assigned_yet'); ?></p>
        <?php } ?>
        <a href="<?= route('permission'); ?>" class="btn btn-info btn-block"><?= get_phrase('update_permissions'); ?></a>
    </div>
</div>
