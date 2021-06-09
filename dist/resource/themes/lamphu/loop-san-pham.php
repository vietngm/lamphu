<a href="<?php echo get_permalink($post->ID); ?>" class='prods-square'>
  <?php if (has_post_thumbnail()) { ?>
  <?php the_post_thumbnail('full', array('class' => 'img-responsive img-view')); ?>
  <?php } else { ?>
  <img src="<?php echo get_site_url(); ?>/assets/images/noimg64.png" width="64" height="64"
    alt="<?php echo $post->post_title; ?>">
  <?php } ?>
</a>

<div class="prods-title">
  <a href="<?php echo get_permalink($post->ID); ?>" class="prods-link">
    <?php the_title(); ?>
  </a>
</div>