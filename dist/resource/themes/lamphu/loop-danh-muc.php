<a class="cate-link" href="<?php echo get_term_link($term->slug, $tax); ?>">
  <div class="cate-img">
    <?php if ($thumbUrl) { ?>
    <img src="<?php echo $thumbUrl[0]; ?>" class="img-responsive" width="100%" />
    <?php } else { ?>
    <div class='cate-noimage'>
      <img src="<?php echo get_site_url(); ?>/assets/images/noimg64.png" width="64" height="64"
        alt="<?php echo $post->post_title; ?>">
    </div>
    <?php } ?>
  </div>
  <span class="cate-name">
    <?php echo $term->name; ?>
  </span>
</a>