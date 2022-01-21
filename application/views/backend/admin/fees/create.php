<?php 
    $academic_years = $this->db->get('academic_years')->result_array();
    $currencies = $this->settings_model->get_fee_currencies_view(); 
    
    $year_levels = $this->crud_model->get_year_levels(); 
    $programs = $this->db->get('programs')->result_array(); 
?>
<form method="POST" class="d-block feesForm" action="<?= route('fees/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?= school_id(); ?>">
        <div class="form-group col-md-12">
            <label for="academic_year_id"><?= ucwords(get_phrase('academic_year')); ?></label>
            <select required type="text" name="academic_year_id" class="form-control" id="academic_year_id" required>
                <option value=''>--<?= get_phrase("Choose") ?>--</option>
                <?php foreach($academic_years as $academic_year){ ?>
                    <option value="<?= $academic_year['id']; ?>"><?= $academic_year['description']; ?></option>
                <?php } ?>
            </select> 
            <small id="academic_year_id_help" class="form-text text-muted"><?= get_phrase('provide_academic_year'); ?></small>
        </div>      
        
        <div class="form-group col-md-12">
            <label for="program_id"><?= get_phrase('programmee'); ?></label>
            <select required type="text" name="program_id" class="form-control" id="program_id" required>
                <option value=''><?= get_phrase("choose") ?>...</option>
                <?php foreach($programs as $program){ ?>
                    <option value="<?= $program['id']; ?>"><?= $program['description']; ?></option>
                <?php } ?>
            </select> 
            <small id="program_id_help" class="form-text text-muted"><?= get_phrase('select_programme'); ?></small>
        </div>

        <div class="form-group col-md-12">
            <label for="year_level_id"><?= get_phrase('year_level'); ?></label>
            <select required type="text" name="year_level_id" class="form-control" id="year_level_id" required>
                <option value=''><?= get_phrase("choose") ?>...</option>
                <?php foreach($year_levels as $year_level){ ?>
                    <option value="<?= $year_level['id']; ?>"><?= $year_level['name']; ?></option>
                <?php } ?>
            </select> 
            <small id="program_id_help" class="form-text text-muted"><?= get_phrase('provide_department'); ?></small>
        </div>
        
        <div class="form-group col-md-12">
            <label for="student_type"><?= ucwords(get_phrase('student_type')); ?></label>
            <select required type="text" name="student_type" class="form-control" id="student_type" required>
                <option value=''><?= get_phrase("choose") ?>...</option>
                <option value='local'><?= get_phrase("local_student") ?></option>
                <option value='foreign'><?= get_phrase("foreign_student") ?></option>
                
            </select> 
            <small id="student_type_help" class="form-text text-muted"><?= get_phrase('provide_student_type'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="fee"><?= ucwords(get_phrase('academic_year_fee')); ?></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend" >
                    <select required type="text" name="currency_id" class="form-control" id="currency_id" style="border-radius: 0.25em 0px 0px 0.25em;" required>
                        <?php foreach($currencies as $currency){ ?>
                            <option value="<?= $currency['id']; ?>"><?= $currency['symbol']; ?></option>
                        <?php } ?>
                    </select> 
                </div>
                <input type="number" step="0.01" class="form-control" aria-label="Text input with dropdown button" id="fee" name="fee" required>
            </div>
            <small id="currency_id_help" class="form-text text-muted"><?= get_phrase('enter_academic_fees'); ?></small>
        </div>
        

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_fee'); ?></button>
        </div>
    </div>
</form>

<script>
    $(".feesForm").validate({}); // Jquery form validation initialization
    $(".feesForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllfees);
    });
</script>
