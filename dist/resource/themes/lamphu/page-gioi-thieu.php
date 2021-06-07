<?php global $mobile_browser; ?>
<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-about">
  <section>
    <?php get_sidebar("banner"); ?>
  </section>
  <section class='article-about'>
    <div class="wrap-content">
      <div class="article-detail">
        <h2 class="heading-detail"><?php the_title(); ?></h2>
        <div>
          <?php get_page_by_id(3); ?>
          <?php if ($mobile_browser == 0) { ?>
          <?php include('content-support.php'); ?>
          <?php } ?>
        </div>
      </div>
      <?php if ($mobile_browser > 0) { ?>
      <?php include("sidebar-left-menu.php"); ?>
      <?php include('content-support.php'); ?>
      <?php } ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
