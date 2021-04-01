<div id="orderform" style="display: none;" align="center">
<div class="title-info">THÔNG TIN CỦA BẠN</div>
<form id="formmuahang" action="" method="post">

<div style="margin-top:10px">
<div align="left"><input type="text" name="hoten" id="hoten" placeholder='Họ Tên' />
<div class="clear"></div>
<span class="error" id="hoten_null">Tên không được để trống</span>
<div class="clear"></div>     
</div>

<div align="left"><input type="text" name="diachi" id="diachi"  placeholder='Địa chỉ'  />
<div class="clear"></div> 
<span class="error" id="diachi_null">Vui lòng cho biết địa chỉ liên lạc</span>
</div>
</div>


<div align="left"><input type="text" name="dienthoai" id="dienthoai"  placeholder='Điện thoại'  />
<div class="clear"></div> 
<span class="error" id="dienthoai_null">Vui lòng cho biết số điện thoại</span>
</div>

<div align="left"><input type="text" name="email" id="email" placeholder='Email' />
<div class="clear"></div> 
<span class="error" id="email_null">Mail không được để trống</span>
<span class="error" id="email_error">Địa chỉ mail sai định dạng</span>
<div class="clear"></div> 
</div>

<div style="float:left;margin-top:10px" align="left">
<textarea id="noidung" name="noidung" rows="5" placeholder='Ghi chú thêm'></textarea>
<div class="clear"></div>
<span class="error" id="noidung-null">Nội dung liên hệ</span>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div style="margin-top:20px">
<input type="button" value="Đồng ý" id="dongy" class="dongy" />
<input type="button" value="Hủy bỏ" class="cancel" onclick="closeOrder()" id="cancel" />                                    
<input type="hidden" name="act" value="lienhe" />
</div>
</form>
</div>