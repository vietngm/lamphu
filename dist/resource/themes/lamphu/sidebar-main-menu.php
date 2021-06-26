<?php $terms = wp_get_object_terms($post->ID, 'danh-muc');
global $mobile_browser; ?>
<nav class="navbar">
  <div class="wrap-content">
    <div class="navbar-header">
      <a class="navbar-logo" href="<?php echo home_url(); ?>">
        <img src="<?php echo get_site_url(); ?>/assets/images/logo.png?26062021" alt="May cat day">
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
          <li class="main-item home">
            <a href="<?php echo home_url();?>" class="main-link">
              <?php echo __('Trang chủ', 'theme'); ?></a>
          </li>
          <?php if ($mobile_browser == 0) { ?>
          <li class="main-dev"><span></span></li>
          <?php } ?>
          <li class="main-item <?php echo get_post(3)->post_name?>">
            <a href="<?php echo get_permalink(get_page_by_path('gioi-thieu')); ?>" class="main-link">
              <?php echo get_the_title(3); ?>
            </a>
          </li>
          <?php if ($mobile_browser == 0) { ?>
          <li class="main-dev"><span></span></li>
          <?php } ?>
          <li class="main-item <?php echo get_post(32)->post_name?>">
            <a href="#" class="main-link js-main-link">
              <?php echo get_the_title(32); ?>
              <?php if ($mobile_browser > 0) { ?>
              <span class="arrow arrow-plus"></span>
              <?php } ?>
            </a>
            <div class="sub-wrap">
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
            </div>
          </li>
          <?php if ($mobile_browser == 0) { ?>
          <li class="main-dev"><span></span></li>
          <?php } ?>
          <li class="main-item <?php echo get_post(2163)->post_name?>"><a
              href="<?php echo get_permalink(get_page_by_path('doi-tac')); ?>"
              class="main-link"><?php echo get_the_title(2163); ?></a></li>
          <?php if ($mobile_browser == 0) { ?>
          <li class="main-dev"><span></span></li>
          <?php } ?>
          <li class="main-item <?php echo get_post(33)->post_name?>">
            <a href="<?php echo get_permalink(get_page_by_path('tin-tuc')); ?>" class="main-link">
              <?php echo get_the_title(33); ?>
            </a>
          </li>
          <?php if ($mobile_browser == 0) { ?>
          <li class="main-dev"><span></span></li>
          <?php } ?>
          <li class="main-item <?php echo get_post(848)->post_name?>">
            <a href="<?php echo get_permalink(get_page_by_path('tai-lieu')); ?>" class="main-link">
              <?php echo get_the_title(848); ?>
            </a>
          </li>
          <?php if ($mobile_browser == 0) { ?>
          <li class="main-dev"><span></span></li>
          <?php } ?>
          <li class="main-item <?php echo get_post(2)->post_name?>">
            <a href="<?php echo get_permalink(get_page_by_path('lien-he')); ?>" class="main-link">
              <?php echo get_the_title(2); ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
