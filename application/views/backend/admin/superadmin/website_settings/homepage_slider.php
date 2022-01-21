<?php
$slider_images_json = get_frontend_settings('slider_images');
$slider_images = json_decode($slider_images_json);
?>
<div class="card">
  <div class="card-body">
    <h4 class="header-title"><?= get_phrase('homepage_slider_settings') ;?></h4>
    <form method="POST" class="col-12 homepageSliderSettings" action="<?= route('homepage_slider/update') ;?>" id = "homepage_slider_settings" enctype="multipart/form-data">
      <div class="row justify-content-left">
        <div class="col-12">
          <?php for ($i = 0; $i <3; $i++): ?>
            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="title_<?= $i; ?>"> <?= get_phrase('slider_title') ;?> <?= $i+1; ?></label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="title_<?= $i; ?>" name = "title_<?= $i; ?>" value="<?= $slider_images[$i]->title;?>" required>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="description_<?= $i; ?>"> <?= get_phrase('description') ;?> <?= $i+1; ?></label>
              <div class="col-md-9">
                <textarea name="description_<?= $i; ?>" id="description_<?= $i; ?>" class="form-control" rows="8" cols="80"><?= $slider_images[$i]->description;?></textarea>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="example-fileinput"><?= get_phrase('slider_image'); ?> <?= $i+1; ?></label>
              <div class="col-md-9 custom-file-upload">
                <div class="wrapper-image-preview" style="margin-left: -6px;">
                  <div class="box" style="width: 250px;">
                    <div class="js--image-preview" style="background-image: url(<?= $this->frontend_model->get_slider_image($slider_images[$i]->image); ?>); background-color: #F5F5F5;"></div>
                    <div class="upload-options">
                      <label for="slider_image_<?= $i; ?>" class="btn"> <i class="mdi mdi-camera"></i> <?= get_phrase('upload_slider'); ?> <?= $i+1; ?></label>
                      <input id="slider_image_<?= $i; ?>" style="visibility:hidden;" type="file" class="image-upload" name="slider_image_<?= $i; ?>" accept="image/*">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endfor; ?>
          <div class="text-center">
            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateHomepageSliderSettings()"><?= get_phrase('update_settings') ;?></button>
          </div>
        </div>
      </div>
    </form>

  </div> <!-- end card body-->
</div>

<script type="text/javascript">

</script>
