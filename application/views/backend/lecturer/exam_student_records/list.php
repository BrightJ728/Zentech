<!-- <?php
    $status = "pending";
    if (count($student_records) > 0){ ?>
        <form name="assessment_form" class="d-block ajaxForm" method="POST" action="<?= route('records/bulk_update_student_records') ?>">
            <input type="hidden" name="academic_year_id" value="<?= $student_records[0]['academic_year_id']?>"/>
            <input type="hidden" name="course_id" value="<?= $student_records[0]['course_id']?>"/>
            <table id="datatable-buttons1" class="table table-striped dt-responsive nowrap" width="100%">
                <thead>
                    <tr style="background-color: #313a46; color: #ababab;">
                        <th><?= get_phrase('name'); ?></th>
                        <th><?= get_phrase('class_score'); ?> (30%)</th>
                        <th><?= get_phrase('exam_score'); ?> (70%)</th>
                        <th><?= get_phrase('total'); ?> (100%)</th>
                        <th><?= get_phrase('actions'); ?></th>
                         <th><?= get_phrase('status'); ?></th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($student_records as $student_record): ?>
                        <?php if($student_record["status"] === "pending"){ ?>

                            <tr>
                                <td><?= $student_record['first_name'] . " " . $student_record['last_name'] ?></td>
                               
                                <td><span id="class_mark-<?=$student_record['id']?>"><?= $student_record["class_score"]?></span></td>

                                <td><span id="class_mark-<?=$student_record['id']?>"><?= $student_record["exam_score"]?></span></td>
                                
                                <td><span id="total_mark-<?=$student_record['id']?>"><?= $student_record["class_score"] + $student_record["exam_score"] ?></span></td>
                                <td>
                                    <a 
                                        title="<?= get_phrase('update') ?>"  
                                        class="btn btn-primary"
                                        href="#" 
                                        onclick="return showAjaxModal('<?= route('records/edit/' . $student_record['id'])?>', '<?= get_phrase('Update Record'); ?>');">
                                        <i class="fa fa-pencil"></i>
                                        
                                    </a>
                                </td>
                                <input type="hidden" name="record_id-<?=$student_record['id']?>" value="<?= $student_record['id']?>"/>
                                <td><?= $student_record["status"] ?></td>


                            </tr>


                        <?php }else{  $status = $student_record["status"]; ?>

                            <tr>
                                <td><?= $student_record['first_name'] . " " . $student_record['last_name'] ?></td>
                                <td><div class="form-control"><span><?= $student_record["class_score"] ?? 'N/A' ?></span></div></td>
                                <td><div class="form-control"><span><?= $student_record["exam_score"] ?? 'N/A' ?></span></div></td>
                                <td><span id="total_mark-<?=$student_record['id']?>"><?= $student_record["class_score"] + $student_record["exam_score"] ?></span></td>
                                <td>
                                    N/A
                                </td>

                                <td><?= $student_record["status"] ?></td>

                            </tr>

                    <?php } ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if($status === "pending"){ ?>
                <div class="row float-right pr-4 mr-5">
                    <button class="btn btn-primary" type="submit">Approve Grades</button>

                </div>
                      <div class="alert alert-primary" role="alert">Grades have been sent to the Exam Officer <p>NB: Changes are allowed to the pending grades before Exams Officer approval</p></div>           

            <?php }else {?>
                <div class="alert alert-primary" role="alert">Records have been Approved<p>NB: No further changes allowed</p></div>
            <?php } ?>

        </form>


    <?php } else if (count($registered_students) > 0){ ?>


        <form name="assessment_form" class="d-block ajaxForm" method="POST" action="<?= route('records/save_student_record') ?>">
            <input type="hidden" name="academic_year_id" value="<?= $registered_students[0]['academic_year_id']?>"/>
            <input type="hidden" name="course_id" value="<?= $registered_students[0]['course_id']?>"/>
            
            <table id="datatable-buttons1" class="table table-striped dt-responsive nowrap" width="100%">
                <thead>
                    <tr style="background-color: #313a46; color: #ababab;">
                        <th><?= get_phrase('name'); ?></th>
                        <th><?= get_phrase('class_score'); ?> (30%)</th>
                        <th><?= get_phrase('exam_score'); ?> (70%)</th>
                        <th><?= get_phrase('total'); ?> (100%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registered_students as $registered_student): ?>
                        <tr>
                            <td><?= $registered_student['first_name'] . " " . $registered_student['last_name'] ?></td>
                            <td><input type="number" min="0" max="30" onkeyup="calcTotal(<?=$registered_student['student_id']?>)" class="form-control" name="class_mark-<?=$registered_student['student_id']?>" id="class_mark-<?=$registered_student['student_id']?>" placeholder="class mark"/></td>
                            <td><input type="number" min="0" max="70" onkeyup="calcTotal(<?=$registered_student['student_id']?>)" class="form-control" name="exam_mark-<?=$registered_student['student_id']?>" id="exam_mark-<?=$registered_student['student_id']?>" placeholder="exam mark"/></td>
                            <td><span id="total_mark-<?=$registered_student['student_id']?>">N/A</span></td>
                           
                            <input type="hidden" name="course_registration_id-<?=$registered_student['student_id']?>" value="<?= $registered_student['id']?>"/>
                            <input type="hidden" name="semester_id-<?=$registered_student['student_id']?>" value="<?= $registered_student['semester_id']?>"/>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row float-right pr-4">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    <?php } else { ?>
        <?php include APPPATH.'views/backend/empty.php'; ?>
    <?php } ?>
<script>
    $(document).ready(function () {
        $(".ajaxForm").validate({}); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, () => {window.location.reload()});
        });
    });
</script> -->
