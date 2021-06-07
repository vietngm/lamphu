<?php global $lienhe,$mobile_browser; ?>
<div class="support">
  <?php if ($mobile_browser == 0) { ?>
  <h3 class="support-title">HỖ TRỢ TRỰC TUYẾN 24/7</h3>
  <?php } ?>
  <ul class="support-list">
    <?php
      $listContact = explode(';',$lienhe['dthotro']);
      foreach($listContact as $list){$l = explode(':',$list);
    ?>
    <li class="support-item">
      <?php if ($mobile_browser == 0) { ?>
      <img src="/assets/images/support.png" width="48" />
      <span><?php echo $l[0];?></span>
      <?php } ?>
      <?php if ($mobile_browser > 0) { ?>
      <i class="fas fa-phone-alt"></i>
      <?php } ?>
      <a href="tel:<?php echo $l[1];?>"><?php echo $l[1];?></a>
    </li>
    <?php }?>
  </ul>
</div>
