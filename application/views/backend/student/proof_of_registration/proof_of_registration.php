<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <title><?= ucwords( get_phrase("proof_of_registration") ) ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="">
    
    <style>

    </style>
    <script src=""></script>
    <body>
    <div class="logo" style="display: flex; justify-content: center;">
            <img src ="uploads/system/logo/logo-dark.png" width = 40%>
        

        <div class="content" style="width: calc(100% - 20x) ;border: 1px solid grey;width: fit-content; margin-top: 5em; padding: 2em; padding-right: 0em;">
            <?php 
                $student = $this->student_model->get_students_by_user_id(user_id());
                $registered_courses = $this->student_model->get_student_registered_courses($student['id'], $academic_year_id, $semester_id);
              
                $academic_year = $this->crud_model->get_academic_years($academic_year_id);
			    $semester = $this->crud_model->get_semesters($semester_id);
                if (count($registered_courses) > 0) {
                    ?>           

          
            <table style="width: 100% ;" >
                <tbody >
                    <tr><td><?= get_phrase('name'); ?></td><th><?= ucwords($student["first_name"] . " " . $student["last_name"]) ?> </th></tr>
                    <tr><td><?= get_phrase('academic_year'); ?></td><th><?= ucwords($academic_year["description"] ?? "N\A") ?></th></tr>
                    <tr><td><?= get_phrase('semester'); ?></td><th><?= ucwords($semester["semester"] ?? "N\A") ?></th><th><?= get_phrase('credit_hours'); ?></th></tr>
                    
                    <?php foreach ($registered_courses as $course) { ?>
                        <tr  >
                            <th><?= $course["course_code"] ?></th>
                            <th><?= $course['course_title']; ?></th>
                            <th><?= $course['credit_hours']; ?></th>

                        </tr>
                    <?php } ?>
                </tbody>
        
            </table>
            
            <?php } else{ ?>
                <p><?= get_phrase("student_not_registered") ?></p>
            <?php } ?>
        </div>
        </div>
        <div class="signature-text">Student Signature:-------------------------------</div>

        <div class="receipt-sign">
        
       <div class="sign-text">Registrar Signature:--------------------------------</div>
            </div>
 <p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>           

            <div class="logo" style="display: flex; content: center;">
            <img src ="uploads/system/logo/logo-dark.png" width = 40%>
        

        <div class="content" style="width: calc(100% - 20x) ;border: 1px solid grey;width: fit-content; margin-top: 5em; padding: 2em; padding-right: 0em;">
            <?php 
                $student = $this->student_model->get_students_by_user_id(user_id());
                $registered_courses = $this->student_model->get_student_registered_courses($student['id'], $academic_year_id, $semester_id);
              
                $academic_year = $this->crud_model->get_academic_years($academic_year_id);
			    $semester = $this->crud_model->get_semesters($semester_id);
                if (count($registered_courses) > 0) {
                    ?>           

          
            <table style="width: 100% ;" >
                <tbody >
                    <tr><td><?= get_phrase('name'); ?></td><th><?= ucwords($student["first_name"] . " " . $student["last_name"]) ?> </th></tr>
                    <tr><td><?= get_phrase('academic_year'); ?></td><th><?= ucwords($academic_year["description"] ?? "N\A") ?></th></tr>
                    <tr><td><?= get_phrase('semester'); ?></td><th><?= ucwords($semester["semester"] ?? "N\A") ?></th><th><?= get_phrase('credit_hours'); ?></th></tr>
                    
                    <?php foreach ($registered_courses as $course) { ?>
                        <tr  >
                            <th><?= $course["course_code"] ?></th>
                            <th><?= $course['course_title']; ?></th>
                            <th><?= $course['credit_hours']; ?></th>

                        </tr>
                    <?php } ?>
                </tbody>
        
            </table>
            
            <?php } else{ ?>
                <p><?= get_phrase("student_not_registered") ?></p>
            <?php } ?>
        </div>
        </div>
        <div class="signature-text">Student Signature:-------------------------------</div>

        <div class="receipt-sign">
        
       <div class="sign-text">Registrar Signature:--------------------------------</div>
            </div>
       
     
        
      
     
     
        
      
    
    </body>
</html>
<style>
	.signature-text{
		padding-right:2%;
	}
	.receipt-signature{
		text-align:right;
		margin-bottom:10px;
	}
	
    
	.receipt-sign{
		text-align:right;
		margin-bottom:50px;
        padding-right: 2%
	}
	
</style>