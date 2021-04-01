<div class="wrap">
<?php
global $wpdb;
list($option)=get_option_by_type($_REQUEST['page']);
?>
<div class="updated notice notice-success is-dismissible" style="margin-top:25px;font-size:18px;line-height:36px;text-transform:uppercase">
<span><strong>Add extra field custom Taxonomy</strong></span>
<span style="margin:0px 10px 0px 10px">|</span>
<span>Custom Post Type: <strong><?php echo $option->name;?></strong></span>
<span style="margin:0px 10px 0px 10px">|</span>
<span>Taxonomy: <strong><?php echo $_REQUEST['term'];?></strong></span>
<span style="float:right"><a href="?page=<?php echo $_REQUEST['page']?>" style="text-decoration: none;">Back</a></span>
</div>
<?php
if(!isset($_REQUEST['action'])){
?>
<form method="post" action="">
<div class="mcp-topm-block">
<table class="wp-list-table widefat striped">
<thead><tr><td id="cb" class="manage-column column-cb check-column">
<label class="screen-reader-text" for="cb-select-all-1">Select All</label>
<input id="cb-select-all-1" type="checkbox">
</td>
<th scope="col" class="manage-column column-name column-primary"><div>Supports</div></th></tr></thead>
<tbody >
<?php
$supports = array(
'editor' => 'Editor',
'excerpt' => 'Excerpt',
'thumnail' => 'Thumnail',
'author' => 'Author',
'comment' => 'Comments',
'hidemenu' => 'Don\'t creat Menu',
'search' => 'Allow search',
'album' => 'Gallery',
'capability' => 'Enable Capability'
);
foreach($supports as $input => $label){ 
?>
<tr valign="middle" class="inactive">
<th scope="row" class="check-column"><label class="screen-reader-text" for="cb-select-2">Select Sample Page</label>
<input id="mcp_<?php echo $input;?>" type="checkbox" name="<?php echo $input;?>" <?php echo ($option->{$input}=="on")?" checked='checked'":"";?>/>
<div class="locked-indicator"></div>
</th>
<td><label for="mcp_<?php echo $input;?>"><?php echo $label;?></label></td>
</tr>
<?php } //endforeach ?>
</tbody>
</table>
</div>

<div class="mcp-topm-block">
<table class="wp-list-table widefat striped">
<thead>
<tr>
<th></th>
<th><div>Name Taxonomy</div></th>
<th><div>Type Taxonomy</div></th>
<th><div>Capability</div></th>
<th><div>isTag</div></th>
<th><div>Taxonomy field</div></th>
</tr>
</thead>			
<tbody>
<?php for($i=1;$i<=10;$i++){
$giatri_name='';
$giatri_type='';
$khoa_name='taxonomy-name'.$i;
$khoa_type='taxonomy-type'.$i;
$khoa_manager = 'taxonomy-manager'.$i;
$khoa_isTag = 'taxonomy-isTag'.$i;

$giatri_name=mcp_get_relate_data($option->id,$khoa_name);
$giatri_type=mcp_get_relate_data($option->id,$khoa_type);
$giatri_manager =mcp_get_relate_data($option->id,$khoa_manager);
$giatri_isTag =mcp_get_relate_data($option->id,$khoa_isTag);
?>
<tr class="custom-field-block inactive">
<td><div class="tax-label">Tax <?php echo $i;?>:</div></td>
<td><input type="text" name="<?php echo $khoa_name;?>" value="<?php echo $giatri_name[0]->giatri;?>"/></td>
<td><input type="text" name="<?php echo $khoa_type;?>" value="<?php echo $giatri_type[0]->giatri;?>"/></td>
<td><input type="checkbox" name="<?php echo $khoa_manager;?>" <?php echo ($giatri_manager[0]->giatri=='on')?" checked='checked'":"";?> value="<?php echo $giatri_manager[0]->giatri;?>" /></td>
<td><input type="checkbox" name="<?php echo $khoa_isTag;?>" <?php echo ($giatri_isTag[0]->giatri=='on')?" checked='checked'":"";?> value="<?php echo $giatri_isTag[0]->giatri;?>" /></td>
<?php if($giatri_name[0]->giatri !='') {
$term_option_id=get_option_term_id($giatri_type[0]->giatri); ?>
<td>            
<a href="?page=<?php echo $_REQUEST['page']?>&term=<?php echo $giatri_type[0]->giatri?>&action=edit_term">Add Field</a><?php
$str_span='';
for( $t=1;$t<=30;$t++){                
$key_term_field_name='field_term_'.$term_option_id[0]->id.'_name'.$t;
$giatri_term_field_name=mcp_get_relate_data($option->id,$key_term_field_name);
if($giatri_term_field_name[0]->giatri !=''){
$str_span.= ','.$giatri_term_field_name[0]->giatri;
}
}
$str_span=substr($str_span,1);
?>            
<span>( <?php echo $str_span;?> )</span>
</td>
<?php
} //endif;
else{echo '<td>---</td>';}
?>
</tr>

<?php } //endfor; ?>
</tbody>
</table>
</div>

<div class="mcp-topm-block">
<table class="wp-list-table widefat striped">
<thead>
<tr>
<th scope="col"></th>
<th scope="col"><div>Name Field</div></th>
<th scope="col"><div>Custom Type Field</div></th>
<th scope="col"><div>Type Field</div></th>
<th scope="col"><div>Name Post</div></th>
<th scope="col"><div>View</div></th>
</tr>
</thead>			
<tbody>
<?php
for($i=1;$i<=25;$i++){
$field_name='field-name'.$i;
$field_custom_type='field-custom-type'.$i;
$field_type='field-type'.$i;
$field_check='field-view'.$i;
$field_name_post_type='field-name-post-type'.$i;
$field_name_taxonomy_type='field-name-taxonomy-type'.$i;

$giatri_field_name=mcp_get_relate_data($option->id,$field_name);
$giatri_field_custom_type=mcp_get_relate_data($option->id,$field_custom_type);
$giatri_field_type=mcp_get_relate_data($option->id,$field_type);
$giatri_field_check=mcp_get_relate_data($option->id,$field_check);
$giatri_field_name_post_type=mcp_get_relate_data($option->id,$field_name_post_type);
$giatri_field_name_taxonomy_type=mcp_get_relate_data($option->id,$field_name_taxonomy_type);

for($a=1;$a<=14;$a++){
$select='';
if($giatri_field_type[0]->giatri == $a){
$select[$a]='selected="selected"';
break;
}
}
?>
<tr class="inactive custom-field-block">
<td class="title">Field <?php echo $i;?>:</td>
<td><input type="text" name="<?php echo $field_name;?>" value="<?php echo $giatri_field_name[0]->giatri;?>" /></td>
<td><input type="text" name="<?php echo $field_custom_type;?>" value="<?php echo $giatri_field_custom_type[0]->giatri;?>" /></td>

<td>
<select onchange="check_disable(this,<?php echo $i;?>);"  name="<?php echo $field_type;?>">
<option value="1" <?php echo $select['1'];?>>Text Box</option>
<option value="2" <?php echo $select['2'];?>>Text Box Number</option>
<option value="3" <?php echo $select['3'];?>>Text Area</option>
<option value="4" <?php echo $select['4'];?>>Text Editor</option>
<option value="5" <?php echo $select['5'];?>>Drop List Custom Post Type</option>
<option value="8" <?php echo $select['8'];?>>Drop List Taxonomy</option>
<option value="6" <?php echo $select['6'];?>>Check Box</option>
<option value="7" <?php echo $select['7'];?>>Upload Image</option>
<option value="9" <?php echo $select['9'];?>>Upload File</option>
<option value="10" <?php echo $select['10'];?>>Date</option>
<option value="11" <?php echo $select['11'];?>>Datetime</option>
<option value="12" <?php echo $select['12'];?>>Random string</option>
<option value="13" <?php echo $select['13'];?>>Color picker</option>
<option value="14" <?php echo $select['14'];?>>Hidden</option>
</select>
</td>
<td>
<?php if($giatri_field_name_post_type[0]->giatri != ''){
?>
<input type="text" id="<?php echo $field_name_post_type;?>" name="<?php echo $field_name_post_type;?>" value="<?php echo $giatri_field_name_post_type[0]->giatri;?>" />
<?php
}
elseif($giatri_field_name_taxonomy_type[0]->giatri != ''){
?>
<input type="text" id="<?php echo $field_name_post_type;?>" name="<?php echo $field_name_taxonomy_type;?>" value="<?php echo $giatri_field_name_taxonomy_type[0]->giatri;?>" />
<?php
}
else
{
?>
<input type="text" id="<?php echo $field_name_post_type;?>" name="<?php echo $field_name_post_type;?>" value="" disabled="disable" />
<?php
}
?>
</td>
<td class="checkbox">
<?php
if($giatri_field_check[0]->giatri != ''){
?>
<input name="<?php echo $field_check;?>" type="checkbox" checked="checked" />
<?php
}
else{
?>
<input name="<?php echo $field_check;?>" type="checkbox" />
<?php
}
?>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<input type="hidden" name="act" value="save" />
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</form>
<?php
if( isset($_REQUEST['act'])){
if($_REQUEST['act']=='save'){
// Update supports
$new_data = array();
foreach($supports as $key => $value){
$new_data[$key] = (isset($_REQUEST[$key]) && $_REQUEST[$key]=="on")?"on":"";
}
$wpdb->update($table_name,$new_data, array('id' => $option->id ));
for($i=1;$i<=10;$i++){
$giatri_name='';
$giatri_type='';
$khoa_name='taxonomy-name'.$i;
$giatri_name=$_REQUEST['taxonomy-name'.$i];

$khoa_type='taxonomy-type'.$i;
$giatri_type=$_REQUEST['taxonomy-type'.$i];

$khoa_manager='taxonomy-manager'.$i;
$giatri_manager=isset($_REQUEST['taxonomy-manager'.$i])?"on":"off";

$khoa_isTag='taxonomy-isTag'.$i;
$giatri_isTag=isset($_REQUEST['taxonomy-isTag'.$i])?"on":"off";

$old_name=mcp_get_relate_data($option->id,$khoa_name);
$old_type=mcp_get_relate_data($option->id,$khoa_type);
$old_manager=mcp_get_relate_data($option->id,$khoa_manager);
$old_isTag=mcp_get_relate_data($option->id,$khoa_isTag);

if(($giatri_name !='')&&($giatri_type != '')){
if($giatri_name != $old_name[0]->giatri){
mcp_delete_relate_data($option->id,$khoa_name);
mcp_isert_relate_data($option->id,$khoa_name,$giatri_name);
}
if($giatri_type != $old_type[0]->giatri){
mcp_delete_relate_data($option->id,$khoa_type);
mcp_isert_relate_data($option->id,$khoa_type,$giatri_type);
}

if($giatri_manager != $old_manager[0]->giatri){
mcp_delete_relate_data($option->id,$khoa_manager);
mcp_isert_relate_data($option->id,$khoa_manager,$giatri_manager);
}

if($giatri_isTag != $old_isTag[0]->giatri){
mcp_delete_relate_data($option->id,$khoa_isTag);
mcp_isert_relate_data($option->id,$khoa_isTag,$giatri_isTag);
}
}
else{
mcp_delete_relate_data($option->id,$khoa_name);
mcp_delete_relate_data($option->id,$khoa_type);
mcp_delete_relate_data($option->id,$khoa_manager);
mcp_delete_relate_data($option->id,$khoa_isTag);
}
}
for ($a=1;$a<=25;$a++){
$giatri_field_name='';
$giatri_field_custom_type='';
$giatri_field_type='';
$giatri_field_check='';
$giatri_field_name_post_type='';
$giatri_field_name_taxonomy_type='';
$khoa_field_name='field-name'.$a;
$khoa_field_custom_type='field-custom-type'.$a;
$khoa_field_type='field-type'.$a;
$khoa_field_check='field-view'.$a;
$khoa_field_name_post_type='field-name-post-type'.$a;
$khoa_field_name_taxonomy_type='field-name-taxonomy-type'.$a;

$giatri_field_name=$_REQUEST['field-name'.$a];
$giatri_field_custom_type=$_REQUEST['field-custom-type'.$a];
$giatri_field_type=$_REQUEST['field-type'.$a];
$giatri_field_check=$_REQUEST['field-view'.$a];
$giatri_field_name_post_type=$_REQUEST['field-name-post-type'.$a];
$giatri_field_name_taxonomy_type=$_REQUEST['field-name-taxonomy-type'.$a];

$old_name=mcp_get_relate_data($option->id,$khoa_field_name);
$old_custom_type=mcp_get_relate_data($option->id,$khoa_field_custom_type);
$old_type=mcp_get_relate_data($option->id,$khoa_field_type);
$old_view=mcp_get_relate_data($option->id,$khoa_field_check);
$old_name_post_type=mcp_get_relate_data($option->id,$khoa_field_name_post_type);
$old_name_taxonomy_type=mcp_get_relate_data($option->id,$khoa_field_name_taxonomy_type);
if(($giatri_field_name !='')){
if($giatri_field_name != $old_name[0]->giatri){
mcp_delete_relate_data($option->id,$khoa_field_name);
mcp_isert_relate_data($option->id,$khoa_field_name,$giatri_field_name);                        
}
if($giatri_field_custom_type != $old_custom_type[0]->giatri){
mcp_delete_relate_data($option->id,$khoa_field_custom_type);
mcp_isert_relate_data($option->id,$khoa_field_custom_type,$giatri_field_custom_type);                        
}
if(($giatri_field_type != '5')&&($giatri_field_type != '8')){
if($giatri_field_type != $old_type[0]->giatri){
mcp_delete_relate_data($option->id,$khoa_field_type);
mcp_isert_relate_data($option->id,$khoa_field_type,$giatri_field_type);
mcp_delete_relate_data($option->id,$khoa_field_name_post_type);
}
}
else{
if($giatri_field_type != $old_type[0]->giatri){
mcp_delete_relate_data($option->id,$khoa_field_type);
mcp_isert_relate_data($option->id,$khoa_field_type,$giatri_field_type);
if(($giatri_field_name_post_type !='')&&($giatri_field_name_post_type != $old_name_post_type))
{
mcp_delete_relate_data($option->id,$khoa_field_name_post_type);
mcp_isert_relate_data($option->id,$khoa_field_name_post_type,$giatri_field_name_post_type);
if($old_name_taxonomy_type != ''){
mcp_delete_relate_data($option->id,$khoa_field_name_taxonomy_type);
}
}
elseif($giatri_field_name_post_type ==''){
mcp_delete_relate_data($option->id,$khoa_field_name_post_type);
if(($giatri_field_name_taxonomy_type !='')&&($giatri_field_name_taxonomy_type != $old_name_taxonomy_type)){
mcp_delete_relate_data($option->id,$khoa_field_name_taxonomy_type);
mcp_isert_relate_data($option->id,$khoa_field_name_taxonomy_type,$giatri_field_name_taxonomy_type);
}
elseif($giatri_field_name_taxonomy_type ==''){
mcp_delete_relate_data($option->id,$khoa_field_name_taxonomy_type);
}
}
}
else{
if(($giatri_field_name_post_type !='')&&($giatri_field_name_post_type != $old_name_post_type)){
mcp_delete_relate_data($option->id,$khoa_field_name_post_type);
mcp_isert_relate_data($option->id,$khoa_field_name_post_type,$giatri_field_name_post_type);
if($old_name_taxonomy_type != ''){
mcp_delete_relate_data($option->id,$khoa_field_name_taxonomy_type);
}
}
elseif($giatri_field_name_post_type ==''){
mcp_delete_relate_data($option->id,$khoa_field_name_post_type);
if(($giatri_field_name_taxonomy_type !='')&&($giatri_field_name_taxonomy_type != $old_name_taxonomy_type)){
mcp_delete_relate_data($option->id,$khoa_field_name_taxonomy_type);
mcp_isert_relate_data($option->id,$khoa_field_name_taxonomy_type,$giatri_field_name_taxonomy_type);
}
elseif($giatri_field_name_taxonomy_type ==''){
mcp_delete_relate_data($option->id,$khoa_field_name_taxonomy_type);
}
}
}
}

if($giatri_field_check != $old_view[0]->giatri){
if($giatri_field_check == ''){
mcp_delete_relate_data($option->id,$khoa_field_check);
}
else{
mcp_delete_relate_data($option->id,$khoa_field_check);
mcp_isert_relate_data($option->id,$khoa_field_check,$giatri_field_check);
}                        
}
}
else{
mcp_delete_relate_data($option->id,$khoa_field_name);
mcp_delete_relate_data($option->id,$khoa_field_custom_type);
mcp_delete_relate_data($option->id,$khoa_field_type);
mcp_delete_relate_data($option->id,$khoa_field_check);
mcp_delete_relate_data($option->id,$khoa_field_name_post_type);
}
}
wp_redirect(wp_get_referer());
}
}
}
else{
$term_option_id=get_option_term_id($_REQUEST['term']);    
?>
<form method="post" action="">   
<table class="wp-list-table widefat striped"> 
<thead class="custom-field-block">
<tr>
<th scope="col">&nbsp;</th>
<th scope="col">Name Field</th>
<th scope="col">Custom Type Field</th>
<th scope="col">Type Field</th>
</tr>
</thead>

<tbody>
<?php    
if($_REQUEST['save_term']=='save'){
for($a=1;$a<=30;$a++){                    
$giatri_field_term_name='';
$giatri_field_term_slug='';
$giatri_field_term_type='';

$key_term_name='field_term_'.$term_option_id[0]->id.'_name'.$a;
$key_term_slug='field_term_'.$term_option_id[0]->id.'_slug'.$a;
$key_term_type='field_term_'.$term_option_id[0]->id.'_type'.$a;

$giatri_field_term_name=$_REQUEST['field_term_'.$term_option_id[0]->id.'_name'.$a];
$giatri_field_term_slug=$_REQUEST['field_term_'.$term_option_id[0]->id.'_slug'.$a];
$giatri_field_term_type=$_REQUEST['field_term_'.$term_option_id[0]->id.'_type'.$a];

$old_name=mcp_get_relate_data($option->id,$key_term_name);
$old_term_slug=mcp_get_relate_data($option->id,$key_term_slug);
$old_term_type=mcp_get_relate_data($option->id,$key_term_type);

if(($giatri_field_term_name !='')){
if($giatri_field_term_name != $old_name[0]->giatri){
mcp_delete_relate_data($option->id,$key_term_name);
mcp_isert_relate_data($option->id,$key_term_name,$giatri_field_term_name);                        
}
if($giatri_field_term_slug != $old_term_slug[0]->giatri){
mcp_delete_relate_data($option->id,$key_term_slug);
mcp_isert_relate_data($option->id,$key_term_slug,$giatri_field_term_slug);                        
}                                 
if($giatri_field_term_type != $old_term_type[0]->giatri){
mcp_delete_relate_data($option->id,$key_term_type);
mcp_isert_relate_data($option->id,$key_term_type,$giatri_field_term_type);
}

}
else{
mcp_delete_relate_data($option->id,$key_term_name);
mcp_delete_relate_data($option->id,$key_term_slug);
mcp_delete_relate_data($option->id,$key_term_type);
}
}
echo '<script type="text/javascript">window.location = "admin.php?page='.$option->custom_type.'&term='.$_REQUEST['term'].'&action=edit";</script>';
}
else{    
for($i=1;$i<=30;$i++){
$f_term_name='field_term_'.$term_option_id[0]->id.'_name'.$i;
$f_term_slug='field_term_'.$term_option_id[0]->id.'_slug'.$i;
$f_term_type='field_term_'.$term_option_id[0]->id.'_type'.$i;

$giatri_field_term_name=mcp_get_relate_data($option->id,$f_term_name);
$giatri_field_term_slug=mcp_get_relate_data($option->id,$f_term_slug);
$giatri_field_term_type=mcp_get_relate_data($option->id,$f_term_type);

for($a=1;$a<=10;$a++){
$select='';
if($giatri_field_term_type[0]->giatri == $a){
$select[$a]='selected="selected"';
break;
}
}
?>  
<tr class="inactive custom-field-block">  
<td class="title">Field <?php echo $i;?>:</td>
<td><input type="text" name="<?php echo $f_term_name;?>" value="<?php echo $giatri_field_term_name[0]->giatri;?>" /></td>
<td><input type="text" name="<?php echo $f_term_slug;?>" value="<?php echo $giatri_field_term_slug[0]->giatri;?>" /></td>        
<td>
<select name="<?php echo $f_term_type;?>">
<option value="1" <?php echo $select['1'];?>>Text Box</option>                
<option value="2" <?php echo $select['2'];?>>Text Area</option>
<option value="3" <?php echo $select['3'];?>>Check Box</option>                
<option value="4" <?php echo $select['4'];?>>Date</option>
<option value="5" <?php echo $select['5'];?>>Time</option>
<option value="6" <?php echo $select['6'];?>>Color</option>
<option value="7" <?php echo $select['7'];?>>Upload Images</option>
<option value="8" <?php echo $select['8'];?>>Upload File</option>
</select>
</td>
</tr>
<?php
}
}
?>
</tbody>
</table>      
<div class="tablenav bottom">
<div class="alignleft actions bulkactions">
<input type="hidden" name="save_term" value="save" />
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />    
</div>
</div>
</form>
<?php }ob_flush(); ?>
</div>