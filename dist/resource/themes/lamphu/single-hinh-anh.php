<?php
get_header();
get_sidebar('head');
?>
  <main class="is-gallery">
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
            <?php while (have_posts()) : the_post(); ?>
              <h3 class="heading-detail">Thư viện hình - <?php the_title(); ?></h3>
              <ul id="lightgallery" class="gallery">
                  <?php
                  $_list = mcpGallery($post->ID);
                  if (!empty($_list) && count($_list) > 0) {
                      foreach ($_list as $key) {
                          $_key = json_decode($key);
                          $key = $_key->key;
                          $o = $_key->attach_id;
                          $order = $_key->order;
                          $image_full = wp_get_attachment_image_src($o, 'full');
                          $image_thumb = wp_get_attachment_image_src($o, 'thumbnail');
                          $attachment_title = get_the_title($o)
                          ?>
                        <li class="gallery-item  pro-thumb" align="center"
                            data-responsive="<?php echo $image_full[0]; ?> 375, <?php echo $image_full[0]; ?> 480, i<?php echo $image_full[0]; ?> 800"
                            data-src="<?php echo $image_full[0]; ?>" data-sub-html="">
                            <img src="<?php echo $image_thumb[0]; ?>" class="img-responsive" alt="<?php echo $attachment_title; ?>">
                          <div class="overlay"><i class="fa fa-search"></i></div>
                        </li>
                      <?php }
                  } ?>
              </ul>
                <?php the_content();endwhile; ?>
        </div>
        <div class="sp-view col-xs-12">
            <?php include("sidebar-left-menu.php"); ?>
            <?php include('sidebar-support.php'); ?>
        </div>
      </div>
    </div>
  </main>
<?php get_footer(); ?>
