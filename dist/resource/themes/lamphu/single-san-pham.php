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
        <?php
        if ($mobile_browser == 0) {
          echo '<div class="side">';
          ?>
        <div class="nav-cate">
          <ul class="nav-cate-list">
            <?php
		$taxonomy = 'danh-muc';
		$terms = get_terms(
			$taxonomy, array(
			'hide_empty' => 0,
			'parent' => 0,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			)
		);
		foreach($terms as $term){
			$args = array(
				"orderby" => "slug",
				'hide_empty'    => false, 
				'hierarchical'  => true, 
				'parent'        => $term->term_id
			); 
			$childs = get_terms($taxonomy, $args);
			$count = count($childs);
			?>
            <li class="nav-cate-item">
              <?php if($count > 0) {?>
              <a href="#" class="nav-cate-link">
                <span><?php echo $term->name; ?></span>
                <span class="arrow arrow-go"></span>
              </a>
              <ul class="nav-child">
                <?php
            foreach ($childs as $child) {
                ?>
                <li class="nav-cate-item">
                  <a href="<?php echo get_term_link($child->slug, $taxonomy); ?>" class="nav-cate-link">
                    <span><?php echo $child->name; ?></span>
                    <span class="arrow arrow-go"></span>
                  </a>
                </li>
                <?php } ?>
              </ul>
              <?php }else{ ?>
              <a href="<?php echo get_term_link($term->slug,$taxonomy);?>" class="nav-cate-link">
                <span><?php echo $term->name; ?></span>
                <span class="arrow arrow-go"></span>
              </a>
              <?php } ?>
            </li>
            <?php } ?>
          </ul>
        </div>
        <?php
          include('sidebar-support.php');
          echo '</div>';
        }
      ?>
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
          <div class='prods-relate'>
            <span class="heading-sub">SẢN PHẨM LIÊN QUAN</span>
            <?php include "content/relate.php"; ?>
          </div>
        </div>

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
