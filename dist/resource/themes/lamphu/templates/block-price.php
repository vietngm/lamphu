<?php
        $gia=get_post_meta($post->ID,'gia-sp');
        $pattern="/[0-9]*/";
        preg_match($pattern, $gia[0], $gia1);
        if($gia1[0] != ''){
            $gia_str=number_format($gia1[0], 0, ',', '.');
            $gia_str.= ' vnđ';
        }
        else{
            $gia_str= 'Liên hệ';
        }
?>