<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('course_registration'); ?>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    
                </div>
            </div>
            <div class="card-body registration_content">
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function() {
		showRegistrationForm();
	});
	const showRegistrationForm = () => {
		const url = '<?= route('course_registration/form'); ?>';
		$.ajax({
			type : 'GET',
			url: url,
			success : function(response) {
				$('.registration_content').html(response);
				initDataTable("basic-datatable");
			}
		});
	} ;
</script>