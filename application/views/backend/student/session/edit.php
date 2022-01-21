<?php $sessions = $this->db->get_where('sessions', array('id' => $param1))->result_array(); ?>
<?php foreach($sessions as $session){ ?>
<form method="POST" class="d-block ajaxForm" action="<?= route('session_manager/update/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('session_title'); ?></label>
            <input type="text" class="form-control" value="<?= $session['name']; ?>" id="name" name = "session_title" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_session_title'); ?></small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_session'); ?></button>
        </div>
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
  $(".ajaxForm").submit(function(e) {
      var form = $(this);
      ajaxSubmit(e, form, showAllSessions);
  });
</script>
