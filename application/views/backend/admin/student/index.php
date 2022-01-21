<?php if($working_page == 'filter'): ?>
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
                <div class="card-body student_content">
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

function classWiseSection(classId) {
    $.ajax({
        url: "<?= route('section/list/'); ?>"+classId,
        success: function(response){
            $('#section_id').html(response);
        }
    });
}

function filter_student(){
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    if(class_id != "" && section_id!= ""){
        showAllStudents();
    }else{
        toastr.error('<?= get_phrase('please_select_a_class_and_section'); ?>');
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
</script>
