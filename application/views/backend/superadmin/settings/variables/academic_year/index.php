<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> <?= get_phrase('academic_year'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/settings/academic_years/create?view=variables/academic_year/create'); ?>', '<?= get_phrase('create_academic_year'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_academic_year'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body academic_year_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>
<style>
	.pagination-list ul{
		list-style: none;
		display: flex;
		padding: 0px 10px;
		justify-content: space-between;
	}
	#right-modal .modal-dialog{
		width: 50%;
	}
	.modal-right form {
		max-width: 90%;
	}
	#academic-year-form .steps ul{
		list-style: none;
		display: flex;
		padding: 10px 0px;
		background: #e4e0e05c;
		border-radius: 0.25em;
	}
	#academic-year-form .steps ul li{
		padding: 0px 10px;
		margin: 0px 10px;
	}
	.steps-tab-list{
		list-style: none;
		display: flex;
		padding: 0px 10px;
		justify-content: space-between;
	}
	.steps-tab-list li > a{

	}
	h4.tab{
		font-weight: 400;
		text-decoration: underline;
	}
</style>

<script>
  let showAllAcademicYears = function () {
      $.ajax({
          url: '<?= route('academic_years/list?view=variables/academic_year/list') ?>',
          success: function(response){
              $('.academic_year_content').html(response);
          }
      });
  }

</script>
