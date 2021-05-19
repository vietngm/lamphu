<meta name="revisit-after" content="7 days" />
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
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0" />
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
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $metakeyword; ?>" />
<meta name="robots" content="index, follow" />
<?php echo $extraFiled; ?>
<link rel="alternate" href="http://www.maycatdayedm.com" hreflang="vi-vn" />
<link rel="shortcut icon" href="/common/images/share/meta/favicon.png" type="image/x-icon" />
<link rel="icon" href="/common/images/share/meta/favicon.png" type="image/x-icon" />