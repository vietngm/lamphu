<?php global $mobile_browser; ?>
<?php get_header(); ?>
<?php get_sidebar('top'); ?>
<main class="is-news news-detail">
  <section class='key'>
    <div class='key-shadow'>
      <img src='/assets/images/shadow.png' alt='shadow' />
    </div>
  </section>
  <article>
    <div class="wrap-content">
      <div class="news-content">
        <h2 class='heading'><?php the_title(); ?></h2>
        <?php while (have_posts()): the_post();?>
        <div class="news-body">
          <?php the_content(); ?>
          <div class="btn-like"><?php include 'content/like.php'; ?></div>
          <?php if ($mobile_browser == 0) { ?>
          <?php include 'content/support.php'; ?>
          <?php } ?>
        </div>
        <?php endwhile; ?>
        <span class="heading-sub">Các tin khác</span>
        <ul class="relate-list">
          <?php
            $arg = array(
              'post_type' => 'tin-tuc',
              'orderby' => 'date',
              'order' => 'asc',
              'offset' => 2,
              'posts_per_page' => -1,
              'status' => array('publish', 'private'),
            );
            $the_query = new WP_Query($arg);
            while ($the_query->have_posts()): $the_query->the_post();
          ?>
          <li class="relate-item">
            <?php include 'loop/tin-tuc.php'; ?>
          </li>
          <?php endwhile;wp_reset_query();?>
        </ul>
      </div>
      <?php
      if ($mobile_browser > 0) {
        echo '<div class="side">';
        include("sidebar-left-menu.php");
        include('sidebar-support.php');
        echo '</div>';
      }
      ?>
    </div>
  </article>
</main>
<?php get_footer(); ?>
