<?php
  $gallery_info = $this->frontend_model->get_gallery_info_by_id($gallery_id);
  foreach ($gallery_info as $row) {
    $this->db->where('frontend_gallery_id', $row['frontend_gallery_id']);
    $this->db->order_by('frontend_gallery_image_id', 'DESC');
    $query = $this->db->get('frontend_gallery_image');
    $images = $query->result_array();
?>
<!-- ========== MAIN ========== -->
<main id="content" role="main">
  <!-- Hero Section -->
  <div class="gradient-half-primary-v1">
    <div class="container text-center space-top-4 space-top-md-4 space-top-lg-3 space-bottom-1">
      <!-- Title -->
      <div class="w-md-80 w-lg-50 mx-auto mb-5">
        <h1 class="h1 text-white">
          <span class="font-weight-semi-bold">Gallery</span>
        </h1>
      </div>
      <!-- End Title -->
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- Gallery section starts -->
  <div class="container space-2 space-md-2">

      <!-- Title -->
      <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
       
        <h2 class="text-primary">
          <?= $row['title']; ?>
        </h2>
      </div>
      <p class="font-size-1"><?= $row['description']; ?></p>

      <!-- End Title -->




    <!-- Cubeportfolio Section -->
    <div class= u-cubeportfolio">
      <!-- Filter -->

      <!-- End Filter -->

      <!-- Content -->
      <div class="cbp mb-7"
            data-controls="#cubeFilter"
            data-animation="quicksand"
            data-x-gap="16"
            data-y-gap="16"
            data-load-more-selector="#cubeLoadMore"
            data-load-more-action="auto"
            data-load-items-amount="2"
            data-media-queries='[
              {"width": 1500, "cols": 4},
          {"width": 1100, "cols": 4},
          {"width": 800, "cols": 3},
          {"width": 480, "cols": 2},
          {"width": 300, "cols": 1}
            ]'>

        <?php foreach ($images as $image) { ?>
        <!-- Item -->
        <div class="cbp-item rounded abstract">
          <div class="cbp-caption">
            <a class="cbp-lightbox u-media-viewer"
              href="<?= base_url(); ?>uploads/images/gallery_images/<?= $image['image'];?>"
              data-title="<?= $row['title']; ?>">
              <img src="<?= base_url(); ?>uploads/images/gallery_images/<?= $image['image'];?>"
              alt="<?= $row['title']; ?>">
              <span class="u-media-viewer__container">
                <span class="u-media-viewer__icon">
                  <span class="fas fa-plus u-media-viewer__icon-inner"></span>
                </span>
              </span>
            </a>
          </div>
        </div>
        <!-- End Item -->
        <?php } ?>

      </div>
      <!-- End Content -->
  </div>
  <!-- Gallery section ends -->
</main>
  <!-- ========== END MAIN ========== -->

  <?php } ?>
