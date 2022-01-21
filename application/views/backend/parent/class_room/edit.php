<?php $class_rooms = $this->db->get_where('class_rooms', array('id' => $param1))->result_array(); ?>
<?php foreach($class_rooms as $class_room){ ?>
<form method="POST" class="d-block ajaxForm" action="<?= route('class_room/update/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name"><?= get_phrase('class_room_name'); ?></label>
            <input type="text" class="form-control" value="<?= $class_room['name']; ?>" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_class_room_name'); ?></small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_class_room'); ?></button>
        </div>
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllClassRooms);
});
</script>
