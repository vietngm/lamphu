<div class="row gutter-10 gutter-md-30-md">
    <?php
    $tax = 'cat-san-pham';
    $terms = get_terms($tax, array('orderby' => 'name', 'order' => 'ASC', 'parent' => 0, 'number' => 2, 'hide_empty' => 0));
    foreach ($terms as $term) {
        $arg = array('post_type' => 'san-pham', 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => 4, 'taxonomy' => $tax, 'term' => $term->slug, 'status' => array('publish', 'private'));
        ?>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
        <h2 class="heading"><?php echo $term->name; ?></h2>
      </div>
        <?php
        $the_query = new WP_Query($arg);
        while ($the_query->have_posts()) : $the_query->the_post();
            $price = get_post_meta($post->ID, 'gia-sp', true);
            include('loop-san-pham.php');
        endwhile;
        wp_reset_query();
    }
    ?>
</div>