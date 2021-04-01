<?php
function alertDialog($flag){
switch ($flag){
case 0:
$header=__('ĐANG XỬ LÝ THÔNG TIN','theme');
$content='<div align="center">'.__('Vui lòng đợi trong giây lát','theme').' <i class="fa fa-spinner fa-spin"></i></div>';
$footer = '<div align="center"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>';
break;
case 1:
$header=__('DỮ LIỆU GỞI THÀNH CÔNG','theme');
$content='<div align="center">'.__('Thông tin gởi thành công, chúng tôi sẽ liên hệ lại bạn, Xin cảm ơn.','theme').'</div>';
$footer = '<div align="center"><a href="'.home_url().'" class="btn btn-default">Close</a></div>';
break;
case 2: 
$header= __('Đăng ký thành công','theme');
$content=__('Chúng tôi đã gửi thư xác nhận tới hộp mail của bạn,vui lòng kiểm tra email để kích hoạt tài khoản.','theme');
$footer='';

break;
case 3: 
$header= __('Đăng ký thất bại','theme');
$content= __('Vì lý do kỹ thuật đăng ký thất bại !','theme').'<br/>'.__('xin thử lại sau.','theme');
$footer='';

break;
case 4: 
$header= __('Chưa kích hoạt tài khoản','theme');
$content=__('Chúng tôi đã gửi thư xác nhận tới hộp mail của bạn, vui lòng kiểm tra email để kích hoạt tài khoản.','theme');
$footer='';

break;
case 5: 
$header= __('Cập nhật tài khoản','theme');
$content=__('Bạn đã cập nhật tài khoản trên website.','theme');
$footer='';

break;
case 6: 
$header= __('Cập nhật tài khoản','theme');
$content=__('Vì lí do kỹ thuật cập nhật tài khoản thất bại','theme').'<br />'.__('xin thử lại sau ít phút.','theme');
$footer='';

break;
case 7: 
$header= __('Kích hoạt tài khoản','theme');
$content=__('Kích hoạt thất bại, tài khoản ko xác thực !','theme');
$footer='';

break;
case 8: 
$header= __('Cập nhật tài khoản','theme');
$content=__('Vì lí do kỹ thuật cập nhật tài khoản thất bại','theme').'<br />'.__('xin thử lại sau ít phút.','theme');
$footer='';

break;
case 9: 
$header= __('Kích hoạt tài khoản','theme');
$content=__('Chúc mừng bạn đã là thành viên của website','theme');
$footer='';

break;
case 10: 
$header= __('Kích hoạt tài khoản','theme');
$content=__('Vì lí do kỹ thuật kích hoạt tài khoản thất bại','theme').'<br/>'.__('xin vui lòng thử lại sau!','theme');
$footer='';

break;
case 11: 
$header= __('Kích hoạt tài khoản','theme');
$content=__('Tài khoản của bạn đã được kích hoạt.','theme');
$footer='';

break;
case 12: 
$header= __('Không đủ quyền hạn !','theme');
$content=__('Bạn không đủ quyền hạn để sử dụng chức năng này.','theme');
$footer='';

break;
case 13: 
$header= __('Đã gửi mail','theme');
$content=__('Mail của bạn đã được gửi tới khách hàng.','theme');
$footer='';

break;
case 14: 
$header= __('Đã gửi mail','theme');
$content=__('Thông tin của bạn đã được gửi tới chúng tôi.','theme').'<br/ >'.__('Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.','theme');
$footer='';
break;
case 15:
 
$header= __('ĐÃ GỞI ĐƠN ĐẶT HÀNG','theme');
$content=__('Đơn đặt hàng của bạn đã được gửi tới chúng tôi.','theme').'<br/ >'.__('Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.','theme');
$footer = '<div align="center"><a href="'.home_url().'" class="btn btn-default">Close</a></div>';
break;

case 16: 
$header= __('Đăng nhập','theme');
$content=__('Chào mừng bạn đã đăng nhập','theme').'<a href="'.home_url().'">'.__('Quay lại trang chủ','theme').'</a>';
$footer='';
break;

case 17: 
$header= __('Giỏ hàng','theme');
$content='<div align="center">'.__('Giỏ hàng chưa có sản phẩm','theme').'</div>';
$footer='<div align="center"><a href="'.get_permalink(get_page_by_path( 'san-pham')).'" class="btn btn-default">'.__('Tới trang hàng','theme').'</a></div>';

break;
case 18: 
$header= __('Đăng nhập','theme');
$content=__('Sai password hoặc tài khoản !','theme');
$footer=__('Bạn chưa có tài khoản hãy','theme').' <a href="'.get_permalink(get_page_by_path( 'dang-ky')).'">'.__('Đăng ký','theme').'</a>';
break;

case 19: 
$header= __('Đăng nhập','theme');
$content=__('Xin vui lòng đăng nhập','theme');
$footer=__('Bạn chưa có tài khoản hãy','theme').' <a href="'.get_permalink(get_page_by_path('dang-ky')).'">'.__('Đăng ký','theme').'</a>';
break;

case 20: 
$header= __('ĐĂNG KÝ THÀNH CÔNG','theme');
$content=__('Đăng ký nhận thông tin thành công.','theme').'<br/ >'.__('Cảm ơn bạn.','theme');
$footer = '<div class="modal-footer"><div align="center"><a href="'.home_url().'" class="btn btn-success">'.__('Mua hàng','theme').'</a></div></div>';
break;
}

$html='<div class="modal-dialog modal-sm" role="document">';
$html.='<div class="modal-content">';
$html.='<div class="modal-header">';
$html.='<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
$html.='<h4 class="modal-title" id="myModalLabel">'.$header.'</h4>';
$html.='</div>';
$html.='<div class="modal-body" align="center">'.$content.'</div>';
$html.='<div class="modal-footer">'.$footer.'</div>';
$html.='</div>';
$html.='</div>';
return $html;
}
?>