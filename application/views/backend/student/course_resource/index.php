<!--title-->
<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title">
					<i class="mdi mdi-account-circle title_icon"></i> <?= get_phrase('course_resources'); ?>
				</h4>
				<a href='<?= route('courses') ?>' class="btn btn-primary btn-rounded"> <i class="mdi mdi-arrow-left"></i> <?= get_phrase('back'); ?></a>
				
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body materials_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
	const showAllResources = () => {
		$.ajax({
			url: '<?= route('courses/resource_list/') ?>' + <?= $course_id ?>,
			success: function(response){
				$('.materials_content').html(response);
			}
		});
	}
</script>
