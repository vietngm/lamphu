<div align="center" class="slick">
  <!--  <h2 class="heading">--><?php //echo get_the_title(4); ?><!--</h2>-->
  <div class="regular">
      <?php
      $arg = array('post_type' => 'hinh-anh', 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => -1);
      $the_query = new WP_Query($arg);
      while ($the_query->have_posts()) : $the_query->the_post();
          $_list = mcpGallery($post->ID);
          if (!empty($_list) && $_list > 0) {
              foreach ($_list as $key) {
                  $_key = json_decode($key);
                  $key = $_key->key;
                  $o = $_key->attach_id;
                  $order = $_key->order;
                  $image_full = wp_get_attachment_image_src($o, 'featured_medium');
                  ?>
                <div><img src="<?php echo $image_full[0]; ?>" alt="Hinh anh"></div>
              <?php }
          } ?>
      <?php endwhile;
      wp_reset_query(); ?>
  </div>
</div>