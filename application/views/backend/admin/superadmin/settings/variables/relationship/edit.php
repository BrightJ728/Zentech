<?php $school_id = school_id(); ?>
<?php $relationship = $this->db->get_where('relationships', array('id' => $param1))->row_array(); ?>

<form method="POST" class="d-block ajaxForm" action="<?= route('relationship/update/'.$param1); ?>">
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="start_date"><?= get_phrase('relationship'); ?></label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $relationship["description"] ?>" required>
        <small id="name_help" class="form-text text-muted"><?= get_phrase('relationship_type'); ?></small>
      </div>
        
        <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_relationship'); ?></button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllRelationships);
});

$(document).ready(function() {
});
</script>
