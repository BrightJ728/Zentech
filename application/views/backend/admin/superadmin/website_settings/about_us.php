<div class="card">
  <div class="card-body">
    <h4 class="header-title"><?= get_phrase('about_us_settings') ;?></h4>
    <form method="POST" class="col-12 aboutUsSettings" action="<?= route('about_us/update') ;?>" id = "about_us_settings">
      <div class="row justify-content-left">
        <div class="col-12">
          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="about_us"> <?= get_phrase('about_us') ;?></label>
            <div class="col-md-9">
              <textarea name="about_us" id="about_us" class="form-control" rows="8" cols="80"><?= get_frontend_settings('about_us'); ?></textarea>
            </div>
          </div>
         
          <div class="text-center">
            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateAboutUsSettings()"><?= get_phrase('update_settings') ;?></button>
          </div>
        </div>
      </div>
    </form>

  </div> <!-- end card body-->
</div>

<script type="text/javascript">
$(document).ready(function () {
  initSummerNote(['#about_us']);
});
</script>
