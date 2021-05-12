<?php
$taxonomy = 'danh-muc';
$slug = get_query_var($taxonomy);
$termName = get_term_by('slug', $slug, $taxonomy);
$terms = get_terms($taxonomy, array(
    'hide_empty' => 0,
    'parent' => 0,
    'orderby' => 'menu_order',
    'order' => 'ASC',
));
?>
<div class="list-cat-title">DANH MỤC SẢN PHẨM</div>
<ul class="list-cat">
  <?php
    foreach ($terms as $term){
    $args = array(
        "orderby" => "slug",
        'hide_empty' => false,
        'hierarchical' => true,
        'parent' => $term->term_id
    );
    $childs = get_terms($taxonomy, $args);
    $count = count($childs);
    ?>
  <li class="list-item">
    <?php if ($count == 0) { ?>
    <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>" class="list-link">
      <?php echo $term->name; ?>
      <span class="arrow right"></span>
    </a>
    <?php } else { ?>
    <a href="#" class="list-link js-list-link">
      <?php echo $term->name; ?>
      <span class="plus"></span>
    </a>
    <ul class="sub-list-cat js-sub-list-cat">
      <?php
            foreach ($childs as $child) {
                ?>
      <li class="list-item">
        <a href="<?php echo get_term_link($child->slug, $taxonomy); ?>" class="list-link sub-list-link">
          <?php echo $child->name; ?>
          <span class="arrow right"></span>
        </a>
      </li>
      <?php
            }
            ?>
    </ul>
    <?php } ?>
    <?php
      }
      ?>
    <?php if (get_query_var("danh-muc-khach-hang") || is_page('dai-ly')){ ?>
  <li class="list-item">
    <a href="<?php echo get_permalink(get_page_by_path('dai-ly')); ?>" class="list-link">
      <?php echo __('Khách hàng đại lý', 'theme'); ?>
      <span class="arrow right"></span>
    </a>
  </li>
  <?php } ?>
</ul>
