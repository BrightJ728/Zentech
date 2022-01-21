<?php 
  $programs = $this->db->get('programs')->result_array();
  $invoice_details = $this->accounting_m->get_invoices($param1);
  $students = $this->student_model->get_students();
?>
<form method="POST" class="d-block ajaxForm" action="<?= route('school_fees/update/'.$param1); ?>">
<div class="form-row">
    <div class="form-group col-md-12">
      <label for="program_id"><?= get_phrase('programmee'); ?></label>
      <select name="program_id" id="program_id" class="form-control select2" data-toggle="select2"  required onchange="getProgrammeStudents(this.value)">
        <option value=""><?= get_phrase('select_programme'); ?></option>
        <?php foreach($programs as $program): ?>
          <option value="<?= $program['id']; ?>"><?= $program['description']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
        <div class="form-group col-md-12">
        <label for="student_id_on_create"><?= get_phrase('select_student'); ?></label>
            <div id = "student_content">
                <select name="student_id" id="student_id_on_create" class="form-control select2" data-toggle="select2" required >
                    <option value=""><?= get_phrase('select_a_student'); ?></option>
                    <?php foreach($students as $student): ?>
                        <option <?= $invoice_details['student_id'] == $student["id"] ? "selected" : "" ?> value="<?= $student['id']; ?>"><?= $student['first_name'] . " " . $student["last_name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="title"><?= get_phrase('invoice_title'); ?></label>
            <input type="text" readonly="readonly" value="<?= ucwords( get_phrase("school_fees_invoice") ) ?>" class="form-control" id="title" name = "title" value="<?= $invoice_details['title']; ?>" required>
        </div>

        <div class="form-group col-md-12">
            <label for="total_amount"><?= get_phrase('total_amount') ?></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend border-right" style="width:15%">
                <input type="text" style="border-radius: 0.25em 0px 0px 0.25em" readonly="readonly" value="<?= $invoice_details["currency_symbol"] ?>" class="form-control" id="school_fees_currency" required>
                <input type="hidden" id="school_fees_currency_id" value="<?= $invoice_details["amount_currency_id"] ?>" name = "school_fees_currency" required>
                </div>
                <input type="number" readonly="readonly" step="0.01" value="<?= $invoice_details['total_amount']; ?>" class="form-control" aria-label="Text input with dropdown button" id="total_amount" name="total_amount" required>
            </div>
        </div>
    </div>
    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_invoice'); ?></button>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    let form = $(this);
    ajaxSubmit(e, form, showAllInvoices);
});

$(document).ready(function () {
    initSelect2(['#department_id', '#student_id_on_create']);
});

function getDepartmentStudents(department_id) {
  if(department_id !== "" && isFinite(department_id)){
    $.ajax({
      url: "<?= route('student/department_students/'); ?>"+ department_id,
      success: function(response){
        $('#student_id_on_create').html(response);
        $('#student_id_on_create').removeAttr("disabled");
        
      }
    });
  }else{
    $('#student_id_on_create').html('<option value=""><?= get_phrase('no_student_found'); ?></option>');
  }
  
}

function getStudentFees(student_id){
  if(student_id !== "" && isFinite(student_id)){
    $.ajax({
      url: "<?= route('school_fees/student_school_fees/'); ?>"+ student_id,
      success: function(response){
        const payload = JSON.parse(response);
        $('#total_amount').val(payload["data"]["amount"]);
        $('#school_fees_currency').val(payload["data"]["currency"]);
        $('#school_fees_currency_id').val(payload["data"]["currency_id"]);
        $('#payment_currency').val(payload["data"]["currency"]);
        $('#payment_currency_id').val(payload["data"]["currency_id"]);
        $('#paid_amount').removeAttr("readonly");
        $('#status').removeAttr("readonly");
      },
      error: function(error){
        toastr.info("<?= get_phrase("failed_to_get_fees_for_student") ?>");
        console.log(error);
      }
    });
  }else{
    toastr.info("<?= get_phrase("choose_a_student_first") ?>");
  }
}
</script>
