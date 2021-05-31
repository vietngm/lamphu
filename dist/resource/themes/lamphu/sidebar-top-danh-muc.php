<h2 class="heading">Danh mục sản phẩm</h2>
<ul class="cate-list">
  <?php
    $tax = 'danh-muc';
    $terms = get_terms(
      $tax, array(
        'orderby' =>
        'name',
        'order' => 'DESC',
        'parent' => 0,
        'number' => 8,
        'hide_empty' => 0)
      );
    foreach ($terms as $term) {
        $attachID = get_tax_meta($term->term_id, 'tax_thumbnail', true);
        $thumbUrl = wp_get_attachment_image_src($attachID, 'featured_top_cat');
        ?>
  <li class="cate-item">
    <a class="cate-link" href="<?php echo get_term_link($term->slug, $tax); ?>">
      <div class="cate-img">
        <?php if ($thumbUrl) { ?>
        <img src="<?php echo $thumbUrl[0]; ?>" class="img-responsive" width="100%" />
        <?php } else { ?>
        <img src="<?php echo get_site_url(); ?>/assets/images/noimg64.png" width="64" height="64"
          alt="<?php echo $post->post_title; ?>">
        <?php } ?>
      </div>
      <span class="cate-name">
        <?php echo $term->name; ?>
      </span>
    </a>
  </li>
  <?php
    }
    ?>
</ul>
