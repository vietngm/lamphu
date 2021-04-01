<?php $terms = wp_get_object_terms($post->ID, 'danh-muc-bai-viet');
global $mobile_browser; ?>
<nav class="navbar navbar-default">
  <div class="wrap-content">
    <div class="navbar-header">
      <a class="navbar-logo" href="<?php echo home_url(); ?>">
        <img src="/common/images/bichngoan-logo.png?15012019" align="bich ngoan ceramic">
      </a>
      <div class="wrap-hamburger">
        <div class="hamburger">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </div>
    </div>
    <div class="navbar-wrap" id="navbar-wrap">
      <div class="main-menu">
        <ul class="main-list">
          <li class="main-item">
            <a href="<?php echo get_permalink(get_page_by_path('gioi-thieu')); ?>" class="main-link">
                <?php if ($mobile_browser > 0) { ?>
                  <span class="arrow left"></span>
                <?php } ?>
                <?php echo get_the_title(2); ?>
            </a>
          </li>
          <li class="main-item">
            <a href="#" class="main-link js-main-link">
                <?php if ($mobile_browser > 0) { ?>
                  <span class="arrow left"></span>
                <?php } ?>
                <?php echo get_the_title(3); ?>
              <span class="plus"></span>
            </a>
            <ul class="sub-list">
                <?php
                $taxonomy = 'cat-san-pham';
                $terms = get_terms($taxonomy, array(
                    'hide_empty' => 0,
                    'parent' => 0,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ));
                include('nav-sub-main.php');
                ?>
            </ul>
          </li>

          <li class="main-item">
            <a href="<?php echo get_permalink(get_page_by_path('tin-tuc')); ?>" class="main-link">
                <?php if ($mobile_browser > 0) { ?>
                  <span class="arrow left"></span>
                <?php } ?>
                <?php echo __('Tin tức', 'theme'); ?>
            </a>
          </li>
          <li class="main-item">
            <a href="<?php echo get_permalink(get_page_by_path('xu-huong')); ?>" class="main-link">
                <?php if ($mobile_browser > 0) { ?>
                  <span class="arrow left"></span>
                <?php } ?>
                <?php echo __('Xu hướng', 'theme'); ?>
            </a>
          </li>
          <li class="main-item">
            <a href="<?php echo get_permalink(get_page_by_path('hinh-anh')); ?>" class="main-link">
                <?php if ($mobile_browser > 0) { ?>
                  <span class="arrow left"></span>
                <?php } ?>
                <?php echo __('Hình ảnh', 'theme'); ?>
            </a>
          </li>
          <li class="main-item">
            <a href="<?php echo get_permalink(get_page_by_path('du-an')); ?>" class="main-link">
                <?php if ($mobile_browser > 0) { ?>
                  <span class="arrow left"></span>
                <?php } ?>
                <?php echo __('Dự án', 'theme'); ?>
            </a>
          </li>
          <li class="main-item">
            <a href="<?php echo get_permalink(get_page_by_path('cach-su-dung')); ?>" class="main-link">
                <?php if ($mobile_browser > 0) { ?>
                  <span class="arrow left"></span>
                <?php } ?>
                <?php echo __('Cách sử dụng', 'theme'); ?>
            </a>
          </li>
          <li class="main-item">
            <a href="<?php echo get_permalink(get_page_by_path('lien-he')); ?>" class="main-link">
                <?php if ($mobile_browser > 0) { ?>
                  <span class="arrow left"></span>
                <?php } ?>
                <?php echo __('Liên hệ', 'theme'); ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
