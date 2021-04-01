<div  class="meta-box-sortables ui-sortable">
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br></div>
<h3 class="hndle"><span>Select Effect</span></h3>
<div class="inside">

<input type="text" class="ls_input" style="width:100%;padding:5px" placeholder="Enter new categories" name="binfo[categories]" />
<div style="height:10px"></div>
<select style="font-size:12px;margin:0px;padding:0px;width:100%" id="op_categories">
<?php
$html = get_all_custom_slug();
echo $html;
?>
</select>
<div style="height:10px"></div>

<a href="#" class="button add-new-cate" data-editor="content" title="Add Images"><span class="wp-media-buttons-icon"></span>Add New Categories</a>
<a href="#" class="button delete-cate" data-editor="content" title="Add Images"><span class="wp-media-buttons-icon"></span>Delete</a>

</div>
</div>
</div>