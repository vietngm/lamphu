<?php
global $lienhe,$mobile_browser;
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
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo home_url();?>" class="breadcrumb-link">Home</a></li>
        <li class="breadcrumb-div"><span>/</span></li>
        <li class="breadcrumb-item"><a href="<?php echo get_term_link($terms->slug, $tax); ?>"
            class="breadcrumb-link"><?php echo $terms->name;?></a></li>
        <li class="breadcrumb-div"><span>/</span></li>
        <li class="breadcrumb-item"><span><?php the_title();?></span></li>
      </ul>
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
            </div>
            <div class='prods-body'>
              <?php the_content(); ?>
            </div>
            <div class="like-button"><?php include 'content/like.php'; ?></div>
          </article>
          <?php endwhile;wp_reset_query(); ?>
          <div class='prods-relate'>
            <span class="heading-sub">SẢN PHẨM LIÊN QUAN</span>
            <?php include "content/relate.php"; ?>
          </div>
        </div>
        <?php
        if ($mobile_browser == 0) {
          echo '<div class="side">';
          include("sidebar-left-menu.php");
          include('sidebar-support.php');
          echo '</div>';
        }
      ?>
      </div>
      <?php if ($mobile_browser > 0) { 
        echo '<div class="side">';
        include("sidebar-left-menu.php");
        include('sidebar-support.php');
        echo '</div>';
      }
      ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
