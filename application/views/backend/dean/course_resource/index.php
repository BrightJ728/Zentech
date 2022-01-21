<!--title-->
<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title">
					<i class="mdi mdi-account-circle title_icon"></i> <?= get_phrase('course_resources'); ?>
				</h4>
				<a href='<?= route('courses') ?>' class="btn btn-primary btn-rounded"> <i class="mdi mdi-arrow-left"></i> <?= get_phrase('back'); ?></a>
				<button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/course_resource/create/') . $course_id ?>', '<?= get_phrase('add_resource'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_resource'); ?></button>
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
