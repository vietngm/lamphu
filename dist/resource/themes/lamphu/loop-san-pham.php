<a href="<?php echo get_permalink($post->ID); ?>" class='prods-square'>
  <?php if (has_post_thumbnail()) { ?>
  <div class='prods-thumb'>
    <?php the_post_thumbnail('full', array('class' => 'img-responsive img-view')); ?>
  </div>
  <?php } else { ?>
  <div class='prods-noimage'>
    <img src="<?php echo get_site_url(); ?>/assets/images/noimg64.png" width="64" height="64"
      alt="<?php echo $post->post_title; ?>">
  </div>
  <?php } ?>
</a>

<div class="prods-title">
  <a href="<?php echo get_permalink($post->ID); ?>" class="prods-link">
    <?php the_title(); ?>
  </a>
</div>