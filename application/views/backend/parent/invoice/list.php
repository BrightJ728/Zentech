<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead class="thead-dark">
        <tr>
            <th><?= get_phrase('student'); ?></th>
            <th><?= get_phrase('class'); ?></th>
            <th><?= get_phrase('invoice_title'); ?></th>
            <th><?= get_phrase('total_amount'); ?></th>
            <th><?= get_phrase('paid_amount'); ?></th>
            <th><?= get_phrase('status'); ?></th>
            <th><?= get_phrase('creation_date'); ?></th>
            <th><?= get_phrase('option'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $invoices = $this->crud_model->get_invoice_by_parent_id();
        foreach ($invoices as $invoice):
            $student_details = $this->user_model->get_student_details_by_id('student', $invoice['student_id']);
            $class_details = $this->crud_model->get_class_details_by_id($invoice['class_id'])->row_array(); ?>
            <tr>
                <td> <?= $student_details['name']; ?> </td>
                <td> <?= $class_details['name']; ?> </td>
                <td> <?= $invoice['title']; ?> </td>
                <td> <?= currency($invoice['total_amount']); ?> </td>
                <td> <?= currency($invoice['paid_amount']); ?> </td>
                <td>
                    <?php if (strtolower($invoice['status']) == 'unpaid'): ?>
                        <span class="badge badge-danger-lighten"><?= ucfirst($invoice['status']); ?></span>
                    <?php else: ?>
                        <span class="badge badge-success-lighten"><?= ucfirst($invoice['status']); ?></span>
                    <?php endif; ?>
                </td>
                <td> <?= date('D, d-M-Y', $invoice['created_at']); ?> </td>
                <td>
                    <?php if (strtolower($invoice['status']) == 'unpaid'): ?>
                        <div class="dropdown text-center">
                            <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="<?= route('payment/'.$invoice['id']); ?>" class="dropdown-item"><?= get_phrase('make_payment'); ?></a>
                            </div>
                        </div>
                    <?php elseif (strtolower($invoice['status']) == 'paid'): ?>
                        <div class="dropdown text-center">
                            <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="<?= route('invoice/invoice/'.$invoice['id']); ?>" class="dropdown-item" target="_blank"><?= get_phrase('print_invoice'); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
