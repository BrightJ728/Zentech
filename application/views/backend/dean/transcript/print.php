
<?php
if (count($transcripts) >0) : ?>
   <div class="img-container">
            <img src ="uploads/system/logo/logo-dark.png" width = 50%>
   </div>
   <br>
   <br>
    <
    <table id="basic-datatable" width="100%">
        <thead>
            <tr style="background-color: #d6d6d6; color: #000000;">
                <th class="align-left">Student name</th>
                <th class="align-left">Academic Year</th>
                <th class="align-left">Semester</th>
                <th class="align-center">total grade point</th>
                <th class="align-center">Weighted Average</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transcriptdata as $transcript) : ?>
                <tr>
                    <td class="align-left" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px 15px">
                             <span><?= $transcript['first_name'] ." ". $transcript['last_name'] ?></span>
                        </div>
                    </td>
                    <td class="align-left" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px 15px">
                             <span><?= $transcript['academic_year'] ?></span>
                        </div>
                    </td>
    
                    <td class="align-left" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px 15px">
                             <span><?= $transcript['semester'] ?></span>
                        </div>
                    </td>
                    <td class="align-center" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px; 15px"><?=  $transcript['total_point']  ?></div>
                    </td>
                    <td class="align-center" style="border: 1px solid #eee">
                        <div style="font-size: 14px; font-weight:500; padding: 10px; 15px"><?= number_format($transcript['weighted_average'],2)?></div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <br>
    <table  class="table table-striped dt-responsive nowrap" width="100%">


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