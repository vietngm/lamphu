<div class="partner-list owl-carousel owl-theme">
    <?php
    $_list = mcpGallery(59);
    if (!empty($_list) && $_list > 0) {
        foreach ($_list as $key) {
            $_key = json_decode($key);
            $key = $_key->key;
            $o = $_key->attach_id;
            $order = $_key->order;
            $image_full = wp_get_attachment_image_src($o, 'full');
            $image_thumb = wp_get_attachment_image_src($o, 'thumbnail');
            ?>
          <div><img src="<?php echo $image_full[0]; ?>"></div>
        <?php }
    } ?>
</div>
