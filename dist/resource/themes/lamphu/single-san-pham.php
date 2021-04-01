<?php
global $lienhe;
$tax = 'cat-san-pham';
$terms = wp_get_post_terms($post->ID, $tax, array("fields" => "all"));
$terms = get_term_top_most_parent($terms[0]->term_id, $tax);
?>
<?php get_header(); ?>
<?php get_sidebar('head'); ?>
  <main class="is-product">
    <div align="center">
        <?php get_sidebar("banner"); ?>
    </div>
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-3 col-md-3 col-sm-3 pc-view">
            <?php get_sidebar("left-menu"); ?>
            <?php get_sidebar('support'); ?>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <article class="detail-body">
            <div class="row gutter-10 gutter-md-30-md">
                <?php
                while (have_posts()) : the_post();
                    $image_full = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
                    <div class="pro-thumb" id="lightgallery">
                      <div data-responsive="<?php echo $image_full; ?> 375, <?php echo $image_full; ?> 480, i<?php echo $image_full; ?> 800"
                           data-src="<?php echo $image_full; ?>">
                        <img src="<?php echo $image_full; ?>" class="img-responsive">
                        <div class="overlay"><i class="fa fa-search"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h2 class="pro-title"><?php the_title(); ?></h2>
                    <span class="pro-sku">Ma SP: <?php echo $sku; ?></span>
                    <p><?php the_content(); ?></p>
                    <div align="center" class="like-button">
                        <?php include('content-like.php'); ?>
                    </div>
                  </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
          </article>
          <div align="center">
            <h3 class="heading-sub">SẢN PHẨM LIÊN QUAN</h3>
          </div>
          <section>
              <?php include("content-related.php"); ?>
          </section>
        </div>
        <div class="sp-view col-xs-12">
            <?php include("sidebar-left-menu.php"); ?>
            <?php include('sidebar-support.php'); ?>
        </div>
      </div>
    </div>
  </main>
<?php get_footer(); ?>