<?php $school_id = school_id(); ?>
<?php $course = $this->db->get_where('courses', array('id' => $param1))->row_array(); ?>

<form method="POST" class="d-block ajaxForm" action="<?= route('courses/update/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
        <label for="department_id_on_create"><?= get_phrase('department'); ?></label>
        <select name="department_id" id="department_id_on_create" class="form-control select2" data-toggle="select2" required>
            <option value=""><?= get_phrase('select_a_department'); ?></option>
            <?php
            $departments = $this->db->get_where('departments', array('school_id' => school_id()))->result_array();
            foreach ($departments as $department) {
                ?>
            <option value="<?= $department['id']; ?>" <?php if($department['id'] == $course['department_id']){ echo 'selected'; } ?> ><?= $department['name']; ?></option>
            <?php
            } ?>
        </select>
        <small id="department_help" class="form-text text-muted"><?= get_phrase('select_a_department'); ?></small>
        </div>
        
        <div class="form-group col-md-12">
        <label for="level_id"><?= get_phrase('level'); ?></label>
        <select name="level_id" id="level_id" class="form-control select2" data-toggle="select2" required>
            <option value=""><?= get_phrase('select_a_level'); ?></option>
            <?php
            $year_levels = $this->db->get('year_levels')->result_array();
            foreach ($year_levels as $year_level) {
                ?>
            <option value="<?= $year_level['id']; ?>" <?php if($year_level['id'] == $course['level_id']){ echo 'selected'; } ?> ><?= $year_level['name']; ?></option>
            <?php
            } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_level'); ?></small>
        </div>
         
        <div class="form-group col-md-12">
        <label for="semester"><?= get_phrase('semester'); ?></label>
        <select id="semester" name="semester" class="form-control select2" data-toggle="select2" required>
            <option value=""><?= get_phrase('select_a_semester'); ?></option>
            <?php
            $settings = $this->settings_model->get_current_school_data();
            for ($i = 1; $i <= $settings["number_of_semesters"] ; $i++) {?>
            <option value="<?= $i ?>" <?php if($i == $course['semester']){ echo 'selected'; } ?> ><?= $i ?></option>
            <?php } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_semester'); ?></small>
        </div>

        <div class="form-group col-md-12">
        <label for="name"><?= get_phrase('course_code'); ?></label>
        <input type="text" class="form-control" id="course_code" value="<?= $course['code'] ?>" name="course_code" required>
        <small id="name_help" class="form-text text-muted"><?= get_phrase('course_code'); ?></small>
        </div>

        <div class="form-group col-md-12">
        <label for="name"><?= get_phrase('course_title'); ?></label>
        <input type="text" class="form-control" id="course_title" value="<?= $course['title'] ?>" name="course_title" required>
        <small id="name_help" class="form-text text-muted"><?= get_phrase('course_title'); ?></small>
        </div>

        <div class="form-group col-md-12">
        <label for="name"><?= get_phrase('credit_hours'); ?></label>
        <input type="text" class="form-control" id="credit_hours" value="<?= $course['credit_hours'] ?>" name="credit_hours" required>
        <small id="name_help" class="form-text text-muted"><?= get_phrase('credit_hours'); ?></small>
        </div>
        
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_course'); ?></button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllCourses);
});

$(document).ready(function() {
  initSelect2(['#class_id_on_create']);
});
</script>
