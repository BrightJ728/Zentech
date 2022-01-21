<!-- <?php
if (count($courses) > 0) : ?>
<div class="img-container">
            <img src ="uploads/system/logo/logo-dark.png" width = 50%>
   </div>
   
    <table style="border: none">
        <tr>
            <td><div style="font-size: 14px; font-weight:400; padding: 10px">Name</div></td>
            <td><div style="font-size: 15px; font-weight:600; padding: 10px"><?= $student["name"] ?></div></td>
        </tr>
        <tr>
            <td><div style="font-size: 14px; font-weight:400; padding: 10px">Program</div></td>
            <td><div style="font-size: 15px; font-weight:600; padding: 10px"><?= $student["program"] ?></div></td>
        </tr>
        <tr>
            <td><div style="font-size: 14px; font-weight:400; padding: 10px; margin-bottom: 20px">Level</div></td>
            <td><div style="font-size: 15px; font-weight:600; padding: 10px; margin-bottom: 20px"><?= $student["level"] ?></div></td>
        </tr>
    </table>
    <table id="basic-datatable" width="100%">
        <thead>
            <tr style="background-color: #d6d6d6; color: #000000;">
                <th class="align-left"><?= get_phrase('course'); ?></th>
                <th><?= get_phrase('academic_year'); ?></th>
                <th><?= get_phrase('semester'); ?></th>
                <th class="align-center"><?= get_phrase('class_score'); ?></th>
                <th class="align-center"><?= get_phrase('exam_score'); ?></th>
                <th class="align-center"><?= get_phrase('score'); ?></th>
                <th class="align-center"><?= get_phrase('grade'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course) : ?>
                <tr>
                    <td class="align-left" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px 15px">
                            <span><?= $course['course_code'] ?></span> - <span><?= $course['course_title'] ?></span>
                        </div>
                    </td>
                    <td class="align-center" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px; 15px"><?=  $course['academic_year'] ?></div>
                    </td>
                    <td class="align-center" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px; 15px"><?=  $course['semester'] ?></div>
                    </td>
                    <td class="align-center" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px; 15px"><?= ($course["status"] == "Approved") ? $course['class_score'] : "N/A" ?></div>
                    </td>
                    <td class="align-center" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px; 15px"><?= ($course["status"] == "Approved") ? $course['exam_score'] : "N/A" ?></div>
                    </td>
                    <td class="align-center" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px; 15px"><?= ($course["status"] == "Approved") ? $course['total_score'] : "N/A" ?></div>
                    </td>
                    <td class="align-center" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px; 15px"><?= ($course["status"] == "Approved") ? grade_from_value($course['total_score']) : "N/A"  ?></div>
                    </td>
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
      } -->



</style> 