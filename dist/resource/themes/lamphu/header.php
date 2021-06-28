<?php ob_start();
global $lienhe;
$lienhe = contactInfo();
global $mobile_browser, $tablet_browser; ?>
<!doctype html>
<html lang="vi">

<head>
  <?php get_sidebar('title-page'); ?>
  <link media="all" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" rel="stylesheet" />
  <link href="<?php echo get_site_url(); ?>/assets/css/common.css?28062021" rel="stylesheet">
  <link href="<?php echo get_site_url(); ?>/assets/images/share/meta/favicon.png" rel="shortcut icon"
    type="image/x-icon">
  <link rel="apple-touch-icon" href="<?php echo get_site_url(); ?>/assets/images/apple-touch.png">
  </script>
  <?php wp_head(); ?>
</head>

<body>
