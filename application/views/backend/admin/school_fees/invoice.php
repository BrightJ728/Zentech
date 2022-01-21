<?php
  $invoice_details = $this->accounting_m->get_invoices($invoice_id);
  $student_details = $this->student_model->get_students($invoice_details['student_id']);
 ?>

<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
            	<i class="mdi mdi-grease-pencil title_icon"></i> <?= get_phrase('invoice'); ?>
        	</h4>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <!-- Invoice Logo-->
        <div class="clearfix">
          <div class="float-left mb-1">
            <img src="<?= $this->settings_model->get_logo_dark(); ?>" alt="" height="18">
          </div>
        </div>

        <!-- Invoice Detail-->
        <div class="row">
          <div class="col-sm-6">
            <div class="float-left mt-1">
              <p><b><?= get_phrase('hello'); ?>, <?= $student_details['name']; ?></b></p>
              <p class="text-muted font-13"><?= get_phrase('please_find_below_the_invoice'); ?>.</p>
            </div>

          </div><!-- end col -->
          <div class="col-sm-4 offset-sm-2">
            <div class="mt-1 float-sm-right">
              <p class="font-13"><strong><?= get_phrase('invoice_no'); ?>: </strong> &nbsp;&nbsp;&nbsp; <?= sprintf('%08d', $invoice_details['id']); ?></p>
              <p class="font-13"><strong><?= get_phrase('date'); ?>: </strong> &nbsp;&nbsp;&nbsp; <?= date('D, d-M-Y'); ?></p>
              <p class="font-13"><strong><?= get_phrase('status'); ?>: </strong>
                <?php if (strtolower($invoice_details['status']) == 'paid'): ?>
                  <span class="badge badge-success float-right"><?= get_phrase('paid'); ?></span></p>
                <?php else: ?>
                  <span class="badge badge-danger float-right"><?= get_phrase('unpaid'); ?></span></p>
                <?php endif; ?>
            </div>
          </div><!-- end col -->
        </div>
        <!-- end row -->

        <div class="row mt-2">
          <div class="col-sm-4">
            <h6><?= get_phrase('billing_details'); ?></h6>
            <address>
              <?= $student_details['name']; ?><br>
              <?= $student_details['address'] == "" ? '('.get_phrase('address_not_found').')' : $student_details['address']; ?><br>
              <abbr title="Phone">P:</abbr> <?= $student_details['phone'] == "" ? '('.get_phrase('phone_number_not_found').')' : $student_details['phone']; ?><br>
            </address>
          </div> <!-- end col-->
        </div>
        <!-- end row -->

        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table mt-2">
                <thead>
                  <tr><th>#</th>
                    <th><?= get_phrase('invoice_title'); ?></th>
                    <th><?= get_phrase('total_amount'); ?></th>
                    <th><?= get_phrase('paid_amount'); ?></th>
                    <th class="text-right"><?= get_phrase('due_amount'); ?></th>
                  </tr></thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>
                        <b><?= get_phrase('student_fee'); ?></b> <br/>
                        <?= get_phrase('created_at').' : '.date('D, d-M-Y', $invoice_details['created_at']); ?>
                      </td>
                      <td><?= currency($invoice_details['total_amount']); ?></td>
                      <td>
					  	<h5><?= get_phrase('total_payment') ?>: <?= currency($invoice_details['paid_amount']); ?><h5>
						<h5><?= get_phrase('payments'); ?></h5>
						<?php $invoice_payments = $this->accounting_m->get_invoice_payments($invoice_details["id"]); 
							if (count($invoice_payments) > 0):?>
								<?php foreach ($invoice_payments as $invoice_payment):?>
									<div class="mini-list">
										<h6> <?= get_phrase('payment'); ?> : <?= $invoice_payment['currency']  . $invoice_payment['amount']; ?></h6>
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
                      <td class="text-right"><?= currency($invoice_details['total_amount'] - $invoice_details['paid_amount']); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div> <!-- end table-responsive-->
            </div> <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row">
            <div class="col-sm-6">
              <div class="clearfix pt-3">
                <h6 class="text-muted"></h6>
                <small>

                </small>
              </div>
            </div> <!-- end col -->
            <div class="col-sm-6">
              <div class="float-right mt-1 mt-sm-0">
                <p><b><?= get_phrase('total_amount'); ?> :&nbsp;</b> <span class="float-right"><?= currency($invoice_details['total_amount']); ?></span></p>
                <p><b><?= get_phrase('due_amount'); ?> : </b> <span class="float-right"><?= currency($invoice_details['total_amount'] - $invoice_details['paid_amount']); ?></span></p>
                <h3><?= currency($invoice_details['total_amount'] - $invoice_details['paid_amount']); ?></h3>
              </div>
              <div class="clearfix"></div>
            </div> <!-- end col -->
          </div>
          <!-- end row-->

          <div class="d-print-none mt-2">
            <div class="text-right">
              <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> <?= get_phrase('print'); ?></a>
            </div>
          </div>
          <!-- end buttons -->

        </div> <!-- end card-body-->
      </div> <!-- end card -->
    </div> <!-- end col-->
  </div>
<style>
	.mini-list{
		border-top: 1px solid #bfaaaa66;
		border-bottom: 1px solid #bfaaaa66;
	}
	.mini-list h6{
		margin: 2px 0;
	}
</style>