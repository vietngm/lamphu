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
  <a href="<?php echo get_term_link($term->slug,$taxonomy);?>" class="sub-list-link">
    <span><?php echo $term->name; ?></span>
    <span class="arrow arrow-go"></span>
  </a>
</li>
<?php
}
?>
