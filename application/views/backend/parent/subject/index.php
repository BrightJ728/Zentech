<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
                <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('subject'); ?>
                <button type="button" class="btn btn-icon btn-success btn-rounded mb-1 mt-3 alignToTitle float-right" onclick="rightModal('<?= site_url('modal/popup/subject/create'); ?>', '<?= get_phrase('create_subject'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_subject'); ?></button>
            </h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <select name="class_id" id="class_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?= get_phrase('select_a_class'); ?></option>
                        <?php
                        $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array();?>
                        <?php foreach ($classes as $class): ?>
                            <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_class()" ><?= get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body subject_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>


<script>
function filter_class(){
    var class_id = $('#class_id').val();
    if(class_id != ""){
        showAllSubjects();
    }else{
        toastr.error('<?= get_phrase('please_select_a_class'); ?>');
    }
}

var showAllSubjects = function () {
    var class_id = $('#class_id').val();
    if(class_id != ""){
        $.ajax({
            url: '<?= route('subject/list/') ?>'+class_id,
            success: function(response){
                $('.subject_content').html(response);
            }
        });
    }
}
</script>
