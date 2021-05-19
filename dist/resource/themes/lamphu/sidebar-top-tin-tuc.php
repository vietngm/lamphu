<div class="wrap-content">
  <div class="row gutter-10 gutter-md-30-md">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
      <h2 class="heading"><span>Recent News</span></h2>
    </div>
    <?php
      $arg = array(
          'post_type' => 'tin-tuc',
          'orderby' => 'date',
          'order' => 'asc',
          'posts_per_page' => 2,
          'status' => array('publish', 'private'),
      );
      $the_query = new WP_Query($arg);
      while ($the_query->have_posts()): $the_query->the_post();
          ?>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">

      <div class="thumb">
        <a href="<?php echo get_permalink($post->ID); ?>" class="link">
          <?php if (has_post_thumbnail()) { ?>
          <?php the_post_thumbnail('featured_news', array('class' => 'img-responsive')); ?>
          <?php } else { ?>
          <img src="<?php bloginfo('template_directory'); ?>/images/noimg64.png" width="64" height="64"
            alt="<?php echo $post->post_title; ?>">
          <?php } ?>
        </a>
      </div>
      <div class="caption">
        <h4 class="title">
          <a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>
        </h4>
        <p class="excerpt">
          <?php echo getExcerptLimit(160, $post->ID); ?>
        </p>
      </div>

    </div>
    <?php endwhile;
      wp_reset_query(); ?>
  </div>
</div>
