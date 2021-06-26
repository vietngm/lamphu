<?php get_header();global $lienhe; ?>
<?php get_sidebar('head'); ?>
<main class="is-contact">
  <div class="map">
    <div id="map-canvas"></div>
    <div class='map-shadow'><img src="/assets/images/shadow.png" class="img-responsive" alt="Máy cắt dây EDM"></div>
  </div>
  <form id="contactForm" class="needs-validation" novalidate>
    <div class="wrap-content">
      <div class="row gutter-10 gutter-md-30-md">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" id="fullname" class="form-control" placeholder="Họ tên" required>
              <div class="invalid-feedback">Vui lòng điền đầy đủ họ tên.</div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
              </div>
              <input type="email" id="mailaddress" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                class="form-control" placeholder="name@email.com" required>
              <div class="invalid-feedback">Địa chỉ hoặc định dạng mail không đúng.</div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone"></i></span>
              </div>
              <input type="tel" id="phonenumber" pattern="[0-9]{8,14}" class="form-control" placeholder="Điện thoại"
                required>
              <div class="invalid-feedback">Vui lòng cho biết số điện thoại</div>
            </div>
          </div>

          <div class="form-group">
            <textarea placeholder="Địa chỉ" id="address" class="form-control" rows="2"></textarea>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <textarea placeholder="Ghi chú" id="message" class="form-control" rows="9" style="height:224px;"></textarea>
          </div>
        </div>

      </div>
    </div>

    <div class="wrap-btn-contact">
      <input type="submit" name="sendmail" value="GỬI MAIL" class="btn btn-outline-success btn-radius">
    </div>

  </form>
</main>
<?php get_footer();?>
