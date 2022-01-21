<?php 
   $programs = $this->db->get('programs')->result_array();
?>
<form method="POST" class="d-block ajaxForm" action="<?= route('resit_fees_invoice/single'); ?>">
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
      <div id="student_content">
        <select readonly="readonly" name="student_id" id="student_id_on_create" class="form-control select2" data-toggle="select2" required onchange="getStudentResitFees(this.value)">
          <option value=""><?= get_phrase('select_a_student'); ?></option>
        </select>
      </div>
    </div>

    <div class="form-group col-md-12">
		<label for="title"><?= get_phrase('invoice_title'); ?></label>
		<input type="text" readonly="readonly" value="<?= ucwords( get_phrase("resit_fees_invoice") ) ?>" class="form-control" id="title" name = "title" required>
    </div>

    <div class="form-group col-md-12">
      <label for="total_amount"><?= get_phrase('total_amount') ?></label>
		<div class="input-group mb-3">
			<div class="input-group-prepend border-right" style="width:15%">
			<input type="text" style="border-radius: 0.25em 0px 0px 0.25em" readonly="readonly" value="..." class="form-control" id="school_fees_currency" required>
			<input type="hidden" id="school_fees_currency_id" name = "school_fees_currency" required>
			</div>
			<input type="number" readonly="readonly" step="0.01" class="form-control" aria-label="Text input with dropdown button" id="total_amount" name="total_amount" required>
		</div>
    </div>

    <div class="form-group col-md-12">
		<label for="paid_amount"><?= get_phrase('paid_amount') ?></label>
		<div class="input-group mb-3">
			<div class="input-group-prepend border-right" style="width:15%">
			<input type="text" style="border-radius: 0.25em 0px 0px 0.25em" readonly="readonly" value="..." class="form-control" id="payment_currency" required>
			<input type="hidden" class="form-control" id="payment_currency_id" name = "payment_currency" required>
			</div>
			<input type="number" readonly="readonly" class="form-control" id="paid_amount" name = "paid_amount" required>
		</div>
    </div>

    <div class="form-group col-md-12">
      	<label for="status"><?= get_phrase('status'); ?></label>
		<select readonly="readonly" name="status" id="status" class="form-control" required >
			<option value=""><?= get_phrase('select_a_status'); ?></option>
			<option value="paid"><?= get_phrase('paid'); ?></option>
			<option value="unpaid"><?= get_phrase('unpaid'); ?></option>
      <option value="Partial payment"><?= get_phrase('partial_payment'); ?></option>

		</select>
    </div>
  </div>
  <div class="form-group  col-md-12">
    	<button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_invoice'); ?></button>
  </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllInvoices);
});

$(document).ready(function () {
  initSelect2(['#program_id', '#student_id_on_create']);
});

function getProgrammeStudents(program_id) {
  if(program_id !== "" && isFinite(program_id)){
    $.ajax({
      url: "<?= route('student/program_students/'); ?>"+ program_id,
      success: function(response){
        $('#student_id_on_create').html(response);
        $('#student_id_on_create').removeAttr("disabled");
        
      }
    });
  }else{
    $('#student_id_on_create').html('<option value=""><?= get_phrase('no_student_found'); ?></option>');
  }
  
}

function getStudentResitFees(student_id){
  if(student_id !== "" && isFinite(student_id)){
    $.ajax({
      url: "<?= route('resit_fees_invoice/student_resit_fees/'); ?>"+ student_id,
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

