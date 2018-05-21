<?php  

$productsByType = isset($data["productsByType"])?$data["productsByType"]:null;
$category = isset($data["catgory"])?$data["catgory"]:null;
$pagination = isset($data["pagination"])?$data["pagination"]:null;

?>

<!-- Main Container -->
<div class="main-container col2-left-layout">
<div class="container">
  <div class="row">
    <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
      <div class="category-description std">
        <div class="slider-items-products">
          <div id="category-desc-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col1 owl-carousel owl-theme">

              <!-- Item -->
              <div class="item">
                <a href="#x">
                  <img alt="" src="public/images/cat-slider-img1.jpg">
                </a>
                <div class="inner-info">
                  <div class="cat-img-title">
                    <span>Our new range of</span>
                    <h2 class="cat-heading">
                      <strong>Smartphone</strong>
                    </h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    <a class="info" href="#">Shop Now</a>
                  </div>
                </div>
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="item">
                <a href="#x">
                  <img alt="" src="public/images/cat-slider-img2.jpg">
                </a>
              </div>

              <!-- End Item -->

            </div>
          </div>
        </div>
      </div>
      <div class="shop-inner">
        <div class="page-title">
          <h2><?= ($category != null)?$category->name:'' ?></h2>
        </div>

        <div class="product-grid-area">
          <ul class="products-grid" id="eparent">

            <?php if($productsByType != null): ?>
            <?php foreach($productsByType as $product): ?>

            <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
              <div class="product-item">
                <div class="item-inner">
                  <div class="product-thumbnail">

                    <?php if($product->promotion_price != 0): ?>

                    <div class="icon-sale-label sale-left">Sale</div>

                    <?php endif; ?>

                    <?php if($product->new == 1): ?>
                    
                    <div class="icon-new-label new-right">New</div>

                    <?php endif; ?>

                    <div class="pr-img-area">
                      <a title="<?= $product->name ?>" href="<?= $product->url . '.html' ?>">
                        <figure>
                          <img class="first-img" src="public/images/products/<?= $product->image ?>" alt="<?= $product->name ?>">
                          <img class="hover-img" src="public/images/products/<?= $product->image ?>" alt="<?= $product->name ?>">
                        </figure>
                      </a>
                      <button type="button" class="add-to-cart-mt">
                        <i class="fa fa-shopping-cart"></i>
                        <span> Add to Cart</span>
                      </button>
                    </div>

                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title">
                        <a title="<?= $product->name ?>" href="<?= $product->url . '.html' ?>"><?= $product->name ?> </a>
                      </div>
                      <div class="item-content">

                        <div class="item-price">
                          <div class="price-box">

                            <?php if($product->promotion_price == 0): ?>

                            <span class="regular-price">
                              <span class="price"><?= number_format($product->price) ?></span>
                            </span>

                            <?php else: ?>

                            <p class="special-price">
                              <span class="price-label">Special Price</span>
                              <span class="price"> <?= number_format($product->promotion_price) ?> </span>
                            </p>
                            <p class="old-price">
                              <span class="price-label">Regular Price:</span>
                              <span class="price"> <?= number_format($product->price) ?> </span>
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
            <?php endif ?>

          </ul>
        </div>
        <div class="pagination-area ">
        <?= $pagination ?>
        </div>
      </div>
    </div>
    <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
      <div class="block category-sidebar">
        <div class="sidebar-title">
          <h3>Categories</h3>
        </div>
        <ul class="product-categories">
          <li class="cat-item current-cat cat-parent">
            <a href="shop_grid.html">Women</a>
            <ul class="children">
              <li class="cat-item cat-parent">
                <a href="shop_grid.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Accessories</a>
                <ul class="children">
                  <li class="cat-item">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                  </li>
                  <li class="cat-item cat-parent">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                    <ul style="display: none;" class="children">
                      <li class="cat-item">
                        <a href="shop_grid.html">
                          <i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a>
                      </li>
                      <li class="cat-item">
                        <a href="shop_grid.html">
                          <i class="fa fa-angle-right"></i>&nbsp; Sling bag</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="cat-item cat-parent">
                <a href="shop_grid.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                <ul class="children">
                  <li class="cat-item">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; backpack</a>
                  </li>
                  <li class="cat-item">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a>
                  </li>
                  <li class="cat-item">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; Fabric Handbags</a>
                  </li>
                  <li class="cat-item">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; Sling bag</a>
                  </li>
                </ul>
              </li>
              <li class="cat-item">
                <a href="shop_grid.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Jewellery</a>
              </li>
              <li class="cat-item">
                <a href="shop_grid.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Swimwear</a>
              </li>
            </ul>
          </li>
          <li class="cat-item cat-parent">
            <a href="shop_grid.html">Men</a>
            <ul class="children">
              <li class="cat-item cat-parent">
                <a href="shop_grid.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                <ul class="children">
                  <li class="cat-item">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; Casual</a>
                  </li>
                  <li class="cat-item">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; Designer</a>
                  </li>
                  <li class="cat-item">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; Evening</a>
                  </li>
                  <li class="cat-item">
                    <a href="shop_grid.html">
                      <i class="fa fa-angle-right"></i>&nbsp; Hoodies</a>
                  </li>
                </ul>
              </li>
              <li class="cat-item">
                <a href="shop_grid.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Jackets</a>
              </li>
              <li class="cat-item">
                <a href="shop_grid.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Shoes</a>
              </li>
            </ul>
          </li>
          <li class="cat-item">
            <a href="shop_grid.html">Electronics</a>
          </li>
          <li class="cat-item">
            <a href="shop_grid.html">Furniture</a>
          </li>
          <li class="cat-item">
            <a href="shop_grid.html">KItchen</a>
          </li>
        </ul>
      </div>
      <div class="block shop-by-side">
        <div class="sidebar-bar-title">
          <h3>Shop By</h3>
        </div>
        <div class="block-content">
          <p class="block-subtitle">Shopping Options</p>
          <div class="layered-Category">
            <h2 class="saider-bar-title">Categories</h2>
            <div class="layered-content">
              <ul class="check-box-list">
                <li>
                  <input type="checkbox" id="jtv1" name="jtvc">
                  <label for="jtv1">
                    <span class="button"></span> Camera & Photo
                    <span class="count">(12)</span>
                  </label>
                </li>
                <li>
                  <input type="checkbox" id="jtv2" name="jtvc">
                  <label for="jtv2">
                    <span class="button"></span> Computers
                    <span class="count">(18)</span>
                  </label>
                </li>
                <li>
                  <input type="checkbox" id="jtv3" name="jtvc">
                  <label for="jtv3">
                    <span class="button"></span> Apple Store
                    <span class="count">(15)</span>
                  </label>
                </li>
                <li>
                  <input type="checkbox" id="jtv4" name="jtvc">
                  <label for="jtv4">
                    <span class="button"></span> Car Electronic
                    <span class="count">(03)</span>
                  </label>
                </li>
                <li>
                  <input type="checkbox" id="jtv5" name="jtvc">
                  <label for="jtv5">
                    <span class="button"></span> Accessories
                    <span class="count">(04)</span>
                  </label>
                </li>
                <li>
                  <input type="checkbox" id="jtv7" name="jtvc">
                  <label for="jtv7">
                    <span class="button"></span> Game & Video
                    <span class="count">(07)</span>
                  </label>
                </li>
                <li>
                  <input type="checkbox" id="jtv8" name="jtvc">
                  <label for="jtv8">
                    <span class="button"></span> Best selling
                    <span class="count">(05)</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
      <div class="block product-price-range ">
        <div class="sidebar-bar-title">
          <h3>Price</h3>
        </div>
        <div class="block-content">
          <div class="slider-range">
            <div data-label-reasult="Range:" data-min="200000" data-max="70000000" data-unit="vnd " class="slider-range-price" data-value-min="5000000"
              data-value-max="50000000"></div>
            <div class="amount-range-price">Range: vnd 200.000 - vnd 70.000.000</div>
            <ul class="check-box-list">
              <li>
                <input type="checkbox" id="p1" name="cc" value="200000-5000000"/>
                <label for="p1" class="lblprice">
                  <span class="button"></span> 200.000 - 5.000.000
                  <span class="count">(<?= $data["price1"] ?>)</span>
                </label>
              </li>
              <li>
                <input type="checkbox" id="p2" name="cc" value="5000000-25000000" />
                <label for="p2" class="lblprice">
                  <span class="button"></span> 5.000.000 - 25.000.000
                  <span class="count">(<?= $data["price2"] ?>)</span>
                </label>
              </li>
              <li>
                <input type="checkbox" id="p3" name="cc" value="25000000" />
                <label for="p3" class="lblprice">
                  <span class="button"></span> > 25.000.000
                  <span class="count">(<?= $data["price3"] ?>)</span>
                </label>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="block sidebar-cart">
        <div class="sidebar-bar-title">
          <h3>My Cart</h3>
        </div>
        <div class="block-content">
          <p class="amount">There are
            <a href="shopping_cart.html">2 items</a> in your cart.</p>
          <ul>
            <li class="item">
              <a href="shopping_cart.html" title="Sample Product" class="product-image">
                <img src="public/images/products/img07.jpg" alt="Sample Product ">
              </a>
              <div class="product-details">
                <div class="access">
                  <a href="#" title="Remove This Item" class="remove-cart">
                    <i class="icon-close"></i>
                  </a>
                </div>
                <p class="product-name">
                  <a href="shopping_cart.html">Lorem ipsum dolor sit amet Consectetur</a>
                </p>
                <strong>1</strong> x
                <span class="price">$19.99</span>
              </div>
            </li>
            <li class="item last">
              <a href="#" title="Sample Product" class="product-image">
                <img src="public/images/products/img08.jpg" alt="Sample Product">
              </a>
              <div class="product-details">
                <div class="access">
                  <a href="#" title="Remove This Item" class="remove-cart">
                    <i class="icon-close"></i>
                  </a>
                </div>
                <p class="product-name">
                  <a href="shopping_cart.html">Consectetur utes anet adipisicing elit</a>
                </p>
                <strong>1</strong> x
                <span class="price">$8.00</span>
                <!--access clearfix-->
              </div>
            </li>
          </ul>
          <div class="summary">
            <p class="subtotal">
              <span class="label">Cart Subtotal:</span>
              <span class="price">$27.99</span>
            </p>
          </div>
          <div class="cart-checkout">
            <button class="button button-checkout" title="Submit" type="submit">
              <i class="fa fa-check"></i>
              <span>Checkout</span>
            </button>
          </div>
        </div>
      </div>


      <div class="single-img-add sidebar-add-slider ">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="public/images/add-slide1.jpg" alt="slide1">
              <div class="carousel-caption">
                <h3>
                  <a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="#" class="info">shopping Now</a>
              </div>
            </div>
            <div class="item">
              <img src="public/images/add-slide2.jpg" alt="slide2">
              <div class="carousel-caption">
                <h3>
                  <a href="single_product.html" title=" Sample Product">Smartwatch Collection</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="#" class="info">All Collection</a>
              </div>
            </div>
            <div class="item">
              <img src="public/images/add-slide3.jpg" alt="slide3">
              <div class="carousel-caption">
                <h3>
                  <a href="single_product.html" title=" Sample Product">Summer Sale</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="block special-product">
        <div class="sidebar-bar-title">
          <h3>Special Products</h3>
        </div>
        <div class="block-content">
          <ul>
            <li class="item">
              <div class="products-block-left">
                <a href="single_product.html" title="Sample Product" class="product-image">
                  <img src="public/images/products/img01.jpg" alt="Sample Product ">
                </a>
              </div>
              <div class="products-block-right">
                <p class="product-name">
                  <a href="single_product.html">Lorem ipsum dolor sit amet Consectetur</a>
                </p>
                <span class="price">$19.99</span>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                </div>
              </div>
            </li>
            <li class="item">
              <div class="products-block-left">
                <a href="single_product.html" title="Sample Product" class="product-image">
                  <img src="public/images/products/img02.jpg" alt="Sample Product ">
                </a>
              </div>
              <div class="products-block-right">
                <p class="product-name">
                  <a href="single_product.html">Consectetur utes anet adipisicing elit</a>
                </p>
                <span class="price">$89.99</span>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                </div>
              </div>
            </li>
          </ul>
          <a class="link-all" href="shop_grid.html">All Products</a>
        </div>
      </div>


    </aside>
  </div>
