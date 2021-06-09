<?php global $lienhe; ?>
<footer class="doc-footer">
  <div class="wrap-content">
    <div class="footer-contact">
      <div class="footer-company">
        <div class="footer-logo">
          <img src="<?php echo get_site_url(); ?>/assets/images/logo.png?31052021" alt="">
        </div>
        <div class='footer-info'>
          <span class='footer-name'><?php echo $lienhe["tencongty"]; ?></span>
          <ul class="footer-list">
            <li class="diachi"><?php echo $lienhe["diachigmap"]; ?></li>
            <li class="mobile">ĐT: <?php echo $lienhe["mobile"]; ?> - Hotline: <?php echo $lienhe["hotline"]; ?></li>
            <li class="email">Email: <?php echo $lienhe["mail"]; ?></li>
          </ul>
        </div>
      </div>
      <div class="footer-block">
        <div class="footer-menu">
          <span class='footer-name'>Lâm Phú</span>
          <ul class="footer-list">
            <li class="footer-item">
              <a href="<?php echo home_url(); ?>" class="footer-link"><?php echo __('Trang chủ', 'theme'); ?></a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('gioi-thieu')); ?>" class="footer-link">
                <?php echo __('Giới thiệu', 'theme'); ?>
              </a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('tai-lieu')); ?>" class="footer-link">Tài liệu</a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('tin-tuc')); ?>" class="footer-link">Tin tức</a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('doi-tac')); ?>" class="footer-link">Đối tác</a>
            </li>
            <li class="footer-item">
              <a href="<?php echo get_permalink(get_page_by_path('lien-he')); ?>"
                class="footer-link"><?php echo __('Liên hệ', 'theme'); ?></a>
            </li>
          </ul>
        </div>
        <div class="footer-social">
          <span class='footer-name'>Find Us</span>
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

  <div class="back-top"></div>
  <div class="modal fade bs-example-modal-sm" id="messageDialog" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel"><?php echo alertDialog(0); ?></div>

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
