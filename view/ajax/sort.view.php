<?php if($data['products'] != null): ?>
<?php foreach($data['products'] as $product): ?>

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