<?php global $mobile_browser;?>
<nav class="wrap-nav">
  <?php if($mobile_browser > 0){?>
  <div class="nav-header">
    <a class="nav-logo" href="<?php echo home_url(); ?>">
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
  <?php } ?>
  <div class="nav-collapse">
    <?php
		if($mobile_browser==0){ ?>
    <div class="nav-cate">
      <div class="nav-cate-label">
        <i class="fas fa-bars"></i>Danh mục sản phẩm
      </div>
      <?php include "content/nav-categories.php"; ?>
    </div>
    <?php }?>
    <ul class="nav-list">
      <li class="nav-item home">
        <a href="<?php echo home_url();?>" class="nav-link">
          <?php echo __('Trang chủ', 'theme'); ?></a>
      </li>
      <li class="nav-item <?php echo get_post(3)->post_name?>">
        <a href="<?php echo get_permalink(get_page_by_path('gioi-thieu')); ?>" class="nav-link">
          <?php echo get_the_title(3); ?>
        </a>
      </li>
      <?php if ($mobile_browser > 0) { ?>
      <li class="nav-item <?php echo get_post(32)->post_name?>">
        <a href="#" class="nav-link js-nav-link">
          <span><?php echo get_the_title(32); ?></span>
          <span class="arrow arrow-plus"></span>
        </a>
        <div class="sub-wrap">
          <ul class="sub-list">
            <?php
						$taxonomy = 'danh-muc';
						$terms = get_terms(
							$taxonomy, array(
								'hide_empty' => 0,
								'parent' => 0,
								'orderby' => 'menu_order',
								'order' => 'ASC',
							)
						);
						include('nav-sub-main.php');
						?>
          </ul>
        </div>
      </li>
      <?php } ?>
      <li class="nav-item <?php echo get_post(2163)->post_name?>"><a
          href="<?php echo get_permalink(get_page_by_path('doi-tac')); ?>" class="nav-link">
          <?php echo get_the_title(2163); ?>
        </a>
      </li>
      <li class="nav-item <?php echo get_post(33)->post_name?>">
        <a href="<?php echo get_permalink(get_page_by_path('tin-tuc')); ?>" class="nav-link">
          <?php echo get_the_title(33); ?>
        </a>
      </li>
      <li class="nav-item <?php echo get_post(848)->post_name?>">
        <a href="<?php echo get_permalink(get_page_by_path('tai-lieu')); ?>" class="nav-link">
          <?php echo get_the_title(848); ?>
        </a>
      </li>
      <li class="nav-item <?php echo get_post(2)->post_name?>">
        <a href="<?php echo get_permalink(get_page_by_path('lien-he')); ?>" class="nav-link">
          <?php echo get_the_title(2); ?>
        </a>
      </li>
    </ul>
  </div>
</nav>
