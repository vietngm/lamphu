<?php global $lienhe,$mobile_browser; ?>
<div class="support">
  <ul class="support-list">
    <?php
      $listContact = explode(';',$lienhe['dthotro']);
      foreach($listContact as $list){$l = explode(':',$list);
    ?>
    <li class="support-item">
      <i class="fas fa-phone-alt"></i>
      <a href="tel:<?php echo $l[1];?>"><?php echo $l[1];?></a>
    </li>
    <?php }?>
  </ul>
</div>