<?php
add_action( 'init', 'simple_post_meta_define_table' );
function simple_post_meta_define_table() {
	global $wpdb;
	$wpdb->termmeta = $wpdb->prefix . 'termmeta';
}

/*function update_termmeta_cache($term_ids) {
	return update_meta_cache('term', $term_ids);
}

function add_term_meta( $term_id, $meta_key, $meta_value, $unique = false ) {
	return add_metadata('term', $term_id, $meta_key, $meta_value, $unique);
}

function delete_term_meta( $term_id, $meta_key, $meta_value = '' ) {
	return delete_metadata('term', $term_id, $meta_key, $meta_value);
}

function get_term_meta( $term_id, $key, $single = false ) {
	return get_metadata('term', $term_id, $key, $single);
}

function update_term_meta( $term_id, $meta_key, $meta_value, $prev_value = '' ) {
	return update_metadata('term', $term_id, $meta_key, $meta_value, $prev_value);
}*/

function delete_term_meta_by_key($term_meta_key) {
	if ( !$term_meta_key )
		return false;

	global $wpdb;
	$term_ids = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT term_id FROM $wpdb->termmeta WHERE meta_key = %s", $term_meta_key));
	if ( $term_ids ) {
		$termmetaids = $wpdb->get_col( $wpdb->prepare( "SELECT meta_id FROM $wpdb->termmeta WHERE meta_key = %s", $term_meta_key ) );
		$in = implode( ',', array_fill(1, count($termmetaids), '%d'));
		do_action( 'delete_termmeta', $termmetaids );
		$wpdb->query( $wpdb->prepare("DELETE FROM $wpdb->termmeta WHERE meta_id IN($in)", $termmetaids ));
		do_action( 'deleted_termmeta', $termmetaids );
		foreach ( $term_ids as $term_id )
			wp_cache_delete($term_id, 'term_meta');
		return true;
	}
	return false;
}

function get_term_custom( $term_id ) {
	$term_id = (int) $term_id;
	if ( ! wp_cache_get($term_id, 'term_meta') )
		update_termmeta_cache($term_id);

	return wp_cache_get($term_id, 'term_meta');
}

function get_term_custom_keys( $term_id ) {
	$custom = get_term_custom( $term_id );
	if ( !is_array($custom) )
		return;

	if ( $keys = array_keys($custom) )
		return $keys;
}

function get_term_custom_values( $key = '', $term_id ) {
	if ( !$key )
		return null;

	$custom = get_term_custom($term_id);
	return isset($custom[$key]) ? $custom[$key] : null;
}
?>