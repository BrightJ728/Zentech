<?php $schools = $this->db->get_where('schools', array('id' => $param1))->result_array(); ?>
<?php foreach($schools as $school){ ?>
  <form method="POST" class="d-block ajaxForm" action="<?= site_url('addons/multischool/update/'.$param1); ?>">
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name"><?= get_phrase('school_name'); ?></label>
        <input type="text" class="form-control" id="name" name = "name" value="<?= $school['name']; ?>" required>
        <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_school_name'); ?></small>
      </div>

      <div class="form-group col-md-12">
        <label for="phone"><?= get_phrase('address'); ?></label>
        <textarea class="form-control" id="address" name = "address" rows="5" required><?= $school['address']; ?></textarea>
        <small id="" class="form-text text-muted"><?= get_phrase('provide_school_address'); ?></small>
      </div>

      <div class="form-group col-md-12">
        <label for="name"><?= get_phrase('phone'); ?></label>
        <input type="text" class="form-control" id="phone" name = "phone" value="<?= $school['phone']; ?>" required>
        <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_school_phone_number'); ?></small>
      </div>

      <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('edit_school'); ?></button>
      </div>
    </div>
  </form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllSchools);
});
</script>
