<?php  $expense_category_details = $this->db->get_where('expense_categories', array('id' => $param1))->row_array(); ?>
<form method="POST" class="d-block ajaxForm" action="<?= route('expense_category/update/'.$param1); ?>">
  <div class="form-group col-md-12">
    <label for="name"><?= get_phrase('expense_category_name'); ?></label>
    <input type="text" class="form-control" id="name" name = "name" value="<?= $expense_category_details['name']; ?>" required>
  </div>

  <div class="form-group  col-md-12">
    <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_expense_category'); ?></button>
  </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllExpenseCategories);
});
</script>
