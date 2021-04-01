<?php
$arg = array(
    'post_type' => 'san-pham',
    'orderby' => 'date',
    'order' => 'asc',
    'posts_per_page' => -1,
    'taxonomy' => $tax,
    'term' => $terms->slug,
    'status' => array('publish', 'private')
);
$the_query = new WP_Query($arg); ?>
<ul class="related">
    <?php
    while ($the_query->have_posts()) : $the_query->the_post();
        $price = get_post_meta($post->ID, 'gia-sp', true);
        ?>
      <li class="related-item">
        <a href="<?php echo get_permalink($post->ID); ?>" class="related-link">
          <div class="related-view scale" align="center" data-mh="view" data-mh-min="768">
              <?php if (has_post_thumbnail()) { ?>
                  <?php the_post_thumbnail('featured_medium', array('class' => 'img-responsive')); ?>
              <?php } else { ?>
                <img src="/common/images/noimg64.png" width="64" height="64" alt="<?php echo $post->post_title; ?>">
              <?php } ?>
          </div>
          <div class="related-caption" data-mh="caption" data-mh-min="768">
            <h4 class="related-title">
                <?php the_title(); ?>
            </h4>
            <div class="related-price">
                <?php echo __('Giá', 'theme'); ?>: <?php echo(($price) ? number_format($price) . ' VND' : __("Liên hệ", 'theme')); ?>
            </div>
          </div>
        </a>
      </li>
    <?php endwhile;
    wp_reset_query(); ?>
</ul>