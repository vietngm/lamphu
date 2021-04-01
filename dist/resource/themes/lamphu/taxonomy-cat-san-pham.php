<?php
$tax = 'cat-san-pham';
$slug = get_query_var($tax);
$term = get_term_by('slug', $slug, $tax);
$name = $term->name;
get_header();
get_sidebar('head');
?>
  <main>
    <div align="center">
        <?php get_sidebar("banner"); ?>
    </div>
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-3 col-md-3 col-sm-3 pc-view">
            <?php get_sidebar('left-menu'); ?>
            <?php get_sidebar('support'); ?>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <h3 class="heading-detail"><?php echo $name; ?></h3>
          <div class="row gutter-10 gutter-md-30-md">
              <?php
              $col = 7;
              $query = array(
                  'post_type' => 'san-pham',
                  'posts_per_page' => -1,
                  'orderby' => 'post_date',
                  'taxonomy' => $tax,
                  'term' => $slug,
                  'order' => 'asc'
              );
              $the_query = null;
              $the_query = new WP_Query($query);
              while ($the_query->have_posts()):$the_query->the_post();
                  $price = get_post_meta($post->ID, 'gia-sp', true);
                  include('loop-san-pham.php'); endwhile; ?>
          </div>
            <?php get_template_part("templates/nav", "main");
            wp_reset_query(); ?>
        </div>
        <div class="sp-view col-xs-12">
            <?php include("sidebar-left-menu.php"); ?>
            <?php include('sidebar-support.php'); ?>
        </div>
      </div>
    </div>
  </main>
<?php get_footer(); ?>