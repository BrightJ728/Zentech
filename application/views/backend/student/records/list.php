<?php
if (count($courses) > 0) : ?>
    <table border="0">
        <tr>
            <td width="100px">
                <h6>Name</h6>
            </td>
            <td>
                <h5><?= $student["name"] ?></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h6>Program</h6>
            </td>
            <td>
                <h5><?= $student["program"] ?></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h6>Level</h6>
            </td>
            <td>
                <h5><?= $student["level"] ?></h5>
            </td>
        </tr>
    </table>


    <hr class="border-bottom" />
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead>
            <tr style="background-color: #313a46; color: #ababab;">
                <th><?= get_phrase('course'); ?></th>
                <th><?= get_phrase('academic_year'); ?></th>
                <th><?= get_phrase('semester'); ?></th>
                <th><?= get_phrase('class_score'); ?></th>
                <th><?= get_phrase('exam_score'); ?></th>

                <th><?= get_phrase('score'); ?></th>
                <th><?= get_phrase('grade'); ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($passed_courses as $course) : ?>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 col-md-2 col-xs-5">
                                <h5><?= $course['course_code'] ?></h5>
                            </div>
                            <div class="col-sm-8 col-md-10 col-xs-7">
                                <h5><?= $course['course_title'] ?></h5>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h5><?= $course['academic_year'] ?></h5>
                    </td>
                    <td>
                        <h5><?= $course['semester'] ?></h5>
                    </td>
                    <td>
                        <h5><?= ($course["status"] == "Approved") ? $course['class_score'] : "N/A" ?></h5>
                    </td>
                    <td>
                        <h5><?= ($course["status"] == "Approved") ? $course['exam_score'] : "N/A" ?></h5>
                    </td>
                    <td>
                        <h5><?= ($course["status"] == "Approved") ? $course['total_score'] : "N/A" ?></h5>
                    </td>
                    <td>
                        <h5><?= ($course["status"] == "Approved") ? grade_from_value($course['total_score']) : "N/A"  ?></h5>
                    </td>
                </tr>



                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
    <hr class="border-bottom" />

<table  class="table table-striped dt-responsive nowrap" width="100%">

     <thead>

         <tr style="background-color: #313a46; color: #ababab;">
              <th>academic year</th>
              <th>Semester</th>

              <th>Total Grade Point</th>
              <th>Weighted Average</th>


                           
         </tr>
     </thead>
     <tbody>    
     <?php foreach($transcriptdata as $value) :?>
               
                <tr>

                 <td>  <h5><?= $value['academic_year'] ?></h5></td> 
                 <td>  <h5><?=  $value['semester'] ?></h5></td> 
                 <td>  <h5><?=  $value['total_point'] ?></h5></td>
                  <td>  <h5><?=  number_format($value['gpa'], 2) ?></h5></td>

            </tr>    

         <?php endforeach ?> 

      
     </tbody>
     <table  class="table table-striped dt-responsive nowrap" width="100%">

    
<tbody>     
    <tr style="background-color: #d6d6d6; color: #000000;">
            <th><?= get_phrase('cwa'); ?></th>

 <td>  <h5><?=  $this->student_model->get_cpga(); ?></h5></td> 
</tr >
 </table>





    <hr class="border-bottom" />
    <h3 style=text-align:center; >FAILED COURSES</h3>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead>
            <tr style="background-color: #313a46; color: #ababab;">
                <th><?= get_phrase('course'); ?></th>
                <th><?= get_phrase('academic_year'); ?></th>
                <th><?= get_phrase('semester'); ?></th>
                <th><?= get_phrase('class_score'); ?></th>
                <th><?= get_phrase('exam_score'); ?></th>

                <th><?= get_phrase('score'); ?></th>
                <th><?= get_phrase('grade'); ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($failed_courses as $course) : ?>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 col-md-2 col-xs-5">
                                <h5><?= $course['course_code'] ?></h5>
                            </div>
                            <div class="col-sm-8 col-md-10 col-xs-7">
                                <h5><?= $course['course_title'] ?></h5>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h5><?= $course['academic_year'] ?></h5>
                    </td>
                    <td>
                        <h5><?= $course['semester'] ?></h5>
                    </td>
                    <td>
                        <h5><?= ($course["status"] == "Approved") ? $course['class_score'] : "N/A" ?></h5>
                    </td>
                    <td>
                        <h5><?= ($course["status"] == "Approved") ? $course['exam_score'] : "N/A" ?></h5>
                    </td>
                    <td>
                        <h5><?= ($course["status"] == "Approved") ? $course['total_score'] : "N/A" ?></h5>
                    </td>
                    <td>
                        <h5><?= ($course["status"] == "Approved") ? grade_from_value($course['total_score']) : "N/A"  ?></h5>
                    </td>
                </tr>
            



                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>