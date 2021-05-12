<div class="row gutter-10 gutter-md-30-md">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <h2 class="heading">Danh mục sản phẩm</h2>
  </div>
  <?php
    $tax = 'danh-muc';
    $terms = get_terms($tax, array('orderby' => 'name', 'order' => 'DESC', 'parent' => 0, 'number' => 6, 'hide_empty' => 0));
    foreach ($terms as $term) {
        $attachID = get_tax_meta($term->term_id, 'tax_thumbnail', true);
        $thumbUrl = wp_get_attachment_image_src($attachID, 'featured_top_cat');
        ?>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" align="center">
    <a class="new-cate" align="center" href="<?php echo get_term_link($term->slug, $tax); ?>">
      <div class="imgview">
        <img src="<?php echo $thumbUrl[0]; ?>" class="img-responsive" width="100%" />
      </div>
      <div class="overlay">
        <div class="t-color">
          <?php echo $term->name; ?>
        </div>
      </div>
    </a>
  </div>
  <?php
    }
    ?>
</div>
