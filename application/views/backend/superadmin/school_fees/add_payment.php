<?php 
  $invoice = $this->accounting_m->get_invoices($param1); 
?>
<form method="POST" class="d-block ajaxForm" action="<?= route('school_fees/add_payment/' . $param1); ?>">
  <div class="form-row">
    
    <div class="form-group col-md-12">
        <label for="student_name"><?= get_phrase('student'); ?></label>
        <input type="text" id="student_name" disabled value="<?= ucwords($invoice["first_name"] . " " . $invoice["last_name"] ) ?>" class="form-control" required>
    </div>

    <div class="form-group col-md-12">
		<label for="invoice_title"><?= ucwords(get_phrase('invoice_title')) ?></label>
		<input type="text" disabled value="<?= ucwords( get_phrase($invoice["title"]) ) ?>" class="form-control" id="invoice_title" required>
    </div>

    <div class="form-group col-md-12">
      <label for="total_amount"><?= ucwords(get_phrase('total_amount')) ?></label>
		<div class="input-group mb-3">
			<div class="input-group-prepend border-right" style="width:15%">
			<input type="text" style="border-radius: 0.25em 0px 0px 0.25em" disabled value="<?= $invoice["currency_symbol"] ?>" class="form-control"  >
			</div>
			<input type="text" disabled value="<?= $invoice["total_amount"] ?>" class="form-control" aria-label="Text input with dropdown button" id="total_amount">
		</div>
    </div>

    <div class="form-group col-md-12">
		<label for="paid_amount"><?= ucwords(get_phrase('paid_amount')) ?></label>
		<div class="input-group mb-3">
			<div class="input-group-prepend border-right" style="width:15%">
			<input type="text" style="border-radius: 0.25em 0px 0px 0.25em" disabled value="<?= $invoice["currency_symbol"] ?>" class="form-control"  >
			</div>
			<input type="text" disabled value="<?= $invoice["paid_amount"] ?>" class="form-control" id="paid_amount" required>
		</div>
    </div>

    <div class="form-group col-md-12">
		<label for="balance"><?= get_phrase('balance') ?></label>
		<div class="input-group mb-3">
			<div class="input-group-prepend border-right" style="width:15%">
			<input type="text" style="border-radius: 0.25em 0px 0px 0.25em" disabled value="<?= $invoice["currency_symbol"] ?>" class="form-control" required>
			</div>
			<input type="text" disabled class="form-control" id="balance" value="<?= floatval($invoice["total_amount"]) - floatval($invoice["paid_amount"]) ?>" required>
		</div>
    </div>
    <div class="form-group col-md-12">
		<label for="payment_amount"><?= ucwords(get_phrase('payment_amount')) ?></label>
		<div class="input-group mb-3">
			<div class="input-group-prepend border-right" style="width:15%">
			<input type="text" style="border-radius: 0.25em 0px 0px 0.25em" readonly value="<?= $invoice["currency_symbol"] ?>" class="form-control" id="payment_currency" name="payment_currency" required>
			<input type="hidden" style="border-radius: 0.25em 0px 0px 0.25em" readonly value="<?= $invoice["amount_currency_id"] ?>" class="form-control" id="payment_currency_id" name="payment_currency_id" required>
			</div>
			<input type="number" step="0.01" class="form-control" id="payment_amount" name = "payment_amount" required><br>
		</div>
    </div>

  </div>
  <div class="form-group  col-md-12">
    <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('add_payment'); ?></button>
  </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllInvoices);
});


</script>
