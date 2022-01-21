<?php 
    $programs = $this->db->get_where('programs')->result_array();
    $levels = $this->db->get_where('year_levels')->result_array();

    if($working_page == 'filter'): ?>
    <!--title-->
    <div class="row d-print-none">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="page-title">
                        <i class="mdi mdi-calendar-today title_icon"></i> <?= get_phrase('student'); ?>
                        <a href="<?= route('student/create'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_new_student'); ?></a>
                    </h4>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <div class="row d-print-none">
        <div class="col-12">
            <div class="card ">
                <div class="row mt-3">
                    <div class="col-md-1 mb-1"></div>
                    <div class="col-md-4 mb-1">
                        <select name="program_id" id="program_id" class="form-control select2" data-toggle = "select2" required >
                            <option value=""><?= get_phrase('all_programs'); ?></option>
                            <?php foreach($programs as $program){ ?>
                                <option value="<?= $program['id']; ?>"><?= $program['description']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select name="level_id" id="level_id" class="form-control select2" data-toggle = "select2" required>
                            <option value=""><?= get_phrase('all_levels'); ?></option>
                            <?php foreach($levels as $level){ ?>
                                <option value="<?= $level['id']; ?>"><?= $level['description']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-block btn-secondary" onclick="filter_students()" ><?= get_phrase('filter'); ?></button>
                    </div>
                </div> <div class="card-body student_content">
                    <div class="empty_box">
                        <img class="mb-3" width="150px" src="<?= base_url('assets/backend/images/empty_box.png'); ?>" />
                        <br>
                        <span class=""><?= get_phrase('no_data_found'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php elseif($working_page == 'create'): ?>
    <?php include 'create.php'; ?>
<?php elseif($working_page == 'edit'): ?>
    <?php 
        include 'update.php'; ?>
<?php endif; ?>

<script>
$('document').ready(function(){
    showAllStudents();
});

function filter_students(){
    let program_id = $('#program_id').val();
    let level_id = $('#level_id').val();
    if(program_id == "" && level_id == ""){
        showAllStudents();
    }
    
    if(program_id != "" || level_id != ""){
        showFilteredStudents(program_id, level_id);
        return;
    }
}

const showAllStudents = async function() {
    $.ajax({
        url: '<?= route('student/all') ?>',
        success: function(response){
            $('.student_content').html(response);
        }
    });
}

const showFilteredStudents = async function(program_id, level_id) {

    data = {"program_id": program_id, "level_id"  :level_id}
    $.ajax({
        type: "POST",
        url: '<?= route('student/filter') ?>',
        data: data,
        success: function(response) {
            $('.student_content').html(response);
        }
    });

}
</script>
