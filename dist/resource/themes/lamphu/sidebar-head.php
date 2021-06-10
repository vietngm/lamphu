<?php global $lienhe, $mobile_browser; ?>
<header class="header">
  <div class="header-top">
    <div class="wrap-content">
      <div class="hotline">
        <?php if($mobile_browser==0){ ?>
        <a href="tel:<?php echo $lienhe['hotline']; ?>" class="tel"><?php echo $lienhe['hotline']; ?></a>
        <?php } else{ ?>
        <a href="tel:<?php echo $lienhe['dtban']; ?>" class="tel"><?php echo $lienhe['dtban']; ?></a>
        <?php } ?>
      </div>
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
  <?php include("sidebar-main-menu.php"); ?>
</header>
