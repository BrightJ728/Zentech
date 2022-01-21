<form method="POST" class="d-block ajaxForm" action="<?= route('syllabus/create'); ?>" enctype="multipart/form-data">
    <div class="form-row">
        <?php $school_id = school_id(); ?>
        <input type="hidden" name="school_id" value="<?= $school_id; ?>">
        <input type="hidden" name="session_id" value="<?= active_session(); ?>">
        <div class="form-group col-md-12">
            <label for="title"><?= get_phrase('tittle'); ?></label>
            <input type="text" class="form-control" id="title" name = "title" required>
        </div>
        <div class="form-group col-md-12">
            <label for="class_id_on_create"><?= get_phrase('class'); ?></label>
            <select class="form-control select2" data-toggle = "select2" id="class_id_on_create" name="class_id" onchange="classWiseSectionOnCreate(this.value)" required>
                <option value=""><?= get_phrase('select_a_class'); ?></option>
                <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($classes as $class): ?>
                    <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-md-12">
            <label for="section_id_on_create"><?= get_phrase('section'); ?></label>
            <select class="form-control select2" data-toggle = "select2" id="section_id_on_create" name="section_id" required>
                <option value=""><?= get_phrase('select_a_section'); ?></option>
            </select>
        </div>

        <div class="form-group col-md-12">
            <label for="subject_id_on_create"><?= get_phrase('subject'); ?></label>
            <select class="form-control select2" data-toggle = "select2" id="subject_id_on_create" name="subject_id" requied>
                <option><?= get_phrase('select_a_subject'); ?></option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="syllabus_file"><?= get_phrase('upload_syllabus'); ?></label>
            <div class="custom-file-upload">
                <input type="file" class="form-control" id="syllabus_file" name = "syllabus_file" required>
            </div>
        </div>
        </div>
        <div class="form-group col-md-12 mt-2">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_syllabus'); ?></button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllSyllabuses);
});

$('document').ready(function(){
    initSelect2(['#class_id_on_create',
                '#section_id_on_create',
                '#subject_id_on_create']);
});

function classWiseSectionOnCreate(classId) {
    $.ajax({
        url: "<?= route('section/list/'); ?>"+classId,
        success: function(response){
            $('#section_id_on_create').html(response);
            classWiseSubjectOnCreate(classId);
        }
    });
}

function classWiseSubjectOnCreate(classId) {
    $.ajax({
        url: "<?= route('class_wise_subject/'); ?>"+classId,
        success: function(response){
            $('#subject_id_on_create').html(response);
        }
    });
}
</script>


<script type="text/javascript">
  initCustomFileUploader();
</script>
