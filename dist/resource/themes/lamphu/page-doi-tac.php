<?php global $mobile_browser; ?>
<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-partner">
  <section>
    <?php get_sidebar("banner"); ?>
  </section>
  <section>
    <div class="wrap-content">
      <ul class="partner-list">
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
$the_query = new WP_Query($arg); while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <li clas="partner-item"><?php the_post_thumbnail('featured_medium', array('class' => 'img-responsive')); ?></li>
        <?php endwhile;
    wp_reset_query(); ?>
      </ul>
    </div>
  </section>
</main>
<?php get_footer(); ?>