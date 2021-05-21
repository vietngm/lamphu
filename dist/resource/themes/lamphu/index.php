<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main>
  <div align="center">
    <?php get_sidebar("banner"); ?>
  </div>
  <div class="wrap-content">
    <?php get_sidebar('top-danh-muc'); ?>
  </div>
  <?php get_sidebar('du-an'); ?>
  <div class="wrap-content">
    <?php get_sidebar('san-pham'); ?>
  </div>

  <?php get_sidebar('gioi-thieu'); ?>
  <section class="partner">
    <div class="wrap-content">
      <?php get_template_part('content', 'partner'); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
