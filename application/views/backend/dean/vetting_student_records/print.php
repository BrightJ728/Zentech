<?php
if (count($registered_students) > 0) : ?>
<div class="img-container">
            <img src ="uploads/system/logo/logo-dark.png" width = 50%>
   </div>
   
   
   <table style="border: none">
				<tr>
					<td colspan="2" style="min-width:120px">Title:</td>
					<td><span class="font-16 font-weight-bold"><?= $course['title'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">Code:</td>
					<td><span class="font-16 font-weight-bold"><?= $course['code'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">Academic Year:</td>
					<td><span class="font-16 font-weight-bold"><?= $academic_year['description'] ?></span></td>
				</tr>
	</table>
    <table id="basic-datatable" width="100%">
    <thead>
            <tr style="background-color: #d6d6d6; color: #000000;">
            <th class="align-center"><?= get_phrase('class_score'); ?>(30%)</th>
                <th class="align-center"><?= get_phrase('exam_score'); ?>(70%)</th>
                <th class="align-center"><?= get_phrase('total'); ?>(100%)</th>
                <th class="align-center"><?= get_phrase('grade'); ?></th>
              
            </tr>
        </thead>
        <tbody>
        <?php foreach ($registered_students as $registered_student): ?>
            <tr>
                            <td><?= $registered_student['first_name'] . " " . $registered_student['last_name'] ?></td>
                            <td><input type="number" min="0" max="30" onkeyup="calcTotal(<?=$registered_student['student_id']?>)" class="form-control" name="class_mark-<?=$registered_student['student_id']?>" id="class_mark-<?=$registered_student['student_id']?>" placeholder="class mark"/></td>
                            <td><input type="number" min="0" max="70" onkeyup="calcTotal(<?=$registered_student['student_id']?>)" class="form-control" name="exam_mark-<?=$registered_student['student_id']?>" id="exam_mark-<?=$registered_student['student_id']?>" placeholder="exam mark"/></td>
                            <td><span id="total_mark-<?=$registered_student['student_id']?>">N/A</span></td>
                            <td>
                                N/A
                            </td>
                            <input type="hidden" name="course_registration_id-<?=$registered_student['student_id']?>" value="<?= $registered_student['id']?>"/>
                            <input type="hidden" name="semester_id-<?=$registered_student['student_id']?>" value="<?= $registered_student['semester_id']?>"/>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
<?php else : ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table th {
        text-align: left;
        padding: 20px
    }

    ​td,th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 20px 30px;
        border-collapse: collapse;
    }
    .align-right{
        text-align: right!important;
    }
    .align-left{
        text-align: left!important;
    }
    .align-center{
        text-align: center!important;
    }
    .img-container {
        text-align: center;
      }



</style> 