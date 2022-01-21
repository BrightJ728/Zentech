<?php $grade = $this->db->get_where('grades', array('id' => $param1))->row_array(); ?>
<form method="POST" class="d-block ajaxForm" action="<?= route('grade/update/'.$grade['id']); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="grade"><?= get_phrase('grade'); ?></label>
            <input type="text" class="form-control" id="grade" name = "grade" placeholder="<?= get_phrase('grade'); ?>" value="<?= $grade['name']; ?>" required>
        </div>

        <div class="form-group col-md-12">
            <label for="grade_point"><?= get_phrase('grade_point'); ?></label>
            <input type="number" class="form-control" id="grade_point" name = "grade_point" placeholder="<?= get_phrase('grade_point'); ?>" value="<?= $grade['grade_point']; ?>" required>
        </div>

        <div class="form-group col-md-12">
            <label for="mark_from"><?= get_phrase('mark_from'); ?></label>
            <input type="number" class="form-control" id="mark_from" name = "mark_from" placeholder="<?= get_phrase('mark_from'); ?>" value="<?= $grade['mark_from']; ?>" required>
        </div>

        <div class="form-group col-md-12">
            <label for="mark_upto"><?= get_phrase('mark_upto'); ?></label>
            <input type="number" class="form-control" id="mark_upto" name = "mark_upto" placeholder="<?= get_phrase('mark_upto'); ?>" value="<?= $grade['mark_upto']; ?>" required>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?= get_phrase('update_grade'); ?></button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllGrades);
    });
</script>
