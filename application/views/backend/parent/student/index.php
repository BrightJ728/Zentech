<?php if($working_page == 'filter'): ?>
    <!--title-->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">
                    <i class="mdi mdi-calendar-today title_icon"></i> <?= get_phrase('student'); ?>
                    <a href="<?= route('student/create'); ?>" class="btn btn-icon btn-success btn-rounded mb-1 mt-3 alignToTitle float-right"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_new_student'); ?></a>
                </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="row mt-3">
                    <div class="col-md-1 mb-1"></div>
                    <div class="col-md-4 mb-1">
                        <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                            <option value=""><?= get_phrase('select_a_class'); ?></option>
                            <?php
                            $classes = $this->db->get_where('classes', array('school_id' => school_id()))->result_array();
                            foreach($classes as $class){
                                ?>
                                <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select name="section" id="section_id" class="form-control select2" data-toggle = "select2" required>
                            <option value=""><?= get_phrase('select_section'); ?></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-block btn-secondary" onclick="filter_student()" ><?= get_phrase('filter'); ?></button>
                    </div>
                </div>
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
    <?php include 'update.php'; ?>
<?php endif; ?>

<script>
$('document').ready(function(){

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

var showAllStudents = function() {
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    if(class_id != "" && section_id!= ""){
        $.ajax({
            url: '<?= route('student/filter/') ?>'+class_id+'/'+section_id,
            success: function(response){
                $('.student_content').html(response);
            }
        });
    }
}
</script>