</div>
</div>
<!-- Main Container End -->
<script type="text/javascript">
  window.onload = function(){
    var es = document.querySelectorAll("label.lblprice");
    var isReplaced = false;
    for(var e of es){
      e.addEventListener("click", function(){
        var aliasSent = '<?= $_GET["alias"] ?>';
        var inputID = this.getAttribute("for");
        var currentInput = document.getElementById(inputID);
        var price = currentInput.getAttribute("value");
        var eparent = document.getElementById("eparent");

        //check for checkbox is checked or not
        if(!currentInput.checked){
          //call ajax
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
              //check for the first call. we will replace the content of the parent
              if(!isReplaced){
                console.log("replacing");
                //create a element and assign retured value to it
                var childToAppend = document.createElement("div");
                childToAppend.setAttribute("id", "price"+price);
                childToAppend.innerHTML = this.responseText;
                //remove all child of the parent node
                while(eparent.firstChild){
                  eparent.removeChild(eparent.firstChild);
                }
                //append recent created element to the parent
                eparent.appendChild(childToAppend);
                isReplaced = true;
              }else{
                //if not a first call, we will appending
                console.log("appending");
                //create a element and assign retured value to it
                var childToAppend = document.createElement("div");
                childToAppend.setAttribute("id", "price"+price);
                childToAppend.innerHTML = this.responseText;
                 //append recent created element to the parent
                eparent.appendChild(childToAppend);
              }
            }
          }
          xhttp.open("GET", "sortprice.php?price=" + price + "&alias=" + aliasSent);
          xhttp.send();
        }else{
          console.log("removing");
          //get child and remove child
          var echild = document.getElementById("price"+price);
          eparent.removeChild(echild);
        }
      });
    }
  }
</script>