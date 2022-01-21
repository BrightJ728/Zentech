<?php
  	$departments = $this->departments_model->get_all();
?>
<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-file-document-box title_icon"></i> <?= get_phrase('student_fee_manager'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/school_fees/single'); ?>', '<?= get_phrase('add_single_invoice'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_single_invoice'); ?></button>
          <button type="button" class="btn btn-outline-success btn-rounded alignToTitle" style="margin-right: 10px;" onclick="rightModal('<?= site_url('modal/popup/school_fees/mass'); ?>', '<?= get_phrase('add_mass_invoice'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_mass_invoice'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <div class="row justify-content-md-center" style="margin-bottom: 10px;">
          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <div class="form-group">
              <div id="reportrange" class="form-control text-center" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light">
                <i class="mdi mdi-calendar"></i>&nbsp;
                <span id="selectedValue" style = "text-align: center;"> <?= date('F d, Y', $date_from).' - '.date('F d, Y', $date_to); ?> </span> <i class="mdi mdi-menu-down"></i>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <div class="form-group">
              <select name="department_id" id="department_id" class="form-control select2" data-toggle="select2">
				<option value="all"><?= get_phrase('all_departments'); ?></option>
				<?php
				foreach ($departments as $department) {
					?>
				<option value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
				<?php
				} ?>
              </select>
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <div class="form-group">
				<select name="status" id="status" class="form-control select2" data-toggle="select2">
					<option value="all"><?= get_phrase('all_status'); ?></option>
					<option value="paid"><?= get_phrase('paid'); ?></option>
					<option value="unpaid"><?= get_phrase('unpaid'); ?></option>
				</select>
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <button type="button" class="btn btn-icon btn-secondary form-control" onclick="showAllInvoices()"><?= get_phrase('filter'); ?></button>
          </div>
        </div>

        <div class="row justify-content-md-center" style="margin-bottom: 10px;">
          <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <button type="button" class="btn btn-icon btn-primary form-control dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?= get_phrase('export_report'); ?></button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
				<a class="dropdown-item" id="export-csv" href="javascript:0" onclick="getExportUrl('csv')">CSV</a>
				<a class="dropdown-item" id="export-pdf" href="javascript:0" onclick="getExportUrl('pdf')">PDF</a>
				<a class="dropdown-item" id="export-print" href="javascript:0" onclick="getExportUrl('print')">Print</a>
            </div>
          </div>
        </div>
        <div class="table-responsive-sm">
          <div class="invoice_content">
            <?php include 'list.php'; ?>
          </div>
        </div> <!-- end table-responsive-->
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<style>
	.mini-list{
		border-top: 1px solid #bfaaaa66;
		border-bottom: 1px solid #bfaaaa66;
	}
	.mini-list h6{
		margin: 2px 0px;
		padding: 0px 1px;
	}
</style>
<script>
$('document').ready(function(){
  	showAllInvoices();
});
var showAllInvoices = function () {
	let url = '<?= route('school_fees/list'); ?>';
	let dateRange = $('#selectedValue').text();
	let selectedDepartment = $('#department_id').val();
	let selectedStatus = $('#status').val();
	$.ajax({
		type : 'GET',
		url: url,
		data : {date : dateRange, selectedDepartment : selectedDepartment, selectedStatus : selectedStatus},
		success : function(response) {
		$('.invoice_content').html(response);
		initDataTable("basic-datatable");
		}
	});
}

function getExportUrl(type) {
	let url = '<?= route('export_school_fees/url'); ?>';
	let dateRange = $('#selectedValue').text();
	let selectedDepartment = $('#department_id').val();
	let selectedStatus = $('#status').val();
	$.ajax({
		type : 'post',
		url: url,
		data : {type : type, dateRange : dateRange, selectedDepartment : selectedDepartment, selectedStatus : selectedStatus},
		success : function(response) {
		if (type == 'csv') {
			window.open(response, '_self');
		}else{
			window.open(response, '_blank');
		}
		}
	});
}
</script>
