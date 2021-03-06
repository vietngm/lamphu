<div class="owl-partner owl-carousel owl-theme">
  <?php
    $arg = array(
      'post_type' => 'doi-tac',
      'orderby' => 'date',
      'order' => 'asc',
      'posts_per_page' => -1,
      'taxonomy' => $tax,
      'term' => $terms->slug,
      'status' => array('publish', 'private')
    );
    $the_query = new WP_Query($arg);
    while ($the_query->have_posts()) : $the_query->the_post();
    $url = get_post_meta($post->ID,'web-url',true);
  ?>
  <div clas="owl-partner-item">
    <a href="<?php echo $url;?>" target="_blank" class="owl-partner-link">
      <?php the_post_thumbnail('featured_medium', array('class' => 'img-responsive')); ?>
    </a>
  </div>
  <?php endwhile;wp_reset_query(); ?>
</div>
