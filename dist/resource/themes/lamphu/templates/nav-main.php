<div align="center">
<?php
global $the_query, $wp_rewrite;
$paged = (get_query_var('page'))?get_query_var('page'):1;
if(is_home())
$max_page = $temp_query;
else
$max_page = $the_query->max_num_pages;
?>
<nav class="pagination" align="right">
 <?php echo paginate_links(array(
    'base' => $wp_rewrite->using_permalinks()?user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%', 'paged' ):@add_query_arg('page','%#%'),
    'format' => '',
    'current' => $paged,
	'show_all' => false,
    'end_size' => 3,
    'mid_size' => 2,
    'total' =>$max_page,
    'type' => 'list',
	'prev_next' => true,
    'prev_text' => '«',
    'next_text' => '»',
));?>
</nav>
</div>