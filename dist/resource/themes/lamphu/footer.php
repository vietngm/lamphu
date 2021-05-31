<?php global $lienhe; ?>
<footer class="doc-footer">
  <div>
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="logo-footer">
            <img src="<?php echo get_site_url(); ?>/assets/images/logo.png?31052021" alt="">
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
          <h3>Lâm Phú</h3>
          <ul class="footer-list">
            <li class="footer-item">
              <a href="<?php echo home_url(); ?>"><?php echo __('Trang chủ', 'theme'); ?></a>
            </li>
            <li class="footer-item">
              <a
                href="<?php echo get_permalink(get_page_by_path('gioi-thieu')); ?>"><?php echo __('Giới thiệu', 'theme'); ?></a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('tai-lieu')); ?>">Tài liệu</a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('tin-tuc')); ?>">Tin tức</a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('khach-hang')); ?>">Khách hàng</a>
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

<?php if (is_singular('san-pham')) { ?>
<script src="<?php echo get_site_url(); ?>/assets/js/lightgallery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#lightgallery').lightGallery();
});
</script>
<?php } ?>
<script type="text/javascript" src="<?php echo get_site_url(); ?>/assets/js/validator.min.js" defer></script>
<script src="<?php echo get_site_url(); ?>/assets/js/main.js?31052021"></script>
<?php wp_footer(); ?>
</body>

</html>
<?php ob_end_flush(); ?>
