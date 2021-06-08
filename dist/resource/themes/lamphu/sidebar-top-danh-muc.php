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
    <?php include('loop-danh-phmuc.php'); ?>
  </li>
  <?php
    }
    ?>
</ul>