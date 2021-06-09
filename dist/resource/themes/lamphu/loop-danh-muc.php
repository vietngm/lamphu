<a class="cate-link" href="<?php echo get_term_link($term->slug, $tax); ?>">
  <?php if ($thumbUrl) { ?>
  <div class="cate-square">
    <img src="<?php echo $thumbUrl[0]; ?>" class="img-responsive" width="100%" />
  </div>
  <?php } else { ?>
  <div class='cate-noimage'>
    <img src="<?php echo get_site_url(); ?>/assets/images/noimg64.png" width="64" height="64"
      alt="<?php echo $post->post_title; ?>">
  </div>
  <?php } ?>
  <span class="cate-name">
    <?php echo $term->name; ?>
  </span>
</a>
