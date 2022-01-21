<form method="POST" class="d-block ajaxForm" action="<?= route('book/create'); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('book_name'); ?></label>
            <input type="text" class="form-control" id="name" name = "name" required>
        </div>

        <div class="form-group col-md-12">
            <label for="author"><?= get_phrase('author'); ?></label>
            <input type="text" class="form-control" id="author" name = "author" required>
        </div>

        <div class="form-group col-md-12">
            <label for="copies"><?= get_phrase('number_of_copy'); ?></label>
            <input type="number" class="form-control" id="copies" name = "copies" min="0" required>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('save_book_info'); ?></button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllBooks);
    });
</script>
