<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('courses'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/course/create'); ?>', '<?= get_phrase('create_course'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_course'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <select name="department_id" id="department_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?= get_phrase('select_a_department'); ?></option>
                        <?php
                        $departments = $this->db->get_where('departments', array('school_id' => $school_id))->result_array();?>
                        <?php foreach ($departments as $department): ?>
                            <option value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_courses()" ><?= get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body course_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>


<script>
    function filter_courses(){
        let department_id = $('#department_id').val();
        if(department_id != ""){
            showAllCourses();
        }else{
            toastr.error('<?= get_phrase('please_select_a_department'); ?>');
        }
    }

    let showAllCourses = function () {
        let department_id = $('#department_id').val();
        
        $.ajax({
            url: '<?= route('course/list/') ?>' + department_id,
            success: function(response){
                $('.course_content').html(response);
            }
        });
    }
</script>
