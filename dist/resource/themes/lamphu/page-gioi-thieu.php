<?php get_header(); ?>
<?php get_sidebar('head'); ?>
  <main class="article-detail">
    <div align="center">
        <?php get_sidebar("banner"); ?>
    </div>
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-3 col-md-3 col-sm-3 pc-view">
            <?php get_sidebar('left-menu'); ?>
            <?php get_sidebar('support'); ?>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <h3 class="heading-detail"><?php the_title(); ?></h3>
            <?php get_page_by_id(2); ?>
        </div>
        <div class="sp-view col-xs-12">
            <?php include("sidebar-left-menu.php"); ?>
            <?php include('sidebar-support.php'); ?>
        </div>

      </div>
    </div>
  </main>
<?php get_footer(); ?>