<?php
    $student = $this->db->get_where('students', array('id' => $param1))->row_array();
?>
<div class="h-100">
    <div class="row align-items-center h-100">
        <div class="col-md-4 pb-2">
            <div class="text-center">
                <img class="rounded-circle" width="50" height="50" src="<?= $this->user_model->get_user_image($student['user_id']); ?>">
                <br>
                <span style="font-weight: bold;">
                    <?= get_phrase('name'); ?>: <?= $this->user_model->get_user_details($student['user_id'], 'name'); ?>
                </span>
                <br>
                <span style="font-weight: bold;">
                    <?= get_phrase('student_code'); ?>: <?= $student['code']; ?>
                </span>
            </div>
        </div>
        <div class="col-md-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?= get_phrase('bio'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="emergency_contact-tab" data-toggle="tab" href="#emergency_contact" role="tab" aria-controls="emergency_contact" aria-selected="false"><?= get_phrase('emergency_contact'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="certificates-tab" data-toggle="tab" href="#certificates" role="tab" aria-controls="certificates" aria-selected="false"><?= get_phrase('certificates'); ?></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-centered mb-0">
                        <tbody>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('name'); ?>:</td>
                                <td><?= $this->user_model->get_user_details($student['user_id'], 'name'); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('year_admited'); ?>:</td>
                                <td>
                                    <?= $student["year_group"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('nationality'); ?>:</td>
                                <td>
                                    <?= $student["nationality"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('date_of_birth'); ?>:</td>
                                <td>
                                    <?= date("jS F Y", strtotime($student["dob"])) ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show" id="emergency_contact" role="tabpanel" aria-labelledby="emergency_contact-tab">
                    <table class="table table-centered mb-0">
                        <tbody>
                        <?php 
                            $emergency_contact1 = json_decode($student["emergency_contact1"], TRUE);
                            $emergency_contact2 = json_decode($student["emergency_contact2"], TRUE);

                        ?>
                            <tr><td><b><?= get_phrase("emergency_contact_1") ?></td></b></tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('name'); ?>:</td>
                                <td><?= $emergency_contact1["name"] ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('phone'); ?>:</td>
                                <td><?= $emergency_contact1["phone"] ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('email'); ?>:</td>
                                <td>
                                    <?= $emergency_contact1["email"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('relationship'); ?>:</td>
                                <td>
                                    <?= $this->db->get_where("relationships", ["id" => $emergency_contact1["relationship_id"]])->row()->description ?>
                                </td>
                            </tr>

                            <tr><td><b><?= get_phrase("emergency_contact_2") ?></td></b></tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('name'); ?>:</td>
                                <td><?= $emergency_contact2["name"] ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('phone'); ?>:</td>
                                <td><?= $emergency_contact2["phone"] ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('email'); ?>:</td>
                                <td>
                                    <?= $emergency_contact2["email"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;"><?= get_phrase('relationship'); ?>:</td>
                                <td>
                                    <?= $this->db->get_where("relationships", ["id" => $emergency_contact2["relationship_id"]])->row()->description ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show" id="certificates" role="tabpanel" aria-labelledby="certificates-tab">
                    <table class="table table-centered mb-0">
                        <tbody>
                        <?php 
                            $certificates = json_decode($student["certificates"], TRUE);
                            foreach($certificates as $certificate){?>
                                <tr>
                                    <td style="font-weight: bold;"><?= get_phrase('certificates'); ?>:</td>
                                    <td><?= $certificate["institution"] ?></td>
                                    <td><?= $certificate["type"] ?></td>
                                    <td><?= $certificate["year"] ?></td>
                                    <td><a target="blank" href="<?= base_url($certificate["src"]) ?>"><button class="btn btn-primary"><i class="fa fa-download"></i></button></a></td>
                                </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>