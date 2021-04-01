<form  action="<?php echo get_permalink(get_page_by_path( 'search' ));?>" name="searchform" id="searchform" method="get" role="search">
    <div style="float:left"><?php echo __('Tìm kiếm','theme'); ?>: <input placeholder="<?php echo __('Tìm kiếm sản phẩm','theme'); ?>" type="text" id="s" name="s"  value="<?php   echo (isset($_REQUEST['s'])?$_REQUEST['s']:"");  ?>"/></div>
    <div style="float:left;margin-top: 2px;"><input type="submit" value="" id="searchsubmit" /></div>
</form>