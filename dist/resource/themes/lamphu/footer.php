<?php global $lienhe; ?>
<?php get_sidebar('hinh-anh'); ?>
<footer class="doc-footer">
  <div>
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="logo-footer">
            <img src="<?php echo get_site_url(); ?>/assets/images/logo.png?15012019" alt="">
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <h3><?php echo $lienhe["tencongty"]; ?></h3>
          <ul class="footer-list">
            <li class="diachi"><?php echo $lienhe["diachigmap"]; ?></li>
            <li class="mobile">ĐT: <?php echo $lienhe["mobile"]; ?> - Hotline: <?php echo $lienhe["hotline"]; ?></li>
            <li class="email">Email: <?php echo $lienhe["mail"]; ?></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
          <h3>Bich Ngoan</h3>
          <ul class="footer-list">
            <li class="footer-item">
              <a href="<?php echo home_url(); ?>"><?php echo __('Trang chủ', 'theme'); ?></a>
            </li>
            <li class="footer-item">
              <a
                href="<?php echo get_permalink(get_page_by_path('gioi-thieu')); ?>"><?php echo __('Giới thiệu', 'theme'); ?></a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('tin-tuc')); ?>">Tin tức</a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('xu-huong')); ?>">Xu hướng</a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('hinh-anh')); ?>">Hình ảnh</a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('du-an')); ?>">Dự án</a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('cach-su-dung')); ?>">Cách sử dụng</a>
            </li>
            <li class="footer-item">
              <a
                href="<?php echo get_permalink(get_page_by_path('lien-he')); ?>"><?php echo __('Liên hệ', 'theme'); ?></a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
          <h3>Find Us</h3>
          <div class="socials">
            <a class="socials-footer" href="<?php echo $lienhe['facebook']; ?>" target="_blank">
              <i class="fab fa-facebook-f"></i></a>
            <a class="socials-footer" href="<?php echo $lienhe['twitter']; ?>" target="_blank">
              <i class="fab fa-twitter"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="back-top"></div>
  <div class="modal fade bs-example-modal-sm" id="messageDialog" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel"><?php echo alertDialog(0); ?></div>
  <?php include("search-tool.php"); ?>
</footer>
<script src="/common/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
jQuery(function($) {
  $(".regular").slick({
    dots: false,
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrow: false,
    autoplay: true,
    responsive: [{
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });
});
</script>

<?php if (is_singular('hinh-anh') || is_singular('san-pham') || is_singular('du-an')) { ?>
<script src="/common/js/modernizr.min.js"></script>
<script src="/common/js/lightgallery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#lightgallery').lightGallery();
});
</script>

<?php } ?>

<script type="text/javascript" src="/common/js/validator.min.js" defer></script>
<!-- <script src="/common/js/jquery.matchHeight.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/common/js/common.js" defer></script> -->
<script src="<?php echo get_site_url(); ?>/assets/js/main.js?04112020"></script>
<?php wp_footer(); ?>
</body>

</html>
<?php ob_end_flush(); ?>
