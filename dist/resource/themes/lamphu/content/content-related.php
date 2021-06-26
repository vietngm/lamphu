<?php
$arg = array(
  'post_type' => 'san-pham',
  'orderby' => 'date',
  'order' => 'asc',
  'posts_per_page' => -1,
  'taxonomy' => $tax,
  'term' => $terms->slug,
  'status' => array('publish', 'private')
);
$the_query = new WP_Query($arg);
?>
<ul class="prods-list">
  <?php while ($the_query->have_posts()) : $the_query->the_post();?>
  <li class="prods-item"><?php include('loop-san-pham.php'); ?></li>
  <?php endwhile;wp_reset_query(); ?>
</ul>