<?php

$productsByType = 
(isset($data["products"]) && $data["products"] != "" && $data["products"] != false)?$data["products"]:null;
$pagination = (isset($data["pagination"]) && $data["pagination"] != "")?$data["pagination"]:null;

$alias = (isset($data["alias"]) && $data["alias"] != "")?$data["alias"]:null;

$rowcount = 
(isset($data["rowcount"]) && $data["rowcount"] != "" && $data["rowcount"] != false)?$data["rowcount"]:null;

?>

<div class="page-title">
  <h2><?= $alias  ?></h2>
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
              <button type="button" class="add-to-cart-mt" idproduct=<?= $product->id ?>>
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

<?php if($pagination != null): ?>
<div class="pagination-area1">
  <?= $pagination ?>
</div>
<?php endif; ?>
<input type="hidden" name="rowcount" id="rowcount" value="<?= $rowcount ?>" />