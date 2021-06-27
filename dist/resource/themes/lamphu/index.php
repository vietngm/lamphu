<?php get_header(); ?>
<?php get_sidebar('top'); ?>
<main class="is-home">
  <section class='key'>
    <?php get_sidebar("banner"); ?>
  </section>
  <!-- <section class="cate">
    <div class="wrap-content">
      <?php //get_sidebar('top-danh-muc'); ?>
    </div>
  </section> -->

  <section class="prods">
    <div class="wrap-content">
      <?php get_sidebar('san-pham'); ?>
    </div>
  </section>
  <section class="about">
    <?php get_sidebar('gioi-thieu'); ?>
  </section>
  <section class="partner">
    <div class="wrap-content">
      <h2 class="heading">Đối tác</h2>
      <?php include 'content/partner.php'; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
