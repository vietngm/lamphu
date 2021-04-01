<div class="wrap">
<div class="updated notice notice-success is-dismissible" style="margin-top:25px;font-size:18px;line-height:36px;text-transform:uppercase">Post manager option.</div>
<?php
if(!isset($_REQUEST['act'])){
$mcp_opts =(array)mcp_getall_data();
?>
<form method="post" action="">
<div class="mcp-topm-block">
<table class="wp-list-table widefat striped">
<thead>
<tr>
<th scope="col" class="manage-column column-name column-primary">Name Post Type</th>
<th scope="col" class="manage-column column-description">Custom Post Type</th>
<th scope="col" class="manage-column column-description">Supports</th>
<th scope="col" class="manage-column column-title">Options</th>
<th scope="col" class="manage-column column-description">Taxonomy</th>
<th scope="col" class="manage-column column-description">Action</th>
</tr>
</thead>

<tbody id="the-list">
<?php foreach($mcp_opts as $mcp_opt){
$editor=$mcp_opt->editor;
$excerpt=$mcp_opt->excerpt;
$thumnail=$mcp_opt->thumnail;
$comment=$mcp_opt->comment;
$author=$mcp_opt->author;
$menu=$mcp_opt->hidemenu;
$search=$mcp_opt->search;
$album=$mcp_opt->album;
$capability=$mcp_opt->capability;

if($editor == 'on'){$editor=" | Editor";}
if($excerpt == 'on'){$excerpt=" | Excerpt";}
if($thumnail == 'on'){$thumnail=" | Thumbnail";}
if($comment == 'on'){$comment=" | Comments";}
if($author == 'on'){$author=" | Author";}
if($album=='on'){$album=" | Gallery";}

$str_type=$editor.$excerpt.$thumnail.$comment.$author.$search.$album;
$str_term='';
for($d=1;$d<=5;$d++){
$khoa_type='taxonomy-type'.$d;
$term_slug=mcp_get_relate_data($mcp_opt->id,$khoa_type);
if($term_slug[0]->giatri !=''){$str_term.=' | '.$term_slug[0]->giatri;}
}
$str_term=substr($str_term,3); ?>
<tr class="inactive">
<td><?php echo $mcp_opt->name;?></td>
<td><?php echo $mcp_opt->custom_type;?></td>
<td>Title<?php echo $str_type;?></td>
<td>
<?php echo ($menu=="on"?"<span class='dashicons dashicons-hidden'></span>":"<span class='dashicons dashicons-visibility'></span>")." Menu<br/>";?>
<?php echo ($search=="on"?"<span class='dashicons dashicons-marker'></span>":"<span class='dashicons dashicons-dismiss'></span>")." Search<br/>";?>
<?php echo ($capability=="on"?"<span class='dashicons dashicons-marker'></span>":"<span class='dashicons dashicons-dismiss'></span>")." Capability<br/>";?>
</td>
<td><?php echo $str_term?></td>
<td>
<a href="admin.php?page=mcp-top-level-handle&act=delete&id=<?php echo $mcp_opt->id;?>" style="color:inherit"><span class="dashicons dashicons-trash"></span></a> 
<a href="admin.php?page=<?php echo $mcp_opt->custom_type;?>" style="color:inherit"><span class="dashicons dashicons-edit"></span></a> 
</td>
</tr>
<?php } ?>
</tbody>
</table>

</div>

<div class="mcp-topm-block">
<table class="wp-list-table widefat fixed striped">
<thead>
<tr>
<th scope="col" class="manage-column column-name column-primary">Name custom post type</th>
<th scope="col" class="manage-column column-description">Custom slug</th>
</tr>
</thead>
<tbody>
<tr>
<td><input type="text" name="name_custom" placeholder="New custom posttype" style="width:100%"/></td>
<td><input type="text" name="type_custom" placeholder="Slug" style="width:100%"/></td>
</tr>
</tbody>
</table>
</div>

<div class="mcp-topm-block">
<table class="wp-list-table widefat fixed striped">
<thead>
<tr>
<td id="cb" class="manage-column column-cb check-column">
<label class="screen-reader-text" for="cb-select-all-1">Select All</label>
<input id="cb-select-all-1" type="checkbox">
</td>
<th scope="col" class="manage-column column-name column-primary">Capality select</th></tr>
</thead>
<tbody>
<?php
$supports = array(
'editor' => 'Editor',
'excerpt' => 'Excerpt',
'thumnail' => 'Thumnail',
'author' => 'Author',
'comments' => 'Comments',
'hide' => 'Don\'t creat Menu',
'search' => 'Allow search',
'album'		=> 'Gallery',
'capability' => 'Enable Capability'
);
foreach($supports as $input => $label){ ?>
<tr valign="middle">
<th scope="row" class="check-column"><label class="screen-reader-text" for="cb-select-2">Select Sample Page</label>
<input id="mcp_<?php echo $input;?>" type="checkbox" name="<?php echo $input;?>"/>
<div class="locked-indicator"></div>
</th>
<td>
<label for="mcp_<?php echo $input;?>"><?php echo $label;?></label>
</td>
</tr>
<?php } //endforeach ?>
</tbody>
</table>
</div>

<div class="tablenav bottom">
<div class="alignleft actions bulkactions">
<input type="hidden" name="page" value="mcp-top-level-handle" />
<input type="hidden" name="act" value="insert" />
<input type="submit" class="button-primary" value="<?php _e('New custom post type') ?>" />
</div>
</div>
    
</form>
<?php
}
elseif($_REQUEST['act']== 'insert'){
$name_custom=$_REQUEST['name_custom'];
$type_custom=$_REQUEST['type_custom'];
$editor=$_REQUEST['editor'];
$excerpt=$_REQUEST['excerpt'];
$thumnail=$_REQUEST['thumnail'];
$author=$_REQUEST['author'];
$comments=$_REQUEST['comments'];
$hide=$_REQUEST['hide'];
$search=$_REQUEST['search'];
$album=$_REQUEST['album'];
$capability=$_REQUEST['capability'];
$optionID=mcp_isert_data($name_custom,$type_custom,$editor,$excerpt,$thumnail,$author,$comments,$hide,$search,$album,$capability);
if ($optionID){
//wp_redirect('admin.php?page=mcp-top-level-handle&noheader=true');
echo '<script type="text/javascript">window.location = "admin.php?page=mcp-top-level-handle";</script>';
}
}
elseif($_REQUEST['act']== 'delete'){
$optionID=$_REQUEST['id'];
$result=mcp_delete_data($optionID);
if ($result>0){
mcp_relate_delete_data($optionID);
//wp_redirect('admin.php?page=mcp-top-level-handle&noheader=true');
echo '<script type="text/javascript">window.location = "admin.php?page=mcp-top-level-handle"; </script>';
}
}
?>
</div>