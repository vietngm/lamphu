<div class="support">
    <h3 class="support-title">HỖ TRỢ TRỰC TUYẾN 24/7</h3>
    <ul class="support-list">
        <?php
        global $lienhe;
        $listContact = explode(';',$lienhe['dthotro']);
        foreach($listContact as $list){$l = explode(':',$list);?>
        <li class="support-item">
            <img src="/common/images/supportfemale.png" />
            <span><?php echo $l[0];?></span>
            <a href="tel:<?php echo $l[1];?>"><?php echo $l[1];?></a>
        </li>				
        <?php }?>
    </ul>
</div>