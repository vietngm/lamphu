<?php
echo '<tr>','<th class="seo-label"><label>', $field['name'], '</label></th>','<td>';
switch ($field['type']) {
case 'text':
echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" style="width:100%;" />',$field['desc'];
break;
case 'file':echo '<input type="file" name="', $field['id'], '" id="', $field['id'], '"  />',$field['desc'];break;
case 'textarea':
echo '<textarea name="', $field['id'], '" id="', $field['id'], '" class="meta-textarea">', $meta ? $meta : $field['std'], '</textarea>',$field['desc'];
break;
case 'select':
echo '<select name="', $field['id'], '" id="', $field['id'], '">';
foreach ($field['options'] as $option) {echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';}
echo '</select>';
break;
case 'statusOrder':
?>
<select name="drop-orders-info" id="drop-orders-info" data-id="<?php echo $post->ID;?>">
<option value="new-orders" data-color="c70031" <?php echo($sOrder=="New orders" ? 'selected="selected"':'');?>>New orders</option>
<option value="wait-delivery" data-color="F5DA0C" <?php echo($sOrder=="Wait delivery" ? 'selected="selected"':'');?>>Wait delivery</option>
<option value="delivered" data-color="00C711" <?php echo($sOrder=="Delivered" ? 'selected="selected"':'');?>>Delivered</option>
</select>
<label style="background-color:#<?php echo $color; ?>" class="colorStatus"></label>
<?php
break;
case 'radio':
foreach ($field['options'] as $option) {
echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
}
break;
case 'checkbox':
echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
break;

case 'customerListOrder':
echo '<div name="', $field['id'], '" id="', $field['id'], '">', $meta ? $meta : $field['std'], '</div>',$field['desc'];
break;
case 'label':
echo '<label name="', $field['id'], '" id="', $field['id'], '">', $meta ? $meta : $field['std'], '</label>',$field['desc'];
break;
}
echo '</td>','</tr>';
?>