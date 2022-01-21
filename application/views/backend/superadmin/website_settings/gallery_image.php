<div class="gallery_photo_content">
  <?php
  $gallery_photos = $this->db->get_where('frontend_gallery_image', array('frontend_gallery_id' => $gallery_id))->result_array();
  $gallery_info = $this->db->get_where('frontend_gallery', array('frontend_gallery_id' => $gallery_id))->row_array();
  ?>
  <div class="row ">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
          <h4 class="page-title">
            <i class="mdi mdi-chart-timeline title_icon"></i> <?= $gallery_info['title']; ?>
            <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/website_settings/add_photo/'.$gallery_id); ?>', '<?= get_phrase('add_photo'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_photo'); ?></button>
          </h4>
        </div> <!-- end card body-->
      </div> <!-- end card -->
    </div><!-- end col-->
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <?php if (count($gallery_photos) > 0): ?>
            <div class="row">
              <?php foreach($gallery_photos as $gallery_photo):?>
                <div class="col-md-6 col-xl-3">
                  <div class="card d-block">
                    <img class="card-img-top" src="<?= $this->frontend_model->get_gallery_image($gallery_photo['image']); ?>" alt="project image cap">
                    <div class="card-img-overlay">
                      <div style="float: right;">
                        <button type="button" class="btn btn-icon btn-warning btn-sm"onclick="confirmModal('<?= route('frontend_gallery/gallery_photo_delete/'.$gallery_photo['frontend_gallery_image_id']); ?>', showAllGalleryPhotos)"> <i class="mdi mdi-delete"></i> </button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <?php include APPPATH.'views/backend/empty.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var showAllGalleryPhotos = function () {
   var url = '<?= route('frontend_gallery/gallery_photo_list/'.$gallery_id); ?>';

   $.ajax({
      type : 'GET',
      url: url,
      success : function(response) {
         $('.gallery_photo_content').html(response);
      }
   });
}
</script>
