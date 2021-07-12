<meta name="revisit-after" content="7 days" />
<link rel="canonical" href="<?php echo the_permalink($post->ID); ?>">
<?php
$extraFiled = get_option('seo_extra_filed');
if(is_page() || is_singular()){
$titlepage = get_post_meta($post->ID,'title-page',true);
$description = get_post_meta($post->ID,'description',true);
$metakeyword = get_post_meta($post->ID,'meta-key',true);
}
if(is_home()){
$titlepage = get_option('seo_index_title');
$description = get_option('seo_index_description');
$metakeyword = get_option('seo_index_metakeyword');
}
if(is_tax()){
	$link = $_SERVER['REQUEST_URI'];
	$arr = array();
	$arr=explode( '/', $link );
	$tax = $arr[1];
	$slug = $arr[2];
	$terms = get_term_by('slug',$slug,$tax);		
	$titlepage = get_tax_meta($terms->term_taxonomy_id,'term_meta[title_meta]',true);
	$description = get_tax_meta($terms->term_taxonomy_id,'term_meta[description_meta]',true);
	$metakeyword = get_tax_meta($terms->term_taxonomy_id,'term_meta[keyword_meta]',true);
}
?>
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1.0,shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="UTF-8">
<?php if($titlepage=='') {?>
<title><?php wp_title('|', true, 'right'); ?></title>
<meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>" />
<?php } else { ?>
<title><?php echo $titlepage; ?></title>
<meta property="og:title" content="<?php echo $titlepage; ?>" />
<?php } ?>
<meta property="og:description" content="<?php echo $description; ?>" />
<meta property="og:url" content="<?php echo the_permalink($post->ID); ?>" />
<meta property="og:type" content="<?php echo (is_singular('san-pham') ? 'product':'website')?>" />
<?php
$featured_img_url = get_the_post_thumbnail_url($post->ID,'featured_large');
if(is_home()){
	$featured_img_url = get_site_url().'/assets/images/share/meta/ogimage.png';
}
?>
<meta property="og:image" content="<?php echo $featured_img_url; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $metakeyword; ?>" />
<meta name="robots" content="index, follow" />
<?php echo $extraFiled; ?>
<link rel="alternate" hreflang="x-default" href="http://www.maycatdayedm.com">
<link rel="alternate" hreflang="vi" href="http://www.maycatdayedm.com" />
<link rel="shortcut icon" href="<?php echo get_site_url(); ?>/assets/images/share/meta/favicon.png"
  type="image/x-icon" />
<link rel="icon" href="<?php echo get_site_url(); ?>/assets/images/share/meta/favicon.png" type="image/x-icon" />
