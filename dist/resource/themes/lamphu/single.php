<?php global $mobile_browser; ?>
<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-news">
  <div class="key-visual key-visual-news">
    <span>LÂM PHÚ | NEWS</span>
  </div>
  <article>
    <div class="wrap-content">
      <div class="news-detail">
        <h2 class='heading'><?php the_title(); ?></h2>
        <?php while (have_posts()): the_post();?>
        <div class="news-body">
          <?php the_content(); ?>
          <div class="btn-like">
            <?php include 'content-like.php'; ?>
          </div>
          <?php if ($mobile_browser == 0) { ?>
          <?php include('content-support.php'); ?>
          <?php } ?>
        </div>
        <?php endwhile; ?>
        <h3 class="heading-sub">Các tin tức khác</h3>
        <ul class="related-list">
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
          <li class="related-item">
            <?php get_template_part('loop', 'tin-tuc'); ?>
          </li>
          <?php
endwhile;
wp_reset_query();
?>
        </ul>
      </div>
      <?php if ($mobile_browser > 0) { ?>
      <div class="side">
        <?php include("sidebar-left-menu.php"); ?>
        <?php include('sidebar-support.php'); ?>
      </div>
      <?php } ?>
    </div>

  </article>
</main>
<?php get_footer(); ?>