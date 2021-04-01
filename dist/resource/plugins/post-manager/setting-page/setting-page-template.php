<div class="wrap">
<div class="updated notice notice-success edit-success" style="margin-top:25px;font-size:18px;line-height:36px;text-transform:uppercase">Page setting option.</div>
<?php
$args = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'exclude' => '',
	'include' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 
$pages = get_pages($args);
if(isset($_REQUEST['act'])){
foreach($pages as $page){
	update_post_meta($page->ID,'op_hide',$_REQUEST['op_hide_'.$page->ID]);	
	update_post_meta($page->ID,'op_thumbnail',$_REQUEST['op_thumbnail_'.$page->ID]);	
	update_post_meta($page->ID,'op_album',$_REQUEST['op_album_'.$page->ID]);	
	update_post_meta($page->ID,'op_excerpt',$_REQUEST['op_excerpt_'.$page->ID]);
}
}
?>
<form method="POST" action="">
<table class="widefat striped">
<thead>
<tr>
<th scope="col" class="manage-column column-name">Page name</th>
<th scope="col" class="manage-column column-name">Hide</th>
<th scope="col" class="manage-column column-name">Thumbnail</th>
<th scope="col" class="manage-column column-name">Gallery</th>
<th scope="col" class="manage-column column-name">Excerpt</th>
</tr>
</thead>
<tbody class="settingpage">
<?php 
foreach($pages as $page){
	$ophide= get_post_meta($page->ID,'op_hide',true);
	$opthumb= get_post_meta($page->ID,'op_thumbnail',true);
	$opalbum= get_post_meta($page->ID,'op_album',true);	
	$opexcerpt= get_post_meta($page->ID,'op_excerpt',true);
?>	
<tr id="<?php echo $page->ID;?>" class="inactive">
<td><?php echo $page->post_title; ?></td>
<td><input type="checkbox" name="op_hide_<?php echo $page->ID; ?>" <?php echo($ophide=="on"?"checked":"");?>></td>
<td><input type="checkbox" name="op_thumbnail_<?php echo $page->ID; ?>" <?php echo($opthumb=="on"?"checked":"");?>></td>
<td><input type="checkbox" name="op_album_<?php echo $page->ID; ?>" <?php echo($opalbum=="on"?"checked":"");?>></td>
<td><input type="checkbox" name="op_excerpt_<?php echo $page->ID; ?>" <?php echo($opexcerpt=="on"?"checked":"");?>></td>
</tr>
<?php }?>
</tbody>
</table>
<div class="tablenav bottom">
<input type="hidden" name="act">
<input type="submit" value="Save change" class="button button-primary" />
</div>
</form>
<div class="updated notice notice-success" style="margin-top:25px;font-size:18px;line-height:36px;text-transform:uppercase">Taxonomy setting option.</div>
<?php
if(isset($_REQUEST['act-tax'])){
	$terms = get_taxonomies();
	unset($terms['post_tag']);
	unset($terms['nav_menu']);
	unset($terms['link_category']);
	unset($terms['post_format']);
		
	foreach ( $terms as $term ) {
		update_tax_meta($term,'tax-thumb-status',$_REQUEST['tax_hide_'.$term]);	
	}
}
?>
<form method="POST" action="">
<table class="widefat striped">
<thead>
<tr>
<th scope="col" class="manage-column column-name">Taxonomy name</th>
<th scope="col" class="manage-column column-name">Slug</th>
<th scope="col" class="manage-column column-name">Thumbnail</th>
</tr>
</thead>
<tbody>
<?php
	$terms = get_taxonomies();
	unset($terms['post_tag']);
	unset($terms['nav_menu']);
	unset($terms['link_category']);
	unset($terms['post_format']);
	foreach ( $terms as $term ) {
		$label = get_taxonomy($term);
		$taxhide= get_tax_meta($term,'tax-thumb-status',true);
		?>
		<tr><td><?php echo $label->label; ?></td><td><?php echo $term; ?></td><td><input type="checkbox" name="tax_hide_<?php echo $term; ?>" <?php echo($taxhide=="on"?"checked":"");?> /></td></tr>
        <?php
	}
?>
</tbody>
</table>

<div class="tablenav bottom">
<input type="hidden" name="act-tax">
<input type="submit" value="Save change" class="button button-primary" />
</div>
</form>
</div>