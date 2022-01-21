<div class="frontend_gallery_content">
  <div class="row" style="float: right;">
    <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/website_settings/create_gallery'); ?>', '<?= get_phrase('create_gallery'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('create_gallery'); ?></button>
  </div>
  <br><br>
  <?php $frontend_gallery = $this->db->get_where('frontend_gallery', array('school_id' => school_id()))->result_array(); ?>
  <?php if (count($frontend_gallery) > 0): ?>
    <div class="row">
      <?php foreach($frontend_gallery as $gallery):?>
        <div class="col-md-6 col-xl-3">
          <!-- project card -->
          <div class="card d-block">
            <div class="card-body" style="height: 202px;">
              <div class="dropdown card-widgets">
                <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                  <i class="dripicons-dots-3"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/website_settings/edit_gallery/'.$gallery['frontend_gallery_id']); ?>', '<?= get_phrase('update_gallery'); ?>');"><i class="mdi mdi-pencil mr-1"></i><?= get_phrase('edit'); ?></a>
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('frontend_gallery/delete/'.$gallery['frontend_gallery_id']); ?>', showAllGallery)"><i class="mdi mdi-delete mr-1"></i><?= get_phrase('delete'); ?></a>
                </div>
              </div>
              <!-- project title-->
              <h4 class="mt-0">
                <a href="<?= route('website_settings/gallery_image/'.$gallery['frontend_gallery_id']); ?>" class="text-title"><?= $gallery['title']; ?></a>
              </h4>
              <?php if ($gallery['show_on_website']): ?>
                  <div class="badge badge-success mb-3"><?= get_phrase('visible'); ?></div>
              <?php else: ?>
                  <div class="badge badge-danger mb-3"><?= get_phrase('not_visible'); ?></div>
              <?php endif; ?>


              <p class="text-muted font-13 mb-3">
                <?= ellipsis($gallery['description'], 150); ?>
              </p>
            </div> <!-- end card-body-->
            <ul class="list-group list-group-flush">
              <li class="list-group-item p-3">
                <div>
                  <?php $photos = $this->frontend_model->get_photos_by_gallery_id($gallery['frontend_gallery_id']); ?>
                  <?php if (count($photos) > 0): ?>
                    <?php foreach ($photos as $key => $photo): ?>
                      <?php if ($key <= 2): ?>
                        <a href="<?= route('website_settings/gallery_image/'.$gallery['frontend_gallery_id']); ?>" class="d-inline-block">
                          <img src="<?= $this->frontend_model->get_gallery_image($photo['image']); ?>" class="rounded-circle avatar-xs" alt="friend">
                        </a>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (count($photos) > 3): ?>
                      <a href="<?= route('website_settings/gallery_image/'.$gallery['frontend_gallery_id']); ?>" class="d-inline-block text-muted font-weight-bold ml-2">
                        +<?= (count($photos)-3).' '.get_phrase('more');  ?>
                      </a>
                    <?php endif; ?>
                  <?php else: ?>
                    <span><?= get_phrase('no_photos_found'); ?></span>
                  <?php endif; ?>
                </div>
              </li>
            </ul>
          </div> <!-- end card-->
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


<script type="text/javascript">
var showAllGallery = function () {
   var url = '<?= route('frontend_gallery/gallery_list'); ?>';

   $.ajax({
      type : 'GET',
      url: url,
      success : function(response) {
         $('.frontend_gallery_content').html(response);
      }
   });
}
</script>
