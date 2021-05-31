<?php
function get_all_tax()
{
    $taxList = get_taxonomies();
    unset($taxList['post_tag']);
    unset($taxList['category']);
    unset($taxList['nav_menu']);
    unset($taxList['link_category']);
    unset($taxList['post_format']);

    return $taxList;
}

function get_current_slug()
{
    $taxList = get_all_tax();
    foreach ($taxList as $tax) {
        if (get_query_var($tax) != '') {
            return $tax;
            break;
        }
    }
}

function get_all_custom_slug()
{
    $html = '';
    $html .= '<option value="chon-chuyen-muc-banner">Chọn chuyên mục banner</option>';
    $html .= '<option value="trang-chu">Trang chủ</option>';
    $terms = get_all_tax();
    $post_types = get_post_types();
    foreach ($terms as $term) {
        $the_tax = get_taxonomy($term);
        $term_child = get_terms($term, array('orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0));
        foreach ($term_child as $child) //$html.= '<option value="'.$term.'">'.$the_tax->labels->name.'</option>';
        {
            $html .= '<option value="' . $child->slug . '">' . $child->name . '</option>';
        }

    }

    unset($post_types['attachment']);
    unset($post_types['revision']);
    unset($post_types['nav_menu_item']);
    unset($post_types['mediapage']);
    unset($post_types['page']);
    unset($post_types['post']);

    $args = array(
        'sort_order' => 'ASC',
        'sort_column' => 'post_title',
        'hierarchical' => 1,
        'exclude' => '',
        'include' => '',
        'meta_key' => '',
        'meta_value' => '',
        'authors' => '',
        'child_of' => 0,
        'parent' => -1,
        'exclude_tree' => '',
        'number' => '',
        'offset' => 0,
        'post_type' => 'page',
        'post_status' => 'publish',
    );
    $pages = get_pages($args);

    foreach ($post_types as $post_type) {
        $html .= '<option value="' . $post_type . '">' . get_post_type_object($post_type)->labels->singular_name . '</option>';
    }

    for ($i = 0; $i < count($pages); $i++) {
        $status = get_post_meta($pages[$i]->ID, 'op_hide', true);
        if ($status == 'off' || $status == '') {
            $html .= '<option value="' . $pages[$i]->post_name . '">' . $pages[$i]->post_title . '</option>';
        }
    }

    return $html;
}

function get_all_custom_select_slug($value)
{
    $html = '';
    $html .= '<option value="chon-chuyen-muc-banner">Chọn chuyên mục banner</option>';
    if ($value == 'trang-chu') {
        $html .= '<option value="trang-chu" selected="selected">Trang chủ</option>';
    } else {
        $html .= '<option value="trang-chu">Trang chủ</option>';
    }
    $terms = get_all_tax();
    $post_types = get_post_types();

    foreach ($terms as $term) {
        $the_tax = get_taxonomy($term);
        $term_child = get_terms($term, array('orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0));
        foreach ($term_child as $child) {
            if ($child->slug == $value) {
                //$html.= '<option value="'.$term.'" selected="selected">'.$the_tax->labels->name.'</option>';
                $html .= '<option value="' . $child->slug . '" selected="selected">' . $child->name . '</option>';
            } else {
                //$html.= '<option value="'.$term.'">'.$the_tax->labels->name.'</option>';
                $html .= '<option value="' . $child->slug . '">' . $child->name . '</option>';
            }
        }
    }
    unset($post_types['attachment']);
    unset($post_types['revision']);
    unset($post_types['nav_menu_item']);
    unset($post_types['mediapage']);
    unset($post_types['page']);
    unset($post_types['post']);
    $args = array(
        'sort_order' => 'ASC',
        'sort_column' => 'post_title',
        'hierarchical' => 1,
        'exclude' => '',
        'include' => '',
        'meta_key' => '',
        'meta_value' => '',
        'authors' => '',
        'child_of' => 0,
        'parent' => -1,
        'exclude_tree' => '',
        'number' => '',
        'offset' => 0,
        'post_type' => 'page',
        'post_status' => 'publish',
    );
    $pages = get_pages($args);
    foreach ($post_types as $post_type) {
        if ($post_type == $value) {
            $html .= '<option value="' . $post_type . '" selected="selected">' . get_post_type_object($post_type)->labels->singular_name . '</option>';
        } else {
            $html .= '<option value="' . $post_type . '">' . get_post_type_object($post_type)->labels->singular_name . '</option>';
        }
    }
    for ($i = 0; $i < count($pages); $i++) {
        $status = get_post_meta($pages[$i]->ID, 'op_hide', true);
        if ($status == 'off' || $status == '') {
            if ($pages[$i]->post_name == $value) {
                $html .= '<option value="' . $pages[$i]->post_name . '" selected="selected">' . $pages[$i]->post_title . '</option>';
            } else {
                $html .= '<option value="' . $pages[$i]->post_name . '">' . $pages[$i]->post_title . '</option>';
            }
        }
    }

    return $html;
}

//--------------------------------------------------------------------
function export_slideshow($gal, $url, $w, $h, $title)
{
    if ($gal != '') {
        $list_gallery = $gal;
        $list_gallery = str_replace('},', '};', $list_gallery);
        $_list = explode(';', $list_gallery);

        if (!empty($_list) && $_list > 0) {
            foreach ($_list as $key) {
                $_key = json_decode($key);
                $num = $_key->key;
                $o = $_key->attach_id;
                $order = $_key->order;
                $img = wp_get_attachment_image_src($o, 'slideshow_large');
                ?>
<div class="item">
  <figure>
    <img class="owl-lazy" data-src="<?php echo $img[0]; ?>" alt="Lam Phu" title="Lam Phu">
  </figure>
</div>
<?php
            }
        }
    }
    add_action('wp_footer', 'script_slideshow');
}

//--------------------------------------------------------------------
function script_slideshow()
{
    ?>
<script>
jQuery(document).ready(function($) {
  $('.loop').owlCarousel({
    center: false,
    items: 1,
    loop: true,
    lazyLoad: true,
    nav: false,
    dots: true,
    responsiveClass: true,
    responsiveRefreshRate: true,
    autoplay: true,
    responsive: {
      768: {
        items: 1,
        margin: 0
      },
      960: {
        items: 1,
        margin: 0
      },
      1200: {
        items: 1,
        margin: 0
      },
      1920: {
        items: 1,
        margin: 0
      }
    }
  });
});
</script>

<?php } ?>
