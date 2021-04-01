<div id="inline" style="width:300px;display: none;">
<form id="questionform" method="post" action="">
<div class="title-info">VUI LÒNG CHO BIẾT CÂU HỎI CỦA BẠN</div>

<input type="text" placeholder="Tiêu đề" id="txt_tieu_de" name="txt_tieu_de" class="requiredField"><br />
<div class="clear"></div>
<span class="error" id="tieude_null">Vui lòng cho biết tiêu đề</span>

<input type="text" placeholder="Họ tên" id="txt_hoten" name="txt_hoten" class="requiredField"><br />
<div class="clear"></div>
<span class="error" id="name_null">Vui lòng cho biết họ tên</span>

<input type="text" placeholder="Nhập địa chỉ email" id="txt_mail" name="txt_mail"><br />
<div class="clear"></div>
<span class="error" id="email_null">Vui lòng cho biết địa chỉ mail</span>
<span class="error" id="email_error">Địa chỉ mail sai định dạng</span>

<textarea id="txt_noi_dung" name="txt_noi_dung" style="border:solid 1px #CCC;width:290px;height:100px" placeholder='Nội dung'></textarea><br />
<input type="button"  value="Gửi" name="bt_gui" id="bt_gui" >
<input type="hidden" name="act" value="bt_gui" />
</form>
</div>