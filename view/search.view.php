<div class="container" id="needtoscroll">
  <div class="row">
      <div class="shop-inner">
        <div class="product-grid-area">
          <ul class="products-grid" id="products-list">

            <?php foreach($data['products'] as $p): ?>

            <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
              <div class="product-item">
                <div class="item-inner">
                  <div class="product-thumbnail">

                    <?php if($p->promotion_price != 0): ?>

                    <div class="icon-sale-label sale-left">Sale</div>


                    <?php endif; ?>

                    <?php if($p->new == 1): ?>

                    <div class="icon-new-label new-right">New</div>


                    <?php endif; ?>

                    <div class="pr-img-area">
                      <a title="<?= $p->name ?>" href="<?= $p->url.'.html' ?>">
                        <figure>
                          <img class="first-img" src="public/images/products/<?= $p->image ?>" alt="">
                          <img class="hover-img" src="public/images/products/<?= $p->image ?>" alt="">
                        </figure>
                      </a>
                      <button type="button" class="add-to-cart-mt" idproduct=<?= $p->id ?>>
                        <i class="fa fa-shopping-cart"></i>
                        <span> Add to Cart</span>
                      </button>
                    </div>

                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title">
                        <a title="Ipsums Dolors Untra" href="<?= $p->url.'.html' ?>"><?= $p->name ?> </a>
                      </div>
                      <div class="item-content">

                        <div class="item-price">
                          <div class="price-box">


                            <?php if($p->promotion_price == 0): ?>

                            <span class="regular-price">
                              <span class="price"><?= number_format($p->price) ?></span>
                            </span>

                            <?php else: ?>

                            <p class="special-price">
                              <span class="price-label">Special Price</span>
                              <span class="price"> <?= number_format($p->promotion_price) ?> </span>
                            </p>
                            <p class="old-price">
                              <span class="price-label">Regular Price:</span>
                              <span class="price"> <?= number_format($p->price) ?> </span>
                            </p>
                            
                            <?php endif; ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <?php endforeach; ?>

          </ul>
          <!-- <div id="pleaseWaitDialog"></div> -->
        </div>
      </div>
  </div>
</div>
<!-- jquery js -->
<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript">
  // Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm
  var is_busy = false;
       
  // Biến lưu trữ trang hiện tại
  var page = 1;
  
  //alias
  var alias = "<?= $_GET['category'] ?>";

  //name
  var name = "<?= $_GET['name'] ?>";

  var nearToBottom = 100

  // Biến lưu trữ rạng thái phân trang 
  var stopped = false;
  $(document).ready(function(){
    $(window).scroll(function(){
      // Element append nội dung
      $element = $('#products-list');
      // Nếu màn hình đang ở dưới cuối thẻ thì thực hiện ajax
      if ($(window).scrollTop() + $(window).height() >= $('#needtoscroll').offset().top + $('#needtoscroll').height() ) { 
        // Nếu đang gửi ajax thì ngưng
        if (is_busy == true){
            return false;
        }
        // Nếu hết dữ liệu thì ngưng
        if (stopped == true){
            //console.log("stopppedd")
            return false;
        }
        // Thiết lập đang gửi ajax
        is_busy = true;
        // Tăng số trang lên 1
        page++;
        // Hiển thị loadding
        //$loadding.removeClass('hidden');
        showPleaseWait();
        // Gửi Ajax
        $.ajax(
        {
            type        : 'get',
            dataType    : 'text',
            url         : 'search.php',
            data        : {page : page, alias : alias, name : name, action : 'ajax'},
            success     : function (result)
            {
                //console.log(result);
                $element.append(result);
            }
        })
        .always(function()
        {
            // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
            //$loadding.addClass('hidden');
            hidePleaseWait();
            is_busy = false;
        });
        return false;
      }
    })
  })
</script>