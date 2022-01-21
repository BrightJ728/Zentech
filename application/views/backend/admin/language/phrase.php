<?php foreach (openJSONFile($param1) as $key => $value): ?>
    <div class="form-row align-items-end">
        <div class="form-group col-10">
            <label for="name"><?= ucfirst(str_replace('_', ' ', $key)); ?></label>
            <input type="text" class="form-control" name="updated_phrase" value="<?= $value; ?>" id = "phrase-<?= $key; ?>">
            <input type="hidden" name="id" id = "language_id_{{ $key }}" value="{{ $language->id }}">
        </div>
        <div class="form-group col-2">
            <button class="btn btn-icon btn-success" type="button" onclick="updatePhrase('<?= $key; ?>')"><i class="mdi mdi-check-circle-outline"></i></button>
        </div>
    </div>
<?php endforeach; ?>


<script type="text/javascript">
function updatePhrase(key) {
    $('#btn-'+key).text('...');
    var updatedValue = $('#phrase-'+key).val();
    var currentEditingLanguage = '<?= $param1; ?>';
    $.ajax({
        type : "POST",
        url  : "<?= route('language/update_phrase'); ?>",
        data : {updatedValue : updatedValue, currentEditingLanguage : currentEditingLanguage, key : key},
        success : function(response) {
            $('#btn-'+key).html('<i class = "mdi mdi-check-circle"></i>');
            success_notify('<?= get_phrase('phrase_updated').". ".get_phrase('please_make_sure_to_reload_the_browser');?>');
        }
    });
}
</script>
