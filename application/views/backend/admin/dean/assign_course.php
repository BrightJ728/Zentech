<?php $departments = $this->db->get_where('departments', array('school_id' => school_id()))->result_array(); ?>
<form method="POST" class="d-block ajaxForm" action="<?= route('lecturer/assign_course'); ?>" enctype="multipart/form-data">
    <input id="lecturer_id" name="lecturer_id" type="hidden" value="<?= $param1 ?>"/>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="department"><?= get_phrase('department'); ?></label>
            <select name="department_id" id="department" class="form-control select2" onchange="getDepartmentCourses(this.value)" data-toggle = "select2" required>
                <option value=""><?= get_phrase('select_a_department'); ?></option>
                <?php foreach($departments as $department){
                    ?>
                    <option value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                <?php } ?>
            </select>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_a_department'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="course_id"><?= get_phrase('course'); ?></label>
            <select name="course_id" id="course_id" class="form-control select2" data-toggle = "select2" disabled>
                <option value=''><?= get_phrase('choose') ?>...</option>
            </select>
            <small id="" class="form-text text-muted"><?= get_phrase('select_course_to_assign'); ?></small>
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('assign_course'); ?></button>
        </div>
    </div>
</form>

<script>
$(document).ready(function () {
    initSelect2(['#department', '#gender', '#blood_group', '#show_on_website']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllDeans);
});
function getDepartmentCourses(department_id) {
    if( !isNaN( parseInt(department_id) ) ){
        $.ajax({
            url: "<?= route('lecturer/department_courses/'); ?>"+ department_id,
            success: function(response){
                $('#course_id').html(response);
                $('#course_id').removeAttr("disabled");
            }
        });
    }else{
        $('#course_id').html("<option value=''><?= get_phrase('choose') ?>...</option>");
        $('#course_id').attr("disabled", true);
    }
  
}

</script>
