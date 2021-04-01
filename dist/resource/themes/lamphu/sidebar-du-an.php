<?php global $lienhe; ?>
<div class="wrap-content">
  <div class="row gutter-10 gutter-md-30-md">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
      <h3 class="heading"><?php echo get_the_title(180); ?></h3>
    </div>
  </div>
</div>
<div class="work">
  <div class="wrap-content">
    <div class="row gutter-10 gutter-md-30-md">
      <p class="work-desc">Những công trình tiêu biểu sử dụng sản phẩm gạch của American Home Việt Nam<br>(Giai đoạn 2012 đến nay)</p>
        <?php
        $arg = array(
            'post_type' => 'du-an',
            'orderby' => 'date',
            'order' => 'desc',
            'posts_per_page' => 3,
            'status' => array('publish', 'private')
        );
        $the_query = new WP_Query($arg);
        while ($the_query->have_posts()) : $the_query->the_post();
            ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" align="center">
            <a href="<?php echo get_permalink($post->ID); ?>" class="work-item">
              <div class="work-image">
                  <?php if (has_post_thumbnail()) { ?>
                      <?php the_post_thumbnail('featured_medium', array('class' => 'img-responsive')); ?>
                  <?php } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/images/noimg64.png" alt="<?php echo $post->post_title; ?>">
                  <?php } ?>
              </div>
              <h3 class="work-title" data-mh="title" data-mh-min="768"><?php the_title(); ?></h3>
            </a>
          </div>
        <?php endwhile;
        wp_reset_query(); ?>
    </div>
  </div>
</div>