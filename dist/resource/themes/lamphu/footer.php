<?php global $lienhe, $mobile_browser; ?>
<footer class="doc-footer">
  <div class="wrap-content">
    <div class="footer-contact">
      <div class="footer-company">
        <div class="footer-logo">
          <img src="<?php echo get_site_url(); ?>/assets/images/logo.png?26062021" alt="May cat day edm">
        </div>
        <div class='footer-info'>
          <span class='footer-name'><?php echo $lienhe["tencongty"]; ?></span>
          <ul class="footer-list">
            <li class="diachi"><?php echo $lienhe["diachigmap"]; ?></li>
            <li class="mobile">Hotline: <?php echo $lienhe["hotline"]; ?></li>
            <li class="email">Email: <?php echo $lienhe["mail"]; ?></li>
          </ul>
          <?php if ($mobile_browser > 0) {include "content/footer.php";}?>
        </div>
      </div>
      <?php if ($mobile_browser == 0) {include "content/footer.php";}?>
    </div>
  </div>

  <div class="back-top"></div>
  <div class="modal fade" id="messageDialog" tabindex="-1">
    <?php echo alertDialog(0); ?>
  </div>

</footer>
<script src="<?php echo get_site_url(); ?>/assets/js/main.js?31052021"></script>
<?php if ($mobile_browser == 0) { ?>
<div class='overlay'></div>
<?php } ?>
<?php wp_footer(); ?>
</body>

</html>
<?php ob_end_flush(); ?>
