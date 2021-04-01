<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">Tìm kiếm</h4>
</div>
<form action="<?php echo site_url();?>" name="searchform" id="searchform" method="get" role="search">
<div class="modal-body">
<div class="input-group">
<input type="text" id="s" name="s" class="form-control" aria-label="..." placeholder="Nhập từ khóa" autocomplete="off">
<div class="input-group-btn">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chọn lĩnh vực <span class="caret"></span></button>
<ul class="dropdown-menu dropdown-menu-right cfiled">
<li><a href="#" rel="san-pham">Sản phẩm</a></li>
</ul>
</div>
</div>
<input type="hidden" name="sfiled" id="sfiled" value="san-pham" />
</div>
<div class="modal-footer"><button type="submit" class="btn btn-warning"><i class="fa fa-search"></i> Tìm kiếm</button></div>
</form>
</div>
</div>
</div>