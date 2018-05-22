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
                  <tr>
                    <td class="cart_product"><a href="#"><img src="public/images/products/<?= $c["item"]->image ?>" alt="Product"></a></td>
                    <td class="cart_description"><p class="product-name"><a href="#"><?= $c["item"]->name ?> </a></p>
                      <small><a href="#">Color : Red</a></small><br>
                      <small><a href="#">Size : M</a></small></td>
                    <td class="availability in-stock"><span class="label">In stock</span></td>
                    <td class="onsale-price-text price"><span><?= number_format($c["item"]->price) ?></span></td>
                    <td class="price"><span><?= number_format(($c["item"]->promotion_price == 0)?($c["item"]->price):($c["item"]->promotion_price)) ?></span></td>
                    <td class="qty"><input class="form-control input-sm" type="text" value="<?= $c['qty'] ?>"></td>
                    <td class="onsale-price-text price"><span><?= number_format($c["price"]) ?></span></td>
                    <td class="price"><span><?= number_format($c["promotionPrice"]) ?></span></td>
                    <td class="action"><a href="#"><i class="icon-close"></i></a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2" rowspan="2"></td>
                    <td colspan="3">Total price</td>
                    <td colspan="2"><?= number_format($cart->totalPrice) ?> </td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>Total on sale</strong></td>
                    <td colspan="2"><strong><?= number_format($cart->totalPromotionPrice) ?> </strong></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="cart_navigation"> <a class="continue-btn" href="./"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="#"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>