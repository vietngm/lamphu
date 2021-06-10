<?php global $lienhe; ?>
<ul class="contact">
  <li class="contact-item contact-name">Liên hệ:</li>
  <?php
      $listContact = explode(';',$lienhe['dthotro']);
      foreach($listContact as $list){$l = explode(':',$list);
    ?>
  <li class="contact-item">
    <i class="fas fa-phone-alt"></i>
    <a href="tel:<?php echo $l[1];?>"><?php echo $l[1];?></a>
  </li>
  <?php }?>
</ul>
