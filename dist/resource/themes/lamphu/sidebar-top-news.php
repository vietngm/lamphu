<h2 class="heading"><span>Lam Phu News</span></h2>
<div class="news-top">
  <?php
      $arg = array(
        'post_type' => 'tin-tuc',
        'orderby' => 'date',
        'order' => 'asc',
        'posts_per_page' => 3,
        'status' => array('publish', 'private'),
      );
      $the_query = new WP_Query($arg);
      while ($the_query->have_posts()): $the_query->the_post();
  ?>
  <div class="news-item">
    <a href="<?php echo get_permalink($post->ID); ?>" class="news-link">
      <?php if (has_post_thumbnail()) { ?>
      <div class='news-thumb'>
        <?php the_post_thumbnail('featured_news', array('class' => 'img-responsive')); ?>
      </div>
      <?php } else { ?>
      <div class='news-noimage'>
        <img src="/assets/images/noimg64.png" width="64" height="64" alt="<?php echo $post->post_title; ?>">
      </div>
      <?php } ?>
    </a>
    <div class="news-caption">
      <a href="<?php echo get_permalink($post->ID); ?>" class="news-title"><?php the_title(); ?></a>
      <p class="news-excerpt">
        <?php echo getExcerptLimit(160, $post->ID); ?>
      </p>
    </div>
  </div>
  <?php endwhile;wp_reset_query(); ?>
</div>