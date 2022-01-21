<?php $check_data = $this->db->get_where('sessions', array('school_id' => school_id()));
if($check_data->num_rows() > 0): ?>

<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mt-1">
                    <div class="alert alert-info" role="alert">
                        <?= get_phrase('active_session ');?>
                        <span class="badge badge-success pt-1" id="active_session"><?= active_session("name"); ?></span>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <select class="form-control select2" data-toggle="select2" id = "session_dropdown">
                        <option value = ""><?= get_phrase('select_a_session'); ?></option>
                        <?php $sessions = $this->db->get_where('sessions', array('school_id' => school_id()))->result_array();
                        foreach($sessions as $session):?>
                        <option value="<?= $session['id']; ?>" <?php if($session['status'] == 1)echo 'selected'; ?>><?= $session['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12" style="float: left;">
                <button type="button" class="btn btn-icon btn-secondary" onclick="makeSessionActive()"> <i class="mdi mdi-check"></i><?= get_phrase('activate'); ?></button>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <table id="basic-table" class="table table-striped table-responsive-sm nowrap" width="100%">
                <thead>
                    <tr style="background-color: #313a46; color: #ababab;">
                        <th><?= get_phrase('session_title'); ?></th>
                        <th><?= get_phrase('status'); ?></th>
                        <th><?= get_phrase('options'); ?></th>
                    </tr>
                </thead>
                <tbody class="table_body">
                    <?php
                    $school_id = school_id();
                    $sessions = $this->db->get_where('sessions', array('school_id' => $school_id))->result_array();
                    foreach($sessions as $session):?>
                    <tr>
                        <td><?= $session['name']; ?></td>
                        <td>
                            <?php if($session['status'] == 1): ?>
                                <i class="mdi mdi-circle text-success"><?= get_phrase('active'); ?></i>
                            <?php else: ?>
                                <i class="mdi mdi-circle text-dark"><?= get_phrase('deactive'); ?></i>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="dropdown text-center">
                                <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/session/edit/'.$session['id'])?>', '<?= get_phrase('update_session'); ?>');"><?= get_phrase('edit'); ?></a>

                                    <!-- item-->
                                    <?php if($session['status'] != 1): ?>
                                        <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('session_manager/delete/'.$session['id']); ?>', showAllSessions)"><?= get_phrase('delete'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
