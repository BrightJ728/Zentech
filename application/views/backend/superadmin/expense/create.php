<form method="POST" class="d-block ajaxForm" action="<?= route('expense/create'); ?>">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="date"><?= get_phrase('date'); ?></label>
      <input type="text" class="form-control date" id="date" data-toggle="date-picker" data-single-date-picker="true" name = "date" value="" required>
    </div>

    <div class="form-group col-md-12">
      <label for="amount"><?= get_phrase('amount').' ('.currency_code_and_symbol('code').')'; ?></label>
      <input type="text" class="form-control" id="amount" name = "amount" required>
    </div>

    <div class="form-group col-md-12">
      <label for="expense_category_id"><?= get_phrase('expense_category'); ?></label>
      <select class="form-control select2" data-toggle = "select2" name="expense_category_id" id = "expense_category_id_on_create" required>
        <option value=""><?= get_phrase('select_an_expense_category'); ?></option>
        <?php
        $expense_categories = $this->crud_model->get_expense_categories()->result_array();
        foreach ($expense_categories as $expense_category): ?>
        <option value="<?= $expense_category['id']; ?>"><?= $expense_category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group  col-md-12">
    <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_expense'); ?></button>
  </div>
</div>
</form>

<script>
$(document).ready(function() {
  initSelect2(['#expense_category_id_on_create']);
  $('#date').daterangepicker();
});

$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllExpenses);
});
</script>
