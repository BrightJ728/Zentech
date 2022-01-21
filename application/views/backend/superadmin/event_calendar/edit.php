<?php $event_calendars = $this->db->get_where('event_calendars', array('id' => $param1))->result_array(); ?>
<?php foreach($event_calendars as $event_calendar){ ?>
    <form method="POST" class="d-block ajaxForm" action="<?= route('event_calendar/update/'.$param1); ?>">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="title"><?= get_phrase('event_title'); ?></label>
                <input type="text" class="form-control" value="<?= $event_calendar['title']; ?>" id="title" name = "title" required>
                <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_title_name'); ?></small>
            </div>
            <div class="form-group col-md-12">
                <label for="starting_date"><?= get_phrase('event_starting_date'); ?></label>
                <input type="text" value="<?= date('m/d/Y', strtotime($event_calendar['starting_date'])); ?>" class="form-control" id="starting_date" name = "starting_date" data-provide = "datepicker" required>
                <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_starting_date'); ?></small>
            </div>

            <div class="form-group col-md-12">
                <label for="ending_date"><?= get_phrase('event_ending_date'); ?></label>
                <input type="text" value="<?= date('m/d/Y', strtotime($event_calendar['ending_date'])); ?>" class="form-control" id="ending_date" name = "ending_date" data-provide = "datepicker" required>
                <small id="name_help" class="form-text text-muted"><?= get_phrase('provide_ending_date'); ?></small>
            </div>

            <div class="form-group  col-md-12">
                <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_event'); ?></button>
            </div>
        </div>
    </form>
<?php } ?>
<script>
$(document).ready(function() {

});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllEvents);
});
</script>
</script>
