<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-news">
  <div class="key-visual key-visual-news">
    <span>LÂM PHÚ | NEWS</span>
  </div>
  <article>
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <div class="article-title">
            <h2><?php the_title(); ?></h2>
          </div>
          <?php
              while (have_posts()): the_post();
                  ?>
          <div class="news-body">
            <?php the_content(); ?>
            <div class="btn-like">
              <?php include 'content-like.php'; ?>
            </div>
          </div>
          <?php endwhile; ?>
          <h3 class="heading-sub">Các tin tức khác</h3>
          <div class="row gutter-10 gutter-md-30-md">
            <?php
                $arg = array(
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order' => 'asc',
                    'offset' => 2,
                    'posts_per_page' => -1,
                    'status' => array('publish', 'private'),
                );
                $the_query = new WP_Query($arg);
                while ($the_query->have_posts()): $the_query->the_post();
                    ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <?php get_template_part('loop', 'tin-tuc'); ?>
            </div>
            <?php
                endwhile;
                wp_reset_query();
                ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <?php get_sidebar("left-menu"); ?>
          <?php get_sidebar('support'); ?>
        </div>
      </div>
    </div>
  </article>
</main>
<?php get_footer(); ?>