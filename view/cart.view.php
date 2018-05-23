<?php  

$cart = $data["cart"];

?>
<!-- Main Container -->
<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="cart">
        
        <div class="page-content page-order"><div class="page-title">
          <h2>Shopping Cart</h2>
        </div>
          
          
          <div class="order-detail-content">
            <div class="table-responsive">
              <table class="table table-bordered cart_summary">
                <thead>
                  <tr>
                    <th class="cart_product">Product</th>
                    <th>Description</th>
                    <th>Avail.</th>
                    <th>Unit price</th>
                    <th>Unit on sale</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Total on sale</th>
                    <th  class="action"><i class="fa fa-trash-o"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($cart->items as $c): ?>
                  <tr id="<?= 'tr'.$c["item"]->id ?>">
                    <td class="cart_product"><a href="#"><img src="public/images/products/<?= $c["item"]->image ?>" alt="Product"></a></td>
                    <td class="cart_description"><p class="product-name"><a href="#"><?= $c["item"]->name ?> </a></p>
                      <small><a href="#">Color : Red</a></small><br>
                      <small><a href="#">Size : M</a></small></td>
                    <td class="availability in-stock"><span class="label">In stock</span></td>
                    <td class="onsale-price-text price"><span><?= number_format($c["item"]->price) ?></span></td>
                    <td class="price"><span><?= number_format(($c["item"]->promotion_price == 0)?($c["item"]->price):($c["item"]->promotion_price)) ?></span></td>
                    <td class="qty"><input id-product='<?= $c["item"]->id  ?>' class="form-control input-sm input-keyupable" type="text" value="<?= $c['qty'] ?>"></td>
                    <td class="onsale-price-text price"><span id="<?= 'price'.$c["item"]->id ?>"><?= number_format($c["price"]) ?></span></td>
                    <td class="price"><span id="<?= 'pricePromotion'.$c["item"]->id ?>"><?= number_format($c["promotionPrice"]) ?></span></td>
                    <td class="action"><i id-product='<?= $c["item"]->id  ?>' style="cursor: pointer;" class="icon-close"></i></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2" rowspan="2"></td>
                    <td colspan="3">Total price</td>
                    <td colspan="2" id="totalPrice"><?= number_format($cart->totalPrice) ?> </td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>Total on sale</strong></td>
                    <td colspan="2"><strong id="totalPromotionPrice"><?= number_format($cart->totalPromotionPrice) ?> </strong></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="cart_navigation"> <a class="continue-btn" href="./"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="checkout.html"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  function numberFormat(n){
    return n.toLocaleString(
      'en-US', // leave undefined to use the browser's locale,
                 // or use a string like 'en-US' to override it.
      { minimumFractionDigits: 0 }
    );
  }
  document.addEventListener("DOMContentLoaded", function(event) {
    var inputKeyupableElements = document.querySelectorAll(".input-keyupable");
    for(var e of inputKeyupableElements){
      e.addEventListener("keyup", function(){
        var qty = !isNaN(this.value)?this.value:1;
        if(isNaN(this.value)){
          this.value = qty;
        }
        var productID = this.getAttribute("id-product");
        setTimeout(function(){
          var data = {
            qty: qty,
            productID: productID,
            action: 'update'
          };
          var params = "data=" + JSON.stringify(data);
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
              var returnedObj = JSON.parse(this.responseText);
              document.getElementById("totalPrice").innerHTML = numberFormat(returnedObj.totalPrice);
              document.getElementById("totalPromotionPrice").innerHTML = numberFormat(returnedObj.totalPromotionPrice);
              document.getElementById("price" + productID).innerHTML = numberFormat(returnedObj.price);
              document.getElementById("pricePromotion" + productID).innerHTML = numberFormat(returnedObj.promotionPrice);
            }
          }
          xhttp.open("POST", "cart.php");
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send(params);
        }, 2000);
      });
    }
    var close_elements = document.querySelectorAll(".icon-close");
    for(var ce of close_elements){
      ce.addEventListener("click", function(){
      var productID = this.getAttribute("id-product");
      var data = {
        productID: productID,
        action: 'delete'
      };
      var params = "data=" + JSON.stringify(data);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          //console.log(this.responseText);return;
          var returnedObj = JSON.parse(this.responseText);
          document.getElementById("tr" + productID).style.display = "none";
          document.getElementById("totalPrice").innerHTML = numberFormat(returnedObj.totalPrice);
          document.getElementById("totalPromotionPrice").innerHTML = numberFormat(returnedObj.totalPromotionPrice);
        }
      }
      xhttp.open("POST", "cart.php");
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(params);
    });
    }
  })
</script>