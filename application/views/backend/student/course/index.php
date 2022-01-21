<?php $semester = $this->crud_model->get_current_semester(); 
if($semester !== NULL) { ?>
    <!--title-->
    <div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <span class="small">Academic Year: <?= $semester["academic_year"] ?></span><br>
                <span class="mb-2 small">Semester: <?= $semester["semester"] ?></span>
                <h4 class="page-title">
                <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('courses'); ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body subject_content">
                    <?php include 'list.php'; ?>
                </div>
            </div>
        </div>
    </div>
<?php }else { ?>
    <div class="row ">
        <div class="col-xl-12">
            <div class="jumbotron">
                <h3>Sorry...</h3>
                <p>Semester has not been created yet.</p>
                <p class="danger text-danger">Please contact Administrator.</p>
            </div>
        </div><!-- end col-->
    </div>
<?php } ?>
<style>
    .subject_content .card{
        padding:1em;
    }
</style>
<script>

    var showAllSubjects = function () {
        var class_id = $('#class_id').val();
        if(class_id != ""){
            $.ajax({
                url: '<?= route('subject/list/') ?>'+class_id,
                success: function(response){
                    $('.subject_content').html(response);
                }
            });
        }
    }

    function filter_courses(value) {
        console.log("called class function");
        let cards, title, i, job_role;
        value = value.toUpperCase();
        cards = document.getElementById("course-items").getElementsByClassName("card");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".body .info h5.card-title");
            job_role = cards[i].querySelector(".body .info small");
            if (title.innerText.toUpperCase().indexOf(value) > -1 || job_role.innerText.toUpperCase().indexOf(value) > -1) {
                cards[i].parentNode.style.display = "";
            } else {
                cards[i].parentNode.style.display = "none";
            }
        }
    }
</script>
