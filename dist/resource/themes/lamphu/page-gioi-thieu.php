<?php global $mobile_browser; ?>
<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-about">
  <section>
    <?php get_sidebar("banner"); ?>
  </section>
  <section>
    <div class="wrap-content">
      <div class="article-about">
        <?php if ($mobile_browser == 0) { ?>
        <div class="article-side">
          <?php get_sidebar('left-menu'); ?>
          <?php get_sidebar('support'); ?>
        </div>
        <?php } ?>
        <div class="article-detail">
          <h3 class="heading-detail"><?php the_title(); ?></h3>
          <?php get_page_by_id(2); ?>
        </div>
      </div>
      <?php if ($mobile_browser > 0) { ?>
      <?php include("sidebar-left-menu.php"); ?>
      <?php include('sidebar-support.php'); ?>
      <?php } ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>