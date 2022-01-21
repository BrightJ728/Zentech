<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
                <i class="mdi mdi-account-multiple-check title_icon"></i> <?= get_phrase('assigned_permission_for_lecturer'); ?>
        	</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" onchange="classWiseSection(this.value)" required>
                        <option value=""><?= get_phrase('select_a_class'); ?></option>
                            <?php
                                $classes = $this->db->get_where('classes', array('school_id' => school_id()))->result_array();
                                foreach($classes as $class){
                            ?>
                                <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="section" id="section_id" class="form-control select2" data-toggle = "select2"  required>
                        <option value=""><?= get_phrase('select_a_section'); ?></option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter()" ><?= get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body permission_content">
            	<div class="empty_box">
                    <img class="mb-3" width="150px" src="<?= base_url('assets/backend/images/empty_box.png'); ?>" />
                    <br>
                    <span class=""><?= get_phrase('no_data_found'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modyfy section -->
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

    function filter(){
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        if(class_id != "" && section_id!= ""){
            $.ajax({
                url: '<?= route('permission/filter/') ?>'+class_id+'/'+section_id,
                success: function(response){
                    $('.permission_content').html(response);
                }
            });
        }else{
            toastr.error('<?= get_phrase('please_select_a_class_and_section'); ?>');
        }
    }
</script>

<!-- permission insert and update -->
<script>
    function togglePermission(checkbox_id, column_name, lecturer_id){

        var value = $('#'+checkbox_id).val();
        if(value == 1){
            value = 0;
        }else{
            value = 1;
        }
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();

        $.ajax({
            type: 'POST',
            url: '<?= route('permission/modify_permission/') ?>',
            data: {class_id : class_id, section_id : section_id, lecturer_id : lecturer_id, column_name : column_name,  value : value},
            success: function(response){
                $('.permission_content').html(response);
                toastr.success('<?= get_phrase('permission_updated_successfully.'); ?>');
            }
        });

    }
</script>
