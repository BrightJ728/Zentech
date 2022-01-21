<?php
    if (count($students) > 0) { ?>
        <form name="promotion_form" class="d-block ajaxForm" method="POST" action="<?= route('records/bulk_update_student_records') ?>">
            <input type="hidden" name="year_level_id" value="<?= $year_level['id']?>"/>
            <table id="datatable-buttons1" class="table table-striped dt-responsive nowrap" width="100%">
                <thead>
                    <tr style="background-color: #313a46; color: #ababab;">
                        <th><?= get_phrase('name'); ?></th>
                        <th><?= get_phrase('grades'); ?> </th>
                        <th><?= get_phrase('actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $student): ?>
                        <tr>
                            <td><?= $student['first_name'] . " " . $student['last_name'] ?></td>
                            <td>Grades for academic year</td>
                            <td>
                                actions
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    <?php } else { ?>
        <?php include APPPATH.'views/backend/empty.php'; ?>
    <?php } ?>
<script>
    $(document).ready(function () {
        $(".ajaxForm").validate({}); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, () => {window.location.reload()});
        });
    });
</script>
