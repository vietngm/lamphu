<div class="nav-cate">
  <div class="nav-cate-label"><i class="fas fa-bars"></i>Danh mục sản phẩm</div>
  <ul class="nav-cate-list">
    <?php
		$taxonomy = 'danh-muc';
		$terms = get_terms(
			$taxonomy, array(
			'hide_empty' => 0,
			'parent' => 0,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			)
		);
		foreach($terms as $term){
			$args = array(
				"orderby" => "slug",
				'hide_empty'    => false, 
				'hierarchical'  => true, 
				'parent'        => $term->term_id
			); 
			$childs = get_terms($taxonomy, $args);
			$count = count($childs);
			?>
    <li class="nav-cate-item">
      <?php if($count > 0) {?>
      <a href="#" class="nav-cate-link">
        <span><?php echo $term->name; ?></span>
        <span class="arrow arrow-go"></span>
      </a>
      <ul class="nav-child">
        <?php
            foreach ($childs as $child) {
                ?>
        <li class="nav-cate-item">
          <a href="<?php echo get_term_link($child->slug, $taxonomy); ?>" class="nav-cate-link">
            <span><?php echo $child->name; ?></span>
            <span class="arrow arrow-go"></span>
          </a>
        </li>
        <?php } ?>
      </ul>
      <?php }else{ ?>
      <a href="<?php echo get_term_link($term->slug,$taxonomy);?>" class="nav-cate-link">
        <span><?php echo $term->name; ?></span>
        <span class="arrow arrow-go"></span>
      </a>
      <?php } ?>
    </li>
    <?php } ?>
  </ul>
</div>
