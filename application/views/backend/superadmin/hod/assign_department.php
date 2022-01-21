<?php $departments = $this->db->get_where('departments', array('school_id' => school_id()))->result_array(); ?>
<form method="POST" class="d-block ajaxForm" action="<?= route('dean/assign_department'); ?>" enctype="multipart/form-data">
    <input id="dean_id" name="dean_id" type="hidden" value="<?= $param1 ?>"/>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="department"><?= get_phrase('department'); ?></label>
            <select name="department_id" id="department" class="form-control select2"  onchange="getDepartmentCourses(this.value)" data-toggle = "select2" required>
                <option value=""><?= get_phrase('select_a_department'); ?></option>
                <?php foreach($departments as $department){
                    ?>
                    <option value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                <?php } ?>
            </select>
            <small id="" class="form-text text-muted"><?= get_phrase('provide_a_department'); ?></small>
        </div>

        

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('assign_department'); ?></button>
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
