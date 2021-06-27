<?php global $mobile_browser; ?>
<?php get_header(); ?>
<?php get_sidebar('top'); ?>
<main class="is-about">
  <section class='key'>
    <?php get_sidebar("banner"); ?>
  </section>
  <section class='article-about'>
    <div class="wrap-content">
      <h2 class="heading-detail"><?php the_title(); ?></h2>
      <div class="article-detail">
        <?php while (have_posts()): the_post();?>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <?php if ($mobile_browser == 0) { ?>
        <?php include('content/support.php'); ?>
        <?php } ?>
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
  <section class="partner">
    <div class="wrap-content">
      <h2 class="heading">Đối tác</h2>
      <?php include 'content/partner.php'; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
