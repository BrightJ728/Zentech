<!--title-->
<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title">
					<i class="mdi mdi-account-circle title_icon"></i> <?= get_phrase('accountant'); ?>
					<button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/accountant/create'); ?>', '<?= get_phrase('create_accountant'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_accountant'); ?></button>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body accountant_content">
				<?php include 'list.php'; ?>
			</div>
		</div>
	</div>
</div>

<script>
	const showAllAccountants = function() {
		const url = '<?= route('accountant/list'); ?>';

		$.ajax({
			type: 'GET',
			url: url,
			success: function(response) {
				$('.accountant_content').html(response);
				initDataTable('basic-datatable');
			}
		});
	}
</script>