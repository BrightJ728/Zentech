<?php
$users = $this->db->get_where('users', array('id' => $param1))->result_array();
foreach($users as $user): ?>
<form method="POST" class="d-block ajaxForm" action="<?= route('admin/update/'.$param1); ?>">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="name"><?= get_phrase('name'); ?></label>
      <input type="text" value="<?= $user['name']; ?>" class="form-control" id="name" name = "name" required>
      <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_name'); ?></small>
    </div>

    <div class="form-group col-md-12">
      <label for="email"><?= get_phrase('email'); ?></label>
      <input type="email" value="<?= $user['email']; ?>" class="form-control" id="email" name = "email" required>
      <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_email'); ?></small>
    </div>


    <div class="form-group col-md-12">
      <label for="phone"><?= get_phrase('phone_number'); ?></label>
      <input type="text" value="<?= $user['phone']; ?>" class="form-control" id="phone" name = "phone" required>
      <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_phone_number'); ?></small>
    </div>

    <div class="form-group col-md-12">
      <label for="gender"><?= get_phrase('admin_of'); ?></label>
      <select name="school_id" id="school_id" class="form-control select2" data-toggle = "select2">
        <option value=""><?= get_phrase('select_a_school'); ?></option>
        <?php $schools = $this->crud_model->get_schools()->result_array(); ?>
        <?php foreach ($schools as $school): ?>
          <option value="<?= $school['id']; ?>" <?php if ($school['id'] == $user['school_id']): ?> selected <?php endif; ?>><?= $school['name']; ?></option>
        <?php endforeach; ?>
      </select>
      <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_gender'); ?></small>
    </div>

    <div class="form-group col-md-12">
      <label for="gender"><?= get_phrase('gender'); ?></label>
      <select name="gender" id="gender" class="form-control select2" data-toggle = "select2">
        <option value=""><?= get_phrase('select_a_gender'); ?></option>
        <option value="Male" <?php if($user['gender'] == 'Male') echo 'selected'; ?>><?= get_phrase('male'); ?></option>
        <option value="Female" <?php if($user['gender'] == 'Female') echo 'selected'; ?>><?= get_phrase('female'); ?></option>
        <option value="Others" <?php if($user['gender'] == 'Others') echo 'selected'; ?>><?= get_phrase('others'); ?></option>
      </select>
      <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_gender'); ?></small>
    </div>

    <div class="form-group col-md-12">
      <label for="phone"><?= get_phrase('address'); ?></label>
      <textarea class="form-control" id="address" name = "address" rows="5" required><?= $user['address']; ?></textarea>
      <small id="" class="form-text text-muted"><?= get_phrase('provide_admin_address'); ?></small>
    </div>

    <div class="form-group mt-2 col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_admin'); ?></button>
    </div>
  </div>
</form>
<?php endforeach; ?>

<script>

$(document).ready(function () {
  initSelect2(['#school_id', '#gender', '#blood_group']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllAdmins);
});
</script>
