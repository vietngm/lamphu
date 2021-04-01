<?php
$myposts = get_post(37);

$mail=get_post_meta(37,'mail');
$fax=get_post_meta(37,'fax');
$diachi=get_post_meta(37,'dia-chi');
$dienthoai=get_post_meta(37,'dien-thoai');	
$mobile=get_post_meta(37,'mobile');	
$tencongty=get_post_meta(37,'ten-cong-ty');
$hotline=get_post_meta(37,'hotline');
$copy=get_post_meta(37,'copy');
$facebook=get_post_meta(37,'facebook');
$design=get_post_meta(37,'design');
$toadox=get_post_meta(37,'toa-do-x');
$toadoy=get_post_meta(37,'toa-do-y');
$diachigmap=get_post_meta(37,'dia-chi-gmap');	
$noidunglienhe=get_post_meta(37,'noidunglienhe');	

$lienhe["mail"]=$mail[0];
$lienhe["facebook"]=$facebook[0];
$lienhe["fax"]=$fax[0];
$lienhe["tencongty"]=$tencongty[0];
$lienhe["noidunglienhe"]=$noidunglienhe[0];
$lienhe["diachi"]=$diachi[0];
$lienhe["dienthoai"]=$dienthoai[0];
$lienhe["hotline"]=$hotline[0];
$lienhe["mobile"]=$mobile[0];
$lienhe["copy"]=$copy[0];
$lienhe["design"]=$design[0];
$lienhe["toadox"]=$toadox[0];
$lienhe["toadoy"]=$toadoy[0];
$lienhe["diachigmap"]=$diachigmap[0];
?>