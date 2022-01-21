<form method="POST" class="d-block ajaxForm" action="<?= route('invoice/mass'); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="class_id_on_create"><?= get_phrase('class'); ?></label>
            <select name="class_id" id="class_id_on_create" class="form-control select2" data-toggle="select2"  required onchange="classWiseSectionOnCreate(this.value)">
                <option value=""><?= get_phrase('select_a_class'); ?></option>
                <?php $classes = $this->crud_model->get_classes()->result_array(); ?>
                <?php foreach($classes as $class): ?>
                    <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group  col-md-12">
            <label for="section_id_on_create" class="col-md-3 col-form-label"><?= get_phrase('section'); ?></label>
            <select name="section_id" id = "section_id_on_create" class="form-control select2" data-toggle="select2" required>
                <option value=""><?= get_phrase('select_section'); ?></option>
            </select>
        </div>

        <div class="form-group col-md-12">
            <label for="title"><?= get_phrase('invoice_title'); ?></label>
            <input type="text" class="form-control" id="title" name = "title" required>
        </div>

        <div class="form-group col-md-12">
            <label for="total_amount"><?= get_phrase('total_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
            <input type="number" class="form-control" id="total_amount" name = "total_amount" required>
        </div>

        <div class="form-group col-md-12">
            <label for="paid_amount"><?= get_phrase('paid_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
            <input type="number" class="form-control" id="paid_amount" name = "paid_amount" required>
        </div>

        <div class="form-group col-md-12">
            <label for="status"><?= get_phrase('status'); ?></label>
            <select name="status" id="status" class="form-control select2" data-toggle="select2" required >
                <option value=""><?= get_phrase('select_a_status'); ?></option>
                <option value="paid"><?= get_phrase('paid'); ?></option>
                <option value="unpaid"><?= get_phrase('unpaid'); ?></option>
            </select>
        </div>
    </div>
    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('create_mass_invoice'); ?></button>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllInvoices);
});

$(document).ready(function () {
    initSelect2(['#class_id_on_create', '#section_id_on_create', '#status']);
});

function classWiseSectionOnCreate(classId) {
    $.ajax({
        url: "<?= route('section/list/'); ?>"+classId,
        success: function(response){
            $('#section_id_on_create').html(response);
        }
    });
}
</script>
