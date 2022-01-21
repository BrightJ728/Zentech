<?php $school_id = school_id(); ?>
<form method="POST" class="d-block ajaxForm responsive_media_query" action="<?= route('attendance/take_attendance'); ?>" style="min-width: 300px; max-width: 400px;">
    <div class="form-group row">
        <div class="col-md-12">
            <label for="date_on_taking_attendance"><?= get_phrase('date'); ?></label>
            <input type="text" class="form-control date" id="date_on_taking_attendance" data-toggle="date-picker" data-single-date-picker="true" name = "date" value="" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <label  for="class_id_on_taking_attendance"><?= get_phrase('class'); ?></label>
            <select name="class_id" id="class_id_on_taking_attendance" class="form-control select2" data-toggle="select2" onchange="classWiseSectionOnTakingAttendance(this.value)" required>
                <option value=""><?= get_phrase('select_a_class'); ?></option>
                <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($classes as $class): ?>
                    <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12" id = "section_content_2">
            <label for="section_id_on_taking_attendance"><?= get_phrase('section'); ?></label>
            <select name="section_id" id="section_id_on_taking_attendance" class="form-control select2" data-toggle="select2" required >
                <option value=""><?= get_phrase('select_section'); ?></option>
            </select>
        </div>
    </div>


    <div class="row" id = "student_content" style="margin-left: 2px;">
    </div>

    <div class='row'>
        <div class="form-group col-md-12" id="showStudentDiv">
            <a class="btn btn-block btn-secondary" onclick="getStudentList()" style="color: #fff;" disabled><?= get_phrase('show_student_list'); ?></a>
        </div>
    </div>
    <div class="form-group col-md-12 mt-4" id = "updateAttendanceDiv" style="display: none;">
        <button class="btn w-100 btn-primary" type="submit"><?= get_phrase('update_attendance'); ?></button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, getDailtyAttendance);
    });

    $('document').ready(function(){
        initSelect2(['#class_id_on_taking_attendance', '#section_id_on_taking_attendance']);

        $('#date_on_taking_attendance').change(function(){
            $('#showStudentDiv').show();
            $('#updateAttendanceDiv').hide();
            $('#student_content').hide();
        });
        $('#class_id_on_taking_attendance').change(function(){
            $('#showStudentDiv').show();
            $('#updateAttendanceDiv').hide();
            $('#student_content').hide();
        });
        $('#section_id_on_taking_attendance').change(function(){
            $('#showStudentDiv').show();
            $('#updateAttendanceDiv').hide();
            $('#student_content').hide();
        });
    });

    $('#date_on_taking_attendance').daterangepicker();

    function classWiseSectionOnTakingAttendance(classId) {
        $.ajax({
            url: "<?= route('section/list/'); ?>"+classId,
            success: function(response){
                $('#section_id_on_taking_attendance').html(response);
            }
        });
    }

    function getStudentList() {
        var date = $('#date_on_taking_attendance').val();
        var class_id = $('#class_id_on_taking_attendance').val();
        var section_id = $('#section_id_on_taking_attendance').val();

        if(date != '' && class_id != '' && section_id != ''){
            $.ajax({
                type : 'POST',
                url : '<?= route('attendance/student/'); ?>',
                data: {date : date, class_id : class_id, section_id : section_id},
                success : function(response) {
                    $('#student_content').show();
                    $('#student_content').html(response);
                    $('#showStudentDiv').hide();
                    $('#updateAttendanceDiv').show();
                }
            });
        }else{
            toastr.error('<?= get_phrase('please_select_in_all_fields !'); ?>');
        }
    }
</script>
