<?php
if ( ! class_exists( 'CustomTaxonomySort' ) ) :
class CustomTaxonomySort {
var $control_types;
var $sort_orders;
var $plugin_name = 'custom-taxonomy-sort';
var $options_name = 'custom-taxonomy-sort-settings';
var $orderby_parameter = 'custom_sort';
var $version = 1.1;
function __construct() {
	include(dirname( __FILE__ ).DIRECTORY_SEPARATOR.'includes/sort-term-meta.php' );
	$this->process_class_vars();
	add_action( 'init', array( &$this, 'add_taxonomy_actions' ), 100, 0);
	add_action( 'admin_menu', array( &$this, 'add_settings_actions' ));
	add_action( 'admin_init', array( &$this, 'settings_init' ));
	add_filter( 'get_terms', array( &$this, 'get_terms' ), 10, 3);
	add_filter( 'wp_get_object_terms', array( &$this, 'wp_get_object_terms' ), 10, 4);
	add_filter( 'get_the_terms', array( &$this, 'get_the_terms' ), 10, 3);
	add_filter( 'get_terms_orderby', array( &$this, 'get_terms_orderby' ), 10, 2);
	add_action( 'admin_enqueue_scripts', array( &$this, 'add_admin_scripts' ) );
	add_action( 'admin_init', array( &$this, 'add_quick_edit_action' ));
}
function CustomTaxonomySort() {$this->__construct();}
function process_class_vars() {
	$this->control_types = array(
		array(
			'key' => 'on',
			'value' => __( 'On', $this->plugin_name )
		),
		array(
			'key' => 'off',
			'value' => __( 'Off', $this->plugin_name )
		)
	);
	
	$this->sort_orders = array(
		array(
			'key' => 'ASC',
			'value' => __( 'Ascending', $this->plugin_name )
		),
		array(
			'key' => 'DESC',
			'value' => __( 'Descending', $this->plugin_name )
		)
	);
}	

function add_taxonomy_actions() {
	foreach ( get_taxonomies() as $taxonomy => $name ) {
		add_action( $name.'_add_form_fields', array( &$this, 'metabox_add' ), 10, 1 );
		add_action( $name.'_edit_form_fields', array( &$this, 'metabox_edit' ), 10, 1 );
		add_action( 'created_'.$name, array( &$this, 'save_meta_data' ), 10, 1 );
		add_action( 'edited_'.$name, array( &$this, 'save_meta_data' ), 10, 1 );
		add_filter( "manage_edit-{$name}_columns", array( &$this, 'column_header' ), 10, 1 );
		add_filter("manage_edit-{$name}_sortable_columns", array( &$this, 'column_header_sortable' ), 10, 1);
		add_filter( "manage_{$name}_custom_column", array( &$this, 'column_value' ), 10, 3 );
	}
}

function add_admin_scripts() {
	global $pagenow;
	if ( $pagenow == 'edit-tags.php' ) {
		wp_register_script('custom-taxonomy-sort-js',plugins_url( '/js/custom-taxonomy-sort.js', __FILE__ ),array( 'jquery' ),$this->version	);
		wp_enqueue_script( 'custom-taxonomy-sort-js' );
		//wp_register_style(	'custom-taxonomy-sort-css',	plugins_url( '/css/custom-taxonomy-sort.css', __FILE__ ),false,$this->version,false);
		//wp_enqueue_style( 'custom-taxonomy-sort-css' );
	}
}

function metabox_add( $tag ) {
?>
	<div class="form-field">
		<label for="tax-order"><?php _e( 'Order', $this->plugin_name ) ?></label>
		<input name="tax-order" id="tax-order" type="text" value="" size="40" aria-required="true" />
		<p class="description"><?php _e( 'Determines the order in which the term is displayed.', $this->plugin_name ); ?></p>
	</div>
<?php
} 	

function metabox_edit( $tag ) {
?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="tax-order"><?php _e( 'Order', $this->plugin_name ); ?></label></th>
		<td>
			<input name="tax-order" id="tax-order" type="text" value="<?php echo get_term_meta( $tag->term_id, 'tax-order', true ); ?>" size="40" aria-required="true" />
			<p class="description"><?php _e( 'Determines the order in which the term is displayed.', $this->plugin_name ); ?></p>
		</td>
	</tr>
	</tr>
<?php
}
function save_meta_data( $term_id )	{
	if ( isset( $_POST['tax-order'] ) && is_numeric( $_POST['tax-order'] ) )
		$order = $_POST['tax-order']; 
	elseif ( $current_order = get_term_meta( $term_id, 'tax-order', true ) )
		$order = $current_order;
	else
		$order = 0;		
	update_term_meta( $term_id, 'tax-order', absint( $order ) );
}
function get_terms( $terms, $taxonomies, $args ) {
	if ( $this->get_control_type() == 'off' && $args['orderby'] != $this->orderby_parameter ) return $terms;
	$empty = false;	
	$ordered_terms = array();
	$unordered_terms = array();
	foreach ( $terms as $term ) {
		if ( is_object( $term ) ) {
			if ( $taxonomy_sort = get_term_meta( $term->term_id, 'tax-order', true ) ) {
				$term->tax_order = ( int ) $taxonomy_sort;
				$ordered_terms[] = $term;
			} else {
				$term->tax_order = ( int ) 0;
				$unordered_terms[] = $term;
			}
		}
		else
			$empty = true;
	}		

	if ( ! $empty && count( $ordered_terms ) > 0)
		$this->quickSort( $ordered_terms );
	else
		return $terms;		
	if (
		isset( $args['orderby'] ) &&
		(
			( $args['orderby'] == $this->orderby_parameter && $args['order'] == 'DESC' ) ||
			( $args['orderby'] != $this->orderby_parameter && $this->get_sort_order() == 'DESC' )
		)
	) krsort( $ordered_terms );		
	return array_merge( $ordered_terms, $unordered_terms );
}
function wp_get_object_terms( $terms, $object_ids, $taxonomies, $args ) {return $this->get_terms( $terms, $taxonomies, $args );}
function get_the_terms( $terms, $id, $taxonomy ) {return $this->get_terms( $terms, $taxonomy, $this->orderby_parameter );}
function get_terms_orderby( $orderby, $args ) {
	if ( $orderby == $this->orderby_parameter )
		return '';
	else
		return $orderby;
}
function quickSort( &$array ) {
	$cur = 1;
	$stack[1]['l'] = 0;
	$stack[1]['r'] = count( $array ) - 1;	
	do {
		$l = $stack[$cur]['l'];
		$r = $stack[$cur]['r'];
		$cur--;	
		do {
			$i = $l;
			$j = $r;
			$tmp = $array[ ( int )( ( $l + $r ) / 2 ) ];
		
			do {
				while( $array[$i]->tax_order < $tmp->tax_order )
				$i++;
			
				while( $tmp->tax_order < $array[$j]->tax_order )
				$j--;				

				if (  $i <= $j ) {
					 $w = $array[$i];
					 $array[$i] = $array[$j];
					 $array[$j] = $w;
			
					$i++;
					$j--;
				}
			
			} while ( $i <= $j );
			
			if (  $i < $r ) {
				$cur++;
				$stack[$cur]['l'] = $i;
				$stack[$cur]['r'] = $r;
			}
			$r = $j;
			
		} while ( $l < $r );
			
	} while ( $cur != 0 );
}
function add_settings_actions() {
	add_submenu_page( 'options-general.php', __( 'Custom Taxonomy Sort Settings', $this->plugin_name ), __( 'Taxonomy sort', $this->plugin_name ), 'manage_options', 'custom-taxonomy-sort-settings', array( &$this, 'settings_page' ) );
}
function settings_page() {
?>
	<div class="wrap"> 
	<div id="icon-options-general" class="icon32"><br /></div><h2><?php _e( 'Custom Taxonomy Sort Settings', $this->plugin_name ); ?></h2>
	<form action="options.php" method="post">
	<?php settings_fields( 'custom-taxonomy-sort-settings' ); ?>
	<?php do_settings_sections( 'custom-taxonomy-sort-fields' ); ?>
	<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e( 'Save Changes', $this->plugin_name ); ?>" /></p>
	</form></div>
<?php
}
function settings_init() {
	register_setting( 'custom-taxonomy-sort-settings', $this->options_name, array( &$this, 'settings_validate' ) );
	add_settings_section( 'custom-taxonomy-sort-options', __( 'General', $this->plugin_name ), array( &$this, 'settings_page_text' ), 'custom-taxonomy-sort-fields' );
	add_settings_field( 'custom-taxonomy-sort-control-type', __( 'Automatic Sort', $this->plugin_name ), array( &$this, 'control_type_string' ), 'custom-taxonomy-sort-fields', 'custom-taxonomy-sort-options' );
	add_settings_field( 'custom-taxonomy-sort-orders', __( 'Sort Order', $this->plugin_name ), array( &$this, 'sort_orders_string' ), 'custom-taxonomy-sort-fields', 'custom-taxonomy-sort-options' );
}
function settings_validate( $input ) {
	if ( isset( $input['control_type'] ) ) {
		$valid_control_type = false;
		foreach ( $this->control_types as $key => $value ) {
			if ( $value['key'] == $input['control_type'] ) $valid_control_type = true;
		}
		if ( ! $valid_control_type ) $input['control_type'] = $this->control_type_default[0]['key'];
	}

	if ( isset( $input['sort_order'] ) ){
		$valid_sort_order = false;
		foreach ( $this->sort_orders as $key => $value ) {
			if ( $value['key'] == $input['sort_order'] ) $valid_sort_order = true;
		}
		if ( ! $valid_sort_order ) $input['sort_order'] = $this->sort_orders[0]['key'];
	}
	return $input;
}
function settings_page_text() {
?>
	<p><?php _e( 'Sort Management', $this->plugin_name ); ?></p>
<?php
}
function control_type_string() {
	$current_control_type = $this->get_control_type();
?>
	<fieldset><legend class="screen-reader-text"><span><?php _e( 'Control Type', $this->plugin_name ); ?></span></legend>
	<?php foreach ( $this->control_types as $key => $value ) : ?>
		<label title="<?php echo $value['key']; ?>"><input type="radio" name="custom-taxonomy-sort-settings[control_type]" value="<?php echo $value['key']; ?>" <?php if ( $current_control_type == $value['key'] ) : ?>checked='checked'<?php endif; ?> /> <span><?php echo $value['value']; ?></span></label><br />
	<?php endforeach; ?>
	</fieldset>
<?php
}
function sort_orders_string() {
	$current_control_type = $this->get_sort_order();
?>
	<fieldset><legend class="screen-reader-text"><span><?php _e( 'Sort Order', $this->plugin_name ); ?></span></legend>
	<?php foreach ( $this->sort_orders as $key => $value ) : ?>
		<label title="<?php echo $value['key']; ?>"><input type="radio" name="custom-taxonomy-sort-settings[sort_order]" value="<?php echo $value['key']; ?>" <?php if ( $current_control_type == $value['key'] ) : ?>checked='checked'<?php endif; ?> /> <span><?php echo $value['value']; ?></span></label><br />
	<?php endforeach; ?>
	</fieldset>
<?php
}
function get_control_type() {
	$options = get_option( $this->options_name );
	return $options['control_type'];
}
function get_sort_order() {
	$options = get_option( $this->options_name );
	return $options['sort_order'];
}
function add_quick_edit_action() {
	global $pagenow;
	if ( $pagenow == 'edit-tags.php' )
		add_action( 'quick_edit_custom_box', array( &$this, 'quick_edit_custom_box' ), 10, 3 );
}	
function column_header( $columns ) {
	$columns['order'] = __( 'Order', $this->plugin_name );
	return $columns;
}
function column_header_sortable( $columns ) {
	$columns['order'] = 'order';
	return $columns;
}
function order_clauses( $clauses, $wp_query ) {
	global $wpdb;
	if ( isset( $wp_query->query['orderby'] ) && 'order' == $wp_query->query['orderby'] ) {		
		$clauses['join'] .= "
	LEFT OUTER JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID={$wpdb->term_relationships}.object_id
	LEFT OUTER JOIN {$wpdb->term_taxonomy} USING (term_taxonomy_id)
	LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
	SQL";
	
		$clauses['where'] .= " AND (taxonomy = 'color' OR taxonomy IS NULL)";
		$clauses['groupby'] = "object_id";
		$clauses['orderby']  = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
		$clauses['orderby'] .= ( 'ASC' == strtoupper( $wp_query->get( 'order' ) ) ) ? 'ASC' : 'DESC';
	}	
	return $clauses;
}

function column_value( $empty = '', $custom_column, $term_id ) {
	if ( 'order' == $custom_column )
		return get_term_meta( $term_id, 'tax-order', true );
}
function quick_edit_custom_box( $column_name, $screen, $name ) {
	if ( $column_name == 'order' ) :
?>
	<fieldset><div class="inline-edit-col">
		<label>
			<span class="title"><?php _e( 'Order' ); ?></span>
			<span class="input-text-wrap"><input type="text" name="tax-order" class="ptitle" value=""></span>
		</label>
	</div></fieldset>
<?php endif;
}
}
else :
exit(__( 'Class CustomTaxonomySort already exists.', 'custom-taxonomy-sort' ) );
endif;
$CustomTaxonomySort = new CustomTaxonomySort();
?>