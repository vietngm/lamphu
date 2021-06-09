<?php
global $lienhe;
$tax = 'danh-muc';
$terms = wp_get_post_terms($post->ID, $tax, array("fields" => "all"));
$terms = get_term_top_most_parent($terms[0]->term_id, $tax);
?>
<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-product">
  <section class='key'><?php get_sidebar("banner"); ?></section>
  <section class='detail'>
    <div class="wrap-content">
      <div class="prods-detail">
        <div class="prods-info">
          <?php
            while (have_posts()) : the_post();
              $image_full = get_the_post_thumbnail_url(get_the_ID(), 'full');
          ?>
          <article class="prods-article">
            <h2 class="prods-title"><?php the_title(); ?></h2>
            <span class="prods-sku">Ma SP: <?php echo $sku; ?></span>
            <div class="prods-thumb">
              <img src="<?php echo $image_full; ?>" class="img-responsive">
              <div class="overlay"><i class="fa fa-search"></i></div>
            </div>
            <?php the_content(); ?>
            <div class="like-button"><?php include('content-like.php'); ?></div>
          </article>
          <?php endwhile;wp_reset_query(); ?>
          <div class='prods-relate'>
            <span class="heading-sub">SẢN PHẨM LIÊN QUAN</span>
            <?php include("content-related.php"); ?>
          </div>
        </div>
        <?php if ($mobile_browser == 0) { ?>
        <div class="prods-side">
          <?php get_sidebar("left-menu"); ?>
          <?php get_sidebar('support'); ?>
        </div>
        <?php } ?>
      </div>
      <?php if ($mobile_browser > 0) { 
        include("sidebar-left-menu.php");
        include('sidebar-support.php');
      }
      ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>