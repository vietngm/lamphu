<h2 class="heading">Sản phẩm</h2>
<ul class="prods-list">
  <?php
        $arg = array(
          'post_type' => 'san-pham',
          'orderby' => 'date',
          'order' => 'desc',
          'posts_per_page' => 12,
          'status' => array('publish', 'private')
        );
        ?>
  <?php
        $the_query = new WP_Query($arg);
        while ($the_query->have_posts()) : $the_query->the_post();
        ?>
  <li class="prods-item">
    <?php include('loop-san-pham.php'); ?>
  </li>
  <?php
  endwhile;
  wp_reset_query();
  ?>
</ul>
