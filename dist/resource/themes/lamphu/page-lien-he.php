<?php get_header();global $lienhe; ?>
<?php get_sidebar('head'); ?>
<main>
  <div class="map" align="center">
    <div id="map-canvas"></div>
    <img src="/assets/images/shadow.png" width="1000" height="34" class="img-responsive" alt="Máy cắt dây EDM">
  </div>
  <form data-toggle="validator" role="form" id="contactForm">
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group has-feedback">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" id="fullname" class="form-control" placeholder="Họ tên"
                data-error="Vui lòng điền đầy đủ họ tên." required>
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <span class="help-block with-errors"></span>
          </div>
          <div class="form-group has-feedback">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" id="mailaddress" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                class="form-control" placeholder="name@email.com" data-error="Địa chỉ hoặc định dạng mail không đúng."
                required>
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <span class="help-block with-errors"></span>
          </div>

          <div class="form-group has-feedback">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="tel" id="phonenumber" pattern="[0-9]{8,14}" class="form-control" placeholder="Điện thoại"
                data-error="Vui lòng cho biết số điện thoại" required>
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <span class="help-block with-errors"></span>
          </div>

          <div class="form-group has-feedback">
            <textarea placeholder="Địa chỉ" id="address" class="form-control" row gutter-10
              gutter-md-30-mds="2"></textarea>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <span class="help-block with-errors"></span>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group has-feedback">
            <textarea placeholder="Ghi chú" id="message" class="form-control" row gutter-10 gutter-md-30-mds="9"
              style="height:186px;"></textarea>
          </div>
        </div>
        <div class="col-lg-12" align="center">
          <input type="submit" name="sendmail" value="GỞI MAIL" class="btn btn-default btn-contact">
        </div>
        <div class="col-lg-12">
          <div class="panel panel-default panel-contact-page">
            <div class="panel-body">
              <?php echo get_page_by_id(37);?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>
<?php get_footer();?>
