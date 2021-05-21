<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
  <div class="img-view" data-mh="view" data-mh-min="768">
    <a href="<?php echo get_permalink($post->ID); ?>">
      <?php if (has_post_thumbnail()) { ?>
      <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
      <?php } else { ?>
      <img src="<?php bloginfo('template_directory'); ?>/assets/images/noimg64.png" width="64" height="64"
        alt="<?php echo $post->post_title; ?>">
      <?php } ?>
    </a>
  </div>
  <div class="caption">
    <a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>
  </div>
</div>