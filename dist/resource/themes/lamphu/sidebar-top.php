<?php global $lienhe, $mobile_browser; ?>
<header class="header">
  <div class="header-top">
    <div class="wrap-content">
      <?php if($mobile_browser==0){ ?>
      <a class="nav-logo" href="<?php echo home_url(); ?>">
        <img src="<?php echo get_site_url(); ?>/assets/images/logo.png?26062021" alt="May cat day">
      </a>
      <?php } ?>
      <div class="hotline">
        <?php if($mobile_browser==0){ ?>
        <p><?php echo $lienhe['tencongty']; ?></p>
        <span><?php echo $lienhe['diachigmap']; ?></span>
        <a href="tel:<?php echo $lienhe['hotline']; ?>" class="tel"><?php echo $lienhe['hotline']; ?></a>
        <?php } else{ ?>
        <a href="tel:<?php echo $lienhe['dtban']; ?>" class="tel"><?php echo $lienhe['dtban']; ?></a>
        <?php } ?>
      </div>
      <?php if($mobile_browser==0){ ?>
      <div class="top-mail">
        <i class="fas fa-envelope"></i>
        <a href="mailto:<?php echo $lienhe['mail']; ?>" class="mail">
          <?php echo $lienhe['mail']; ?>
        </a>
      </div>
      <?php } ?>
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
  <?php include "sidebar-main-menu.php"; ?>
</header>
<div class="mask"></div>
