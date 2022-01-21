<?php
$date_from = strtotime(date('Y-m-01')." 00:00:00"); // hard-coded '01' for first day
$date_to   = strtotime(date('Y-m-t')." 23:59:59");
?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr>
            <th><?=  get_phrase('student') ; ?></th>
            <th><?=  get_phrase('department') ; ?></th>
            <th><?=  get_phrase('invoice_title') ; ?></th>
            <th><?=  get_phrase('total_amount') ; ?></th>
            <th><?=  get_phrase('paid_amount') ; ?></th>
            <th><?=  get_phrase('status') ; ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $invoices = $this->accounting_m->get_invoice_by_date_range($date_from, $date_to, 'all', 'all');
        foreach ($invoices as $invoice): ?>
        <tr>
            <td>
                <?= $invoice['first_name'] . " " . $invoice["last_name"] ?>
            </td>
            <td>
                <? $invoice['program'];
                 ?>
            </td>
            <td>
                <?=  $invoice['title'] ; ?>
            </td>
            <td>
                <?=  currency($invoice['total_amount']) ; ?>
            </td>
            <td>
                <?=  currency($invoice['paid_amount']) ; ?>
            </td>
            <td>
                <?=  ucfirst($invoice['status']) ; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
