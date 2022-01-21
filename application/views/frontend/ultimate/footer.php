<?php
$logo_dark = $this->settings_model->get_logo_dark();
$social = get_frontend_settings('social_links');
$links = json_decode($social);
?>
<!-- ========== FOOTER ========== -->
<footer class="border-top">
  <div class="container space-2">
    <div class="row">
      <div class="col-sm-3 col-lg-2 order-sm-2 mb-4 mb-sm-0 ml-lg-auto">
        <h4 class="h6 font-weight-semi-bold">Contact</h4>

        <!-- Address -->
        <address>
          <ul class="list-group list-group-flush list-group-borderless mb-0">
            <li class="list-group-item">
              <?= get_settings('phone'); ?>
            </li>
            <li class="list-group-item">
              <a href="mailto:<?= get_settings('system_email'); ?>">
                <?= get_settings('system_email'); ?>
              </a>
            </li>
            <li class="list-group-item">
              <?= get_settings('address'); ?>
            </li>
          </ul>
        </address>
        <!-- End Address -->
      </div>
      <div class="col-sm-3 col-lg-2 order-sm-2 mb-4 mb-sm-0 ml-lg-auto">
        <h4 class="h6 font-weight-semi-bold">About</h4>

        <!-- List Group -->
        <ul class="list-group list-group-flush list-group-borderless mb-0">
          <li><a class="list-group-item list-group-item-action"
            href="<?= site_url('home/about');?>">About</a></li>
            <li><a class="list-group-item list-group-item-action"
              href="<?= site_url('home/lecturers');?>">lecturers </a></li>
              <li><a class="list-group-item list-group-item-action"
                href="<?= site_url('home/gallery');?>">Gallery </a></li>
                    </ul>
              <!-- End List Group -->
            </div>

            <div class="col-sm-3 col-lg-2 order-sm-3 mb-4 mb-sm-0">
              <h4 class="h6 font-weight-semi-bold">Resources</h4>

              <!-- List Group -->
              <ul class="list-group list-group-flush list-group-borderless mb-0">
               
                    <li><a class="list-group-item list-group-item-action" target="_blank"
                      href="<?= site_url('login');?>">Login </a></li>

                    <li><a class="list-group-item list-group-item-action" target="_blank"
                      href="https://app.euchs.edu.gh/">Go to admission portal</a></li>
                      
                    <!-- End List Group -->
                  </div>

                  <!-- ALUMNI CONTENT IF ADDON IS AVAILABLE STARTS -->
                    <?php if (addon_status('alumni')): ?>
                      <div class="col-sm-3 col-lg-2 order-sm-3 mb-4 mb-sm-0">
                        <h4 class="h6 font-weight-semi-bold"><?= get_phrase('alumni'); ?></h4>
                        <!-- List Group -->
                        <ul class="list-group list-group-flush list-group-borderless mb-0">
                          <li><a class="list-group-item list-group-item-action" href="<?= site_url('home/alumni_event');?>"><?= get_phrase('alumni_events'); ?></a></li>
                          <li><a class="list-group-item list-group-item-action" href="<?= site_url('home/alumni_gallery');?>"><?= get_phrase('alumni_gallery'); ?></a></li>
                        </ul>
                        <!-- End List Group -->
                      </div>
                    <?php endif; ?>
                  <!-- ALUMNI CONTENT IF ADDON IS AVAILABLE STARTS -->

                  <div class="col-sm-6 col-lg-4 order-sm-1">
                    <div class="mb-1">
                      <select class="form-control" name="" onchange="activateSchool(this.value)">
                        <?php
                        $schools = $this->crud_model->get_schools()->result_array();
                        foreach ($schools as $school): ?>
                        <option value="<?= $school['id']; ?>" <?php if($active_school_id == $school['id']) echo 'selected'; ?>><?= $school['name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- Logo -->
                  <a class="d-inline-flex align-items-center mb-2" href="<?= base_url();?>">
                    <img src="<?= $logo_dark;?>" style="height:45px;" />
                  </a>
                  <!-- End Logo -->

                  <div class="mb-4">
                    <p class="small text-muted">© <?= get_frontend_settings('copyright_text'); ?></p>
                  </div>

                  <!-- Social Networks -->
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item mx-0">
                      <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                      href="<?= $links[0]->facebook;?>" target="_blank">
                      <span class="fab fa-facebook-f btn-icon__inner"></span>
                    </a>
                  </li>
                  <li class="list-inline-item mx-0">
                    <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                    href="<?= $links[0]->instagram;?>" target="_blank">
                    <span class="fab fa-instagram btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                  href="<?= $links[0]->twitter;?>" target="_blank">
                  <span class="fab fa-twitter btn-icon__inner"></span>
                </a>
              </li>
              <li class="list-inline-item mx-0">
                <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                href="<?= $links[0]->google;?>" target="_blank">
                <span class="fab fa-google btn-icon__inner"></span>
              </a>
            </li>
            <li class="list-inline-item mx-0">
              <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
              href="<?= $links[0]->youtube;?>" target="_blank">
              <span class="fab fa-youtube btn-icon__inner"></span>
            </a>
          </li>
          <li class="list-inline-item mx-0">
            <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
            href="<?= $links[0]->linkedin;?>" target="_blank">
            <span class="fab fa-linkedin btn-icon__inner"></span>
          </a>
        </li>
      </ul>
      <!-- End Social Networks -->
    </div>
  </div>
</div>
</footer>
<!-- ========== END FOOTER ========== -->

<!-- Go to Top -->
<a class="js-go-to u-go-to" href="#"
data-position='{"bottom": 15, "right": 15 }'
data-type="fixed"
data-offset-top="400"
data-compensation="#header"
data-show-effect="slideInUp"
data-hide-effect="slideOutDown">
<span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->


<script type="text/javascript">
function activateSchool(school_id) {
  $.ajax({
    url: "<?= site_url('home/active_school_id_for_frontend/'); ?>"+school_id,
    success: function(response){
      location.reload();
    }
  });
}
</script>
