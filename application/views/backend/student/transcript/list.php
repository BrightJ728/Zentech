<?php
 // $current_semester=$this->crud_model->get_current_semester();
    
    $this->db->where('student_id');
     $transcript_data = $this->db->get('transcript');
    $total = array();
        $grade = array();

 

    if(count($transcripts)==0) {
        $this->student_model->add_transcript();
    }




if (count($transcripts) > 0) : ?>


    <table border="0">
        <tr>
            <td width="100px"><h6>Name</h6></td>
            <td><h5><?= $student["name"] ?></h5></td>
        </tr>
        <tr>
            <td><h6>Program</h6></td>
            <td><h5><?= $student["program"] ?></h5></td>
        </tr>
        <tr>
            <td><h6>Level</h6></td>
            <td><h5><?= $student["level"] ?></h5></td>
        </tr>
         
    </table>
    <?php foreach($transcripts as $transcript) :?>
    <?php endforeach ?>



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

    </table>


<table  class="table table-striped dt-responsive nowrap" width="100%">

       
        <tbody>     
            <tr style="background-color: #d6d6d6; color: #000000;">
                    <th><?= get_phrase('cwa'); ?></th>

         <td>  <h5><?=  $this->student_model->get_cpga(); ?></h5></td> 
</tr >
        </tbody>

</table>
                      
<?php else : ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>