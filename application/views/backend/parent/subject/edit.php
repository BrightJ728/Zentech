<?php $school_id = school_id(); ?>
<?php $subjects = $this->db->get_where('subjects', array('id' => $param1))->result_array(); ?>
<?php foreach($subjects as $subject){ ?>
<form method="POST" class="d-block ajaxForm" action="<?= route('subject/update/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="class"><?= get_phrase('class'); ?></label>
            <select name="class_id" id="class_id_on_create" class="form-control select2" data-toggle="select2" required>
                <option value=""><?= get_phrase('select_a_class'); ?></option>
                    <?php
                        $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array();
                        foreach($classes as $class){
                    ?>
                        <option value="<?= $class['id']; ?>" <?php if($class['id'] == $subject['class_id']){ echo 'selected'; } ?>><?= $class['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?= get_phrase('select_a_class'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('subject_name'); ?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $subject['name']; ?>" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_subject_name'); ?></small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_subject'); ?></button>
        </div>
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllSubjects);
});

$(document).ready(function() {
  initSelect2(['#class_id_on_create']);
});
</script>
