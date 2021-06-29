<?php
global $lienhe,$mobile_browser;
$tax = 'danh-muc';
$terms = wp_get_post_terms($post->ID, $tax, array("fields" => "all"));
$terms = get_term_top_most_parent($terms[0]->term_id, $tax);
?>
<?php get_header(); ?>
<?php get_sidebar('top'); ?>
<main class="is-product">
  <section class='key'><?php get_sidebar("banner"); ?></section>
  <section class='detail'>
    <div class="wrap-content">
      <div class="prods-detail">
        <?php if ($mobile_browser == 0) { ?>
        <div class="nav-cate">
          <?php include "content/nav-categories.php"; ?>
        </div>
        <?php } ?>
        <div class="prods-info">
          <?php
					while (have_posts()) : the_post();
					$image_full = get_the_post_thumbnail_url(get_the_ID(), 'full');
					?>
          <article class="prods-article">
            <div class="prods-thumb">
              <img src="<?php echo $image_full; ?>" class="img-responsive">
            </div>
            <h2 class="prods-title"><?php the_title(); ?></h2>
            <div class='prods-body'>
              <?php the_content(); ?>
            </div>
            <div class="like-button"><?php include 'content/like.php'; ?></div>
          </article>
          <?php endwhile;wp_reset_query(); ?>
        </div>
        <?php if ($mobile_browser == 0) { ?>
        <div class="side">
          <?php include('sidebar-support.php'); ?>
        </div>
        <?php } ?>
      </div>
      <div class='prods-relate'>
        <span class="heading-sub">SẢN PHẨM LIÊN QUAN</span>
        <?php include "content/relate.php"; ?>
      </div>
      <?php if ($mobile_browser > 0) {  ?>
      <div class="side">
        <?php include("sidebar-left-menu.php"); ?>
        <?php include('sidebar-support.php'); ?>
      </div>
      <?php } ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
