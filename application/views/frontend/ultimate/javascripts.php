  <!-- JS Global Compulsory -->
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/bootstrap/bootstrap.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/hs-megamenu/src/hs.megamenu.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/svg-injector/dist/svg-injector.min.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/fancybox/jquery.fancybox.min.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/slick-carousel/slick/slick.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>


  <!-- JS Front -->
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/hs.core.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.header.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.unfold.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.fancybox.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.slick-carousel.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.validation.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.focus-state.js"></script>

  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.g-map.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.cubeportfolio.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.svg-injector.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/components/hs.go-to.js"></script>
  <script src="<?= base_url();?>assets/frontend/<?= $theme;?>/js/custom.js"></script>


  <!-- JS Plugins Init. -->
  <script>
    $(window).on('load', function () {
      // initialization of HSMegaMenu component
      $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 767.98,
        hideTimeOut: 0
      });

      // initialization of svg injector module
      $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
    });

    $(document).on('ready', function () {
      // initialization of header
      $.HSCore.components.HSHeader.init($('#header'));

      // initialization of unfold component
      $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

      // initialization of fancybox
      $.HSCore.components.HSFancyBox.init('.js-fancybox');

      // initialization of slick carousel
      $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

      // initialization of form validation
      $.HSCore.components.HSValidation.init('.js-validate');

      // initialization of forms
      $.HSCore.components.HSFocusState.init();

      // initialization of cubeportfolio
      $.HSCore.components.HSCubeportfolio.init('.cbp');

      // initialization of go to
      $.HSCore.components.HSGoTo.init('.js-go-to');
    });
  </script>
