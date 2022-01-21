<form method="POST" class="d-block ajaxForm" action="<?= route('routine/create'); ?>" style="min-width: 300px;">
    <?php $school_id = school_id(); ?>
    <div class="form-group row">
        <label for="class_id_on_routine_creation" class="col-md-3 col-form-label"><?= get_phrase('class'); ?></label>
        <div class="col-md-9">
            <select name="class_id" id="class_id_on_routine_creation" class="form-control select2" data-toggle="select2"  required onchange="classWiseSectionForRoutineCreate(this.value)">
                <option value=""><?= get_phrase('select_a_class'); ?></option>
                <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($classes as $class): ?>
                    <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="section_id_on_routine_creation" class="col-md-3 col-form-label"><?= get_phrase('section'); ?></label>
        <div class="col-md-9">
            <select name="section_id" id = "section_id_on_routine_creation" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?= get_phrase('select_section'); ?></option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="subject_id_on_routine_creation" class="col-md-3 col-form-label"><?= get_phrase('subject'); ?></label>
        <div class="col-md-9">
            <select name="subject_id" id = "subject_id_on_routine_creation" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?= get_phrase('select_section'); ?></option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="lecturer" class="col-md-3 col-form-label"><?= get_phrase('lecturer'); ?></label>
        <div class="col-md-9">
            <select name="lecturer_id" id = "lecturer_on_routine_creation" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?= get_phrase('assign_a_lecturer'); ?></option>
                <?php $lecturers = $this->db->get_where('lecturers', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($lecturers as $lecturer): ?>
                    <option value="<?= $lecturer['id']; ?>"><?= $this->user_model->get_user_details($lecturer['user_id'], 'name'); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="class_room_id" class="col-md-3 col-form-label"><?= get_phrase('class_room'); ?></label>
        <div class="col-md-9">
            <select name="class_room_id" id = "class_room_id_on_routine_creation" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?= get_phrase('select_a_class_room'); ?></option>
                <?php $class_rooms = $this->db->get_where('class_rooms', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($class_rooms as $class_room): ?>
                    <option value="<?= $class_room['id']; ?>"><?= $class_room['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="day" class="col-md-3 col-form-label"><?= get_phrase('day'); ?></label>
        <div class="col-md-9">
            <select name="day" id = "day_on_routine_creation" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?= get_phrase('select_a_day'); ?></option>
                <option value="saturday"><?= get_phrase('saturday'); ?></option>
                <option value="sunday"><?= get_phrase('sunday'); ?></option>
                <option value="monday"><?= get_phrase('monday'); ?></option>
                <option value="tuesday"><?= get_phrase('tuesday'); ?></option>
                <option value="wednesday"><?= get_phrase('wednesday'); ?></option>
                <option value="thursday"><?= get_phrase('thursday'); ?></option>
                <option value="friday"><?= get_phrase('friday'); ?></option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="starting_hour" class="col-md-3 col-form-label"><?= get_phrase('starting_hour'); ?></label>
        <div class="col-md-9">
            <select name="starting_hour" id = "starting_hour_on_routine_creation" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?= get_phrase('starting_hour'); ?></option>
                <?php for($i = 0; $i <= 23; $i++){
                    if ($i < 12){
                        if ($i == 0){ ?>
                            <option value="<?= $i; ?>">12 AM</option>
                        <?php }else{ ?>
                            <option value="<?= $i; ?>"><?= $i; ?> AM</option>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php $j = $i - 12; ?>

                        <?php if ($j == 0){ ?>
                            <option value="<?= $i; ?>">12 PM</option>
                        <?php }else{ ?>
                            <option value="<?= $i; ?>"><?= $j; ?> PM</option>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="starting_minute" class="col-md-3 col-form-label"><?= get_phrase('starting_minute'); ?></label>
        <div class="col-md-9">
            <select name="starting_minute" id = "starting_minute_on_routine_creation" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?= get_phrase('starting_minute'); ?></option>
                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                    <option value="<?= $i; ?>"><?= $i; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="ending_hour" class="col-md-3 col-form-label"><?= get_phrase('ending_hour'); ?></label>
        <div class="col-md-9">
            <select name="ending_hour" id = "ending_hour_on_routine_creation" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?= get_phrase('ending_hour'); ?></option>
                <?php for($i = 0; $i <= 23; $i++){
                    if ($i < 12){
                        if ($i == 0){ ?>
                            <option value="<?= $i; ?>">12 AM</option>
                        <?php }else{ ?>
                            <option value="<?= $i; ?>"><?= $i; ?> AM</option>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php $j = $i - 12; ?>

                        <?php if ($j == 0){ ?>
                            <option value="<?= $i; ?>">12 PM</option>
                        <?php }else{ ?>
                            <option value="<?= $i; ?>"><?= $j; ?> PM</option>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="ending_minute" class="col-md-3 col-form-label"><?= get_phrase('ending_minute'); ?></label>
        <div class="col-md-9">
            <select name="ending_minute" id = "ending_minute_on_routine_creation" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?= get_phrase('ending_minute'); ?></option>
                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                    <option value="<?= $i; ?>"><?= $i; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('add_class_routine'); ?></button>
    </div>
</form>


<script>
$(document).ready(function () {

    initSelect2(['#class_id_on_routine_creation',
    '#section_id_on_routine_creation',
    '#subject_id_on_routine_creation',
    '#lecturer_on_routine_creation',
    '#class_room_id_on_routine_creation',
    '#day_on_routine_creation',
    '#starting_hour_on_routine_creation',
    '#starting_minute_on_routine_creation',
    '#ending_hour_on_routine_creation',
    '#ending_minute_on_routine_creation']);
});

$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, getFilteredClassRoutine);
});

function classWiseSectionForRoutineCreate(classId) {
    $.ajax({
        url: "<?= route('section/list/'); ?>"+classId,
        success: function(response){
            $('#section_id_on_routine_creation').html(response);
            classWiseSubjectForRoutineCreate(classId);
        }
    });
}

function classWiseSubjectForRoutineCreate(classId) {
    $.ajax({
        url: "<?= route('class_wise_subject/'); ?>"+classId,
        success: function(response){
            $('#subject_id_on_routine_creation').html(response);
        }
    });
}
</script>
