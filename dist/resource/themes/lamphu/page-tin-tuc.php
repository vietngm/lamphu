<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-news">
  <div align="center">
    <?php get_sidebar("banner"); ?>
  </div>
  <section class="news">
    <?php get_sidebar("top-tin-tuc"); ?>
  </section>
  <section class="news-relate">
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <h2 class="heading-sub">Các Tin Tức Khác</h2>
        </div>
      </div>
      <div class="row gutter-10 gutter-md-30-md">
        <?php
            $arg = array(
                'post_type' => 'tin-tuc',
                'orderby' => 'date',
                'order' => 'asc',
                'offset' => 2,
                'posts_per_page' => -1,
                'status' => array('publish', 'private'),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'tin-tuc',
                    ),
                )
            );
            $the_query = new WP_Query($arg);
            while ($the_query->have_posts()): $the_query->the_post();
                ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" align="center">
          <?php get_template_part('loop', 'tin-tuc'); ?>
        </div>
        <?php
            endwhile;
            wp_reset_query(); ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
