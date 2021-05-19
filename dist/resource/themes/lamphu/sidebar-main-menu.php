<?php $terms = wp_get_object_terms($post->ID, 'danh-muc-bai-viet');
global $mobile_browser; ?>
<nav class="navbar navbar-default">
  <div class="wrap-content">
    <div class="navbar-header">
      <a class="navbar-logo" href="<?php echo home_url(); ?>">
        <img src="<?php echo get_site_url(); ?>/assets/images/logo.png?15012019" align="May cat day">
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
              <?php echo get_the_title(3); ?>
            </a>
          </li>
          <li class="main-item">
            <a href="#" class="main-link js-main-link">
              <?php if ($mobile_browser > 0) { ?>
              <span class="arrow left"></span>
              <?php } ?>
              <?php echo get_the_title(32); ?>
              <span class="plus"></span>
            </a>
            <ul class="sub-list">
              <?php
                $taxonomy = 'danh-muc';
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
            <a href="<?php echo get_permalink(get_page_by_path('tai-lieu')); ?>" class="main-link">
              <?php if ($mobile_browser > 0) { ?>
              <span class="arrow left"></span>
              <?php } ?>
              <?php echo __('Tài liệu', 'theme'); ?>
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
