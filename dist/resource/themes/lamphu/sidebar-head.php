<?php global $q_config;
$lang = $q_config['language'];
global $lienhe; ?>
<header class="header">
  <div class="wrap-content">
    <div class="row gutter-10 gutter-md-30-md">
      <div class="col-lg-7 col-md-7 col-sm-8 col-xs-5">
        <div class="hotline">
          <a href="tel:<?php echo $lienhe['hotline']; ?>" class="tel"><?php echo $lienhe['hotline']; ?></a>
          <span class="time"><?php echo $lienhe['thoigian'];?></span>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-4 col-xs-7">
        <div class="top-switch">
          <div class="fab-top">
            <a class="fab-link" href="<?php echo $lienhe['facebook'];?>" target="_blank">
              <i class="fab fa-facebook-f"></i></a>
            <a class="fab-link" href="<?php echo $lienhe['twitter'];?>" target="_blank">
              <i class="fab fa-twitter"></i></a>
          </div>
          <?php echo qtrans_generateLanguageSelectCode('image'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php include("sidebar-main-menu.php"); ?>
</header>
