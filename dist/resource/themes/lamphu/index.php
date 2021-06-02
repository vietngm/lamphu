<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main>
  <section>
    <?php get_sidebar("banner"); ?>
  </section>
  <section class="cate">
    <div class="wrap-content">
      <?php get_sidebar('top-danh-muc'); ?>
    </div>
  </section>
  <section>
    <?php get_sidebar('gioi-thieu'); ?>
  </section>
  <section class="prods">
    <div class="wrap-content">
      <?php get_sidebar('san-pham'); ?>
    </div>
  </section>
  <section>
    <?php get_sidebar('gioi-thieu'); ?>
  </section>
  <section class="partner">
    <div class="wrap-content">
      <?php get_template_part('content', 'partner'); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>