<!-- Main Container -->
<section class="main-container col2-right-layout">
<div class="main container">
<div class="row">
  <div class="col-main col-sm-12 col-xs-12">
    <div class="page-content checkout-page"><div class="page-title">
      <h2>Checkout</h2>
    </div>
        <div class="box-border">
            <form action="checkout.html" method="POST">
                <ul>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="fullname" class="required">Full Name</label>
                        <input type="text" class="input form-control" name="fullname" id="fullname">
                    </div><!--/ [col] -->
                    <div class="col-sm-6">
                        <label for="gender" class="required">Gender</label>
                        <select class="input form-control" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div><!--/ [col] -->
                </li><!--/ .row -->
                <li class="row">
                    <div class="col-sm-6">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="input form-control" id="email">
                    </div><!--/ [col] -->
                    <div class="col-sm-6">
                        <label for="address" class="required">Address</label>
                        <input type="text" class="input form-control" name="address" id="address">
                    </div><!--/ [col] -->
                </li><!--/ .row -->
                <li class="row">
                    <div class="col-sm-6">
                        <label for="phone" class="required">Phone</label>
                        <input type="text" class="input form-control" name="phone" id="phone">
                    </div><!--/ [col] -->
                    <div class="col-sm-6">
                        <label for="payments" class="required">Payments Method</label>
                        <select class="input form-control" name="payments">
                            <option value="COD">COD</option>
                            <option value="at the store">At the store</option>
                        </select>
                    </div><!--/ [col] -->
                </li><!--/ .row -->
                <li class="row"> 
                    <div class="col-xs-12">

                        <label for="note" class="required">Note</label>
                        <textarea class="input form-control" name="note" id="note" rows="5"></textarea>

                    </div><!--/ [col] -->

                </li><!-- / .row -->
                <li>
                    <button name="btnCheckoutSubmit" type="submit" class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Continue</span></button>
                </li>
                </ul>
            </form>
        </div>
    </div>
  </div>
  
</div>
</div>
</section>
<!-- Main Container End -->