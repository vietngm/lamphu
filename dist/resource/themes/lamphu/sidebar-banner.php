<?php
$slide = slideshow();$max_w=$slide['w_large'];$max_h=$slide['h_large'];$arrBanner = $slide['slide_array'];
if(is_home()){is_banner($arrBanner,'trang-chu',$max_w,$max_h);}
if(is_tax()){is_banner($arrBanner,get_query_var(get_current_slug()),$max_w,$max_h);}
else{
if(is_page() || is_archive()){
	$post_type = get_post_type();
	if ($post_type!='page'){$post_type_data = get_post_type_object( $post_type );	$slug = $post_type_data->rewrite['slug'];}
	if ($post_type=='page'){$post = get_post($post->ID);$slug = $post->post_name;}
	is_banner($arrBanner,$slug,$max_w,$max_h);
}
else{
if(is_singular()){ 
	$listTax = 	get_all_tax();
	foreach($listTax as $tax){	$terms = wp_get_object_terms($post->ID,$tax);if($terms[0]->slug!=''){$taxSlug = $terms[0]->slug;break;}}
	$post_type = get_post_type();
	if ($post_type!='page'){$post_type_data = get_post_type_object( $post_type );	$slug = $post_type_data->rewrite['slug'];}
	if($taxSlug!=''){is_banner($arrBanner,$taxSlug,$max_w,$max_h);/*is single of Tax*/}
	else{is_banner($arrBanner,$slug,$max_w,$max_h);/*is single of  Post*/}
}}}?>
<img src="<?php echo get_site_url(); ?>/assets/images/shadow.png" width="1000" height="34" class="img-responsive"
  alt="Lâm Phú">