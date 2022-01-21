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
        <?php $invoices = $this->accounting_m->get_invoice_by_date_range($date_from, $date_to, $selected_status);
            foreach ($invoices as $invoice): ?>
            <tr>
                <td> <?= sprintf('%08d', $invoice['id']); ?> </td>
                <td>
                    <b><?= $invoice['first_name'] . " " . $invoice['last_name']; ?></b> <br>
                    <small> <strong><?= get_phrase('program'); ?> :</strong> <?= $invoice['program']; ?></small><br>
                    <small> <strong><?= get_phrase('level'); ?> :</strong> <?= $invoice['level']; ?></small>
                </td>
                <td> <?= $invoice['title']; ?> </td>
                <td> <?= $invoice['academic_year']; ?> </td>
                <td>
                    <?= $invoice['currency_symbol'] ." ". number_format($invoice['total_amount']); ?> <br>
                    <small> <strong> <?= get_phrase('created_at'); ?> : </strong> <?= date('d-M-Y', $invoice['created_at']); ?> </small>
                </td>
                <td>
                    <?= $invoice['currency_symbol'] ." ". number_format($invoice['paid_amount']); ?> <br>
                    <?php $invoice_payments = $this->accounting_m->get_invoice_payments($invoice["id"]); 
                    if (count($invoice_payments) > 0):?>
                        <?php foreach ($invoice_payments as $invoice_payment):?>
                            <div class="mini-list">
                                <h6> <?= get_phrase('payment'); ?> : <?= $invoice_payment['currency']  ." ". number_format($invoice_payment['amount']); ?></h6>
                                <h6> <?= get_phrase('date'); ?> : <?= date('d-M-Y', strtotime($invoice_payment['created'])) ?></h6>
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
                <?= $invoice['currency_symbol'] ;?>&nbsp;<?= number_format( $invoice['total_amount'] - $invoice['paid_amount']); ?> <br>
                </td>
                <td>
                    <?php if (strtolower($invoice['status']) == 'unpaid'): ?>
                        <span class="badge badge-danger-lighten"><?= ucfirst($invoice['status']); ?></span>
                        <?php elseif (strtolower($invoice['status']) == 'paid'): ?>
                        <span class="badge badge-success-lighten"><?= ucfirst($invoice['status']); ?></span>
                    <?php else: ?>
                        <span class="badge badge-warning-lighten"><?= ucfirst($invoice['status']); ?></span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= route('school_fees/invoice/'.$invoice['id']); ?>" class="dropdown-item" target="_blank"><?= get_phrase('print_invoice'); ?></a>
                            <!-- item-->
                            <?php if (strtolower($invoice['status']) == 'unpaid' || floatval($invoice['paid_amount']) < floatval($invoice['total_amount'])): ?>
                                <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/school_fees/add_payment/'. $invoice['id']); ?>', '<?= get_phrase('add_payment'); ?>');"><?= get_phrase('add_payment'); ?></a>
                            <?php endif ?>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('school_fees/delete/'.$invoice['id']); ?>', showAllInvoices )"><?= get_phrase('delete'); ?></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

