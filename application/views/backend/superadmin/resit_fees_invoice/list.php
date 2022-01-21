<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead class="thead-dark">
        <tr>
            <th><?= get_phrase('invoice_no'); ?></th>
            <th><?= get_phrase('student'); ?></th>
            <th><?= get_phrase('invoice_title'); ?></th>
            <th><?= get_phrase('academic_year'); ?></th>
            <th><?= get_phrase('total_amount'); ?></th>
            <th><?= get_phrase('paid_amount'); ?></th>
            <th><?= get_phrase('balance'); ?></th>
            <th><?= get_phrase('status'); ?></th>
            <th><?= get_phrase('option'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $resit_fees_invoices = $this->accounting_m->get_resit_fees_invoice_by_date_range($date_from, $date_to, $selected_status);
            foreach ($resit_fees_invoices as $resit_fees_invoice): ?>
            <tr>
                <td> <?= sprintf('%08d', $resit_fees_invoice['id']); ?> </td>
                <td>
                    <b><?= $resit_fees_invoice['first_name'] . " " . $resit_fees_invoice['last_name']; ?></b> <br>
                    <small> <strong><?= get_phrase('program'); ?> :</strong> <?= $resit_fees_invoice['program']; ?></small><br>
                    <small> <strong><?= get_phrase('level'); ?> :</strong> <?= $resit_fees_invoice['level']; ?></small>
                </td>
                <td> <?= $resit_fees_invoice['title']; ?> </td>
                <td> <?= $resit_fees_invoice['academic_year']; ?> </td>
                <td>
                    <?= currency($resit_fees_invoice['total_amount']); ?> <br>
                    <small> <strong> <?= get_phrase('created_at'); ?> : </strong> <?= date('d-M-Y', $resit_fees_invoice['created_at']); ?> </small>
                </td>
                <td>
                    <?= currency($resit_fees_invoice['paid_amount']); ?> <br>
                    <?php $resit_fees_invoice_payments = $this->accounting_m->get_resit_fees_payments($resit_fees_invoice["id"]); 
                    if (count($resit_fees_invoice_payments) > 0):?>
                        <?php foreach ($resit_fees_invoice_payments as $resit_fees_invoice_payment):?>
                            <div class="mini-list">
                                <h6> <?= get_phrase('payment'); ?> : <?= $resit_fees_invoice_payment['currency']  . $resit_fees_invoice_payment['amount']; ?></h6>
                                <h6> <?= get_phrase('date'); ?> : <?= date('d-M-Y', strtotime($resit_fees_invoice_payment['created'])) ?></h6>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <small>
                            <strong> <?= get_phrase('payment_date'); ?> : </strong>
                            <?= get_phrase('not_found'); ?>
                        </small>
                    <?php endif; ?>
                </td>
                <td>
                    <?= currency($resit_fees_invoice['total_amount'] - $resit_fees_invoice['paid_amount']); ?> <br>
                </td>
                <td>
                    <?php if (strtolower($resit_fees_invoice['status']) == 'unpaid'): ?>
                        <span class="badge badge-danger-lighten"><?= ucfirst($resit_fees_invoice['status']); ?></span>
                        <?php elseif (strtolower($resit_fees_invoice['status']) == 'paid'): ?>
                        <span class="badge badge-success-lighten"><?= ucfirst($resit_fees_invoice['status']); ?></span>
                        <?php else: ?>
                        <span class="badge badge-warning-lighten"><?= ucfirst($resit_fees_invoice['status']); ?></span>
                    
                    <?php endif; ?>
                </td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                           
                            <!-- item-->
                            <?php if (strtolower($resit_fees_invoice['status']) == 'unpaid' || floatval($resit_fees_invoice['paid_amount']) < floatval($resit_fees_invoice['total_amount'])): ?>
                                <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/resit_fees_invoice/add_payment/'. $resit_fees_invoice['id']); ?>', '<?= get_phrase('add_payment'); ?>');"><?= get_phrase('add_payment'); ?></a>
                            <?php endif ?>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('resit_fees_invoice/delete/'.$resit_fees_invoice['id']); ?>', showAllInvoices )"><?= get_phrase('delete'); ?></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
