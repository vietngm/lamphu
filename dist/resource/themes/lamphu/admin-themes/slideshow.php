<?php
function slideshow()
{
    $slide = array();
    $slide['w_thumb'] = get_option('binfo[bannerwidth_thumb]');
    $slide['h_thumb'] = get_option('binfo[bannerheight_thumb]');
    $slide['w_large'] = get_option('binfo[bannerwidth]');
    $slide['h_large'] = get_option('binfo[bannerheight]');
    $slide['slide_array'] = explode(',', get_option('binfo[arr_banner]'));
    if (get_option('binfo[show_control]') == 1) {
        $slide['control'] = 'true';
    } else {
        $slide['control'] = 'false';
    }

    $slide['shadow'] = get_option('binfo[show_shadow]');
    $slide['effect'] = get_option('binfo[op_effect]');
    return $slide;
}
function is_banner($slide, $sl, $w, $h)
{
    foreach ($slide as $arr) {
        $op_bn = get_option('binfo[op_banner_' . $arr . ']');
        if ($op_bn == $sl) {
            $gal = get_option('gallery_datas_' . $arr);
            $show_bn = get_option('binfo[hienthi_banner_' . $arr . ']');
            $url = get_option('binfo[bannerurl_' . $arr . ']');
            $title = get_option('binfo[img_title_' . $arr . ']');
            if ($show_bn == 1) {getTemp(1, $w, $h);
                export_slideshow($gal, $url, $w, $h, $title);
                getTemp(2, $w, $h);
                break;}
            break;
        }
    }
}
function getTemp($case, $w, $h)
{
    global $q_config;
$lang = $q_config['language'];
    switch ($case) {
        case 1:
            ?>
<div class="key-visual">
  <div class="loop owl-carousel owl-theme">
    <?php
break;
        case 2:
            ?>
  </div>
</div>
<?php break;}}?>
