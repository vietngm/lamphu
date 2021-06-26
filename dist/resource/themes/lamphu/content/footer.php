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