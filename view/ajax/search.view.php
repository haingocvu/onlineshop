<?php if($data['total'] > $data['limit']): ?>
<?php for($i = 0; $i < $data['total'] -1 ; $i++): $p = $data['products'][$i]?>
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
          <button type="button" class="add-to-cart-mt">
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
<?php endfor; ?>
<?php else: ?>

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
          <button type="button" class="add-to-cart-mt">
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
<?php endif; ?>
<?php 
  if ($data['total'] <= $data['limit']){
      echo '<script language="javascript">stopped = true; </script>';
  }
?>