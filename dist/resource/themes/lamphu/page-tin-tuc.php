<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-news">
  <section class='key'>
    <?php get_sidebar("banner"); ?>
  </section>
  <section class="news">
    <div class="wrap-content">
      <?php get_sidebar("top-news"); ?>
    </div>
  </section>
  <section class="relate">
    <div class="wrap-content">
      <h2 class="heading-sub">Các tin khác</h2>
      <ul class="relate-list">
        <?php
            $arg = array(
              'post_type' => 'tin-tuc',
              'orderby' => 'date',
              'order' => 'asc',
              'offset' => 2,
              'posts_per_page' => -1,
              'status' => array('publish', 'private'),
            );
            $the_query = new WP_Query($arg);
            while ($the_query->have_posts()): $the_query->the_post();
        ?>
        <li class="relate-item">
          <?php get_template_part('loop', 'tin-tuc'); ?>
        </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>
  </section>
</main>
<?php get_footer(); ?>