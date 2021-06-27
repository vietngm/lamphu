<?php  get_header(); ?>
<?php  get_sidebar('head'); ?>
<main>
  <div class="wrap-content">
    <div class="row gutter-10 gutter-md-30-md">
      <div class="col-md-12">
        <?php echo __('KẾT QUẢ TÌM KIẾM','theme'); ?>
      </div>
      <?php
            $col=7;
            $query=array(
                'post_type'=>'san-pham',
                'posts_per_page'=>36,
                'orderby'=> 'post_date',
                'order' => 'asc',
                'paged' => ( get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1 ),
                'status' => array('publish','private'),
                's' => get_query_var('s')
                );
                $the_query=null;
                $the_query = new WP_Query($query);
                while ( $the_query->have_posts() ):$the_query->the_post();
            ?>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <a href="<?php echo get_permalink($post->ID)?>">
          <?php the_post_thumbnail('featured_medium',array('class'=>'img-responsive')); ?>
          <span class="cat-title"><?php the_title(); ?></span>
        </a>
      </div>
      <?php
            endwhile;
            ?>
      <div class="col-md-12">
        <?php get_template_part("templates/nav","main");wp_reset_query();?>
      </div>
    </div>
  </div>
</main>
<?php get_footer();?>
