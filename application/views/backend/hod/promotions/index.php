<!--title-->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                    <i class="dripicons-to-do title_icon"></i> <?= get_phrase('students'); ?>
                </h4>
                <div class="d-block form-group d-inline-block w-50">
                    <label><?= get_phrase('level') ?></label>
                    <select name="level_id" id="level_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?= get_phrase('select_a_level') ?></option>
                        <?php 
                        foreach($year_levels as $year_level){ ?>
                            <option value="<?= $year_level['id']; ?>"  ><?= $year_level['description'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <button onclick="changeYearLevel()" class="btn btn-primary"><?= get_phrase('change_year_level') ?></button>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-body">
                <div class="form-group search-bar ml-2">
                    <div class="input-group input-group-transparent">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                        <input type="text" class="form-control" onkeyup="filter_courses(this.value)" placeholder="Search...">
                    </div>
                </div>
                <div class="d-none justify-content-center align-content-center" id="gif-loader"><img style="width: 60px; margin-top: 100px;" src="<?= site_url('assets/backend/images/straight-loader.gif'); ?>"></div>
                <div class="records_content p-2">
                    <!-- Content loaded with ajax on document ready -->
                    <p class="alert alert-info">Select Year Level</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /* document.addEventListener("DOMContentLoaded", () => {
        showAllStudents(<?= $year_levels[0]["id"] ?>);
    }); */

    function changeYearLevel () {
        let level_id = document.querySelector("#level_id").value;
        
        showAllStudents(level_id);
    }

    async function showAllStudents (level_id) {
        let url = '<?= route("promotions/student_list/") ?>' + level_id;
        let loader = document.querySelector("#gif-loader");
        loader.classList.remove("d-none");
        loader.classList.add("d-flex");
        $('.records_content').html("");
        $.ajax({
            type : 'GET',
            url: url,
            success : (response) => {
                $('.records_content').html(response);
                loader.classList.remove("d-flex");
                loader.classList.add("d-none");
            },
            error: (err) => {
                loader.classList.remove("d-flex");
                loader.classList.add("d-none");
                $('.records_content').html("<p class='alert alert-danger'>Sorry problem occurred while retrieving records.<br>Please try again later.</p>");
            } 
        });
    }

    const filter_courses = (value) => {
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
