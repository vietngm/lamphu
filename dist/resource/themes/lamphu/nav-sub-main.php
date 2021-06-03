<?php
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
<li class="list-item sub-list-item">
  <?php
		if($count==0){
		?>
  <a href="<?php echo get_term_link($term->slug,$taxonomy);?>" class="sub-list-link">
    <i class="fas fa-chevron-right"></i>
    <?php if($mobile_browser > 0){ ?>
    <span class="arrow left"></span>
    <?php } ?>
    <span><?php echo $term->name; ?></span>
  </a>
  <?php
		}
		else{ ?>
  <a href="#" class="sub-list-link js-sub-list-link">
    <i class="fas fa-chevron-right"></i>
    <?php if($mobile_browser > 0){ ?>
    <span class="arrow left"></span>
    <?php } ?>
    <span><?php echo $term->name; ?></span>
    <span class="plus"></span>
  </a>
  <ul class="children js-children">
    <?php
			foreach($childs as $child){
				?>
    <li class="list-item sub-list-item">
      <a href="<?php echo get_term_link($child->slug,$taxonomy);?>" class="sub-list-link">
        <?php if($mobile_browser > 0){ ?>
        <span class="arrow left"></span>
        <?php } ?>
        <span><?php echo $child->name; ?></span>
      </a>
    </li>
    <?php
			}
			?>
  </ul>
  <?php
		}
		?>
</li>
<?php
}
?>
