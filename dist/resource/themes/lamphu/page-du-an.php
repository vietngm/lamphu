<?php get_header(); ?>
<?php get_sidebar('head'); ?>
  <main class="is-gallery">
    <div align="center">
        <?php get_sidebar("banner"); ?>
    </div>
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
            <?php get_sidebar('left-menu'); ?>
            <?php get_sidebar('support'); ?>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <div class="row gutter-10 gutter-md-30-md">
              <?php
              $query = array(
                  'post_type' => 'du-an',
                  'posts_per_page' => -1,
                  'orderby' => 'post_date',
                  'order' => 'asc'
              );
              $the_query = null;
              $the_query = new WP_Query($query);
              while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <a href="<?php echo get_permalink($post->ID) ?>" class="thumb" data-mh="thumb" data-mh-min="768">
                    <div class="view">
                        <?php echo get_the_post_thumbnail($post->ID, 'featured_full', array('class' => 'img-responsive')); ?>
                    </div>
                    <span class="title"><?php the_title() ?></span>
                  </a>
                </div>
              <?php endwhile;
              wp_reset_query(); ?>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php get_footer(); ?>