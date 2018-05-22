<?php  

$detail = $data['detail'];
$relatedProducts = $data['relatedProducts'];

?>

<!-- Main Container -->
<div class="main-container col1-layout">
  <div class="container">
    <div class="row">
      <div class="col-main">
        <div class="product-view-area">
          <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">

            <?php if($detail->promotion_price != 0): ?>
            <div class="icon-sale-label sale-left">Sale</div>
            <?php endif ?>

            <?php if($detail->new == 1): ?>
            <div class="icon-new-label new-right">New</div>
            <?php endif ?>

            <div class="large-image">
              <a href="public/images/products/<?= $detail->image ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                <img class="zoom-img" src="public/images/products/<?= $detail->image ?>" alt="products"> </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

            <div class="product-name">
              <h1><?= $detail->name ?></h1>
            </div>
            <div class="price-box">
              <?php if($detail->promotion_price == 0): ?>

              <span class="regular-price">
                <span class="price"><?= number_format($detail->price) ?></span>
              </span>

              <?php else: ?>

              <p class="special-price">
                <span class="price-label">Special Price</span>
                <span class="price"> <?= number_format($detail->promotion_price) ?> </span>
              </p>
              <p class="old-price">
                <span class="price-label">Regular Price:</span>
                <span class="price"> <?= number_format($detail->price) ?> </span>
              </p>

              <?php endif; ?>

            </div>

            <div class="short-description">
              <h2>Quick Overview</h2>
              <p><?= $detail->detail ?></p>

            </div>

            <div class="product-variation">
              <form action="#" method="post">
                <div class="cart-plus-minus">
                  <label for="qty">Quantity:</label>
                  <div class="numbers-row">
                    <div class="dec qtybutton">
                      <i class="fa fa-minus">&nbsp;</i>
                    </div>
                    <input id="productqty" type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                    <div class="inc qtybutton">
                      <i class="fa fa-plus">&nbsp;</i>
                    </div>
                  </div>
                </div>
                <button id="btn-add-product-to-cart" id-product=<?= $detail->id ?> class="button pro-add-to-cart" title="Add to Cart" type="button">
                  <span>
                    <i class="fa fa-shopping-cart"></i> Add to Cart</span>
                </button>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Main Container End -->
<!-- Related Product Slider -->
<section class="upsell-product-area">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">

        <div class="page-header">
          <h2>Related Products</h2>
        </div>
        <div class="slider-items-products">
          <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4">

              <?php foreach($relatedProducts as $p): ?>
              <div class="product-item">
                <div class="item-inner fadeInUp">
                  <div class="product-thumbnail">

                    <?php if($p->promotion_price != 0): ?>
                    <div class="icon-sale-label sale-left">Sale</div>
                    <?php endif ?>

                    <?php if($p->new == 1): ?>
                    <div class="icon-new-label new-right">New</div>
                    <?php endif ?>

                    <div class="pr-img-area">
                      <img class="first-img" src="public/images/products/<?= $p->image ?>" alt="">
                      <img class="hover-img" src="public/images/products/<?= $p->image ?>" alt="">
                      <button type="button" class="add-to-cart-mt" idproduct=<?= $p->id ?>>
                        <i class="fa fa-shopping-cart"></i>
                        <span> Add to Cart</span>
                      </button>
                    </div>

                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title">
                        <a title="<?= $p->name ?>" href="<?= $p->url . '.html' ?>"><?= $p->name ?> </a>
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
              <?php endforeach; ?>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- Related Product Slider End -->
<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function(event) {
      document.querySelectorAll(".dec")[0].addEventListener("click", function(){
        var e_numberInput = document.getElementById("productqty");
        //console.log(e_numberInput);
        var value = !isNaN(e_numberInput.value)?parseInt(e_numberInput.value):1;
        if(value > 1){
          --value;
        }
        e_numberInput.value = value;
      });
      document.querySelectorAll(".inc")[0].addEventListener("click", function(){
        var e_numberInput = document.getElementById("productqty");
        //console.log(e_numberInput);
        var value = !isNaN(e_numberInput.value)?parseInt(e_numberInput.value):0;
        ++value;
        e_numberInput.value = value;
      });
      document.getElementById("btn-add-product-to-cart").addEventListener("click", function(){
        var e_numberInput = document.getElementById("productqty");
        if(isNaN(e_numberInput.value)){
          e_numberInput.value = 1;
          alert("input invalid!");
          e_numberInput.focus();
          return;
        }else{
          var qty = e_numberInput.value;
          var productID = document.getElementById("btn-add-product-to-cart").getAttribute("id-product");
          var params = "qty=" + qty + "&productID=" + productID;
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
              //console.log(this.responseText);
            if(this.responseText.trim() == "error"){
              alert("error");
            }else{
              document.getElementById("namee").innerHTML = this.responseText;
              $('#myModal1').modal('show');
            }
            }
          }
          xhttp.open("POST", "cart.php");
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send(params);
        }
      });
   });
</script>