<?php global $mobile_browser; ?>
<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-document">
  <section class='key'>
    <?php get_sidebar("banner"); ?>
  </section>
  <section class='doc'>
    <h2 class="heading-detail"><?php the_title(); ?></h2>
    <div class="wrap-content">
      <ul class="doc-list">
        <?php
$arg = array(
    'post_type' => 'tai-lieu',
    'orderby' => 'date',
    'order' => 'asc',
    'posts_per_page' => -1,
    'taxonomy' => $tax,
    'term' => $terms->slug,
    'status' => array('publish', 'private')
);
$the_query = new WP_Query($arg); while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <li clas="doc-item">
          <a class="doc-link">
            <div class='doc-icon'><i class="far fa-file-pdf"></i>
            </div>
            <span><?php the_title(); ?></span>
          </a>
        </li>
        <?php endwhile;
    wp_reset_query(); ?>
      </ul>
    </div>
  </section>
</main>
<?php get_footer(); ?>