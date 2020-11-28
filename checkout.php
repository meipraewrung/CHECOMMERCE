<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$currentUser = getCurrentUser($_SESSION["id"]);

?>
<?php
if(isset($_POST["submit"])){

  $products_id = $_POST["products_id"];
  $amount = $_POST["amount"];
  $unit_price = $_POST["price"];
  $sum_price = $_POST["sum_price"];

  saveOrders($_POST["users_id"],$_POST["receive_firstname"],$_POST["receive_lastname"],$_POST["receive_address"],$_POST["receive_email"],$_POST["receive_phone"],$_POST["total_price"],$products_id,$amount,$unit_price,$sum_price);
  
}
?>
<body>

  <?php
  require_once("nav.php");
  ?>

  <section class="flat-checkout">
    <div class="container">
      <form action="" method="post" class="checkout" accept-charset="utf-8">
        <input type="hidden" id="first-name" name="users_id" placeholder="" value="<?php echo $_SESSION['id'];?>">
        <div class="row">
          <div class="col-md-7">
            <div class="box-checkout">
              <h3 class="title">ยืนยันการสั่งซื้อ</h3>

              <div class="billing-fields">
                <div class="fields-title">
                  <h3>รายละเอียดการจัดส่ง</h3>
                  <span></span>
                  <div class="clearfix"></div>
                </div><!-- /.fields-title -->
                <div class="fields-content">
                  <div class="field-row">
                    <p class="field-one-half">
                      <label for="first-name">ชื่อ</label>
                      <input type="text" id="first-name" name="receive_firstname" placeholder="" value="<?php echo $currentUser['firstname'];?>">
                    </p>
                    <p class="field-one-half">
                      <label for="last-name">นามสกุล</label>
                      <input type="text" id="last-name" name="receive_lastname" placeholder="" value="<?php echo $currentUser['lastname'];?>">
                    </p>
                    <div class="clearfix"></div>
                  </div>
                  <div class="field-row">
                    <label for="company-name">ที่อยู่ในการจัดส่ง</label>
                    <input type="text" id="company-name" name="receive_address" value="<?php echo $currentUser['address'];?>">
                  </div>
                  <div class="field-row">
                    <p class="field-one-half">
                      <label for="email-address">อีเมล </label>
                      <input type="email" id="email-address" name="receive_email" value="<?php echo $currentUser['email'];?>">
                    </p>
                    <p class="field-one-half">
                      <label for="phone">หมายเลขโทรศัพท์</label>
                      <input type="text" id="phone" name="receive_phone" value="<?php echo $currentUser['phone'];?>">
                    </p>
                    <div class="clearfix"></div>
                  </div>

                </div><!-- /.fields-content -->
              </div><!-- /.billing-fields -->

            </div><!-- /.box-checkout -->
          </div><!-- /.col-md-7 -->
          <div class="col-md-5">
            <div class="cart-totals style2">
              <h3>รายการสั่งซื้อ</h3>

              <table class="product">
                <thead>
                  <tr>
                    <th>สินค้า</th>
                    <th>ราคา</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($_SESSION["shopping_cart"])){
                    $total = 0;
                    $amount = 0;
                    $i=0;

                    foreach($_SESSION["shopping_cart"] as $keys => $values)  {
                      $sumPrice = $values["item_price"] * $values["item_amount"];
                      $amount += $values["item_amount"];
                      $total += $sumPrice;
                      ?>
                      <tr>
                        <td>
                          <?php echo $values["item_pro_name"];?>
                          <input type="hidden" name="products_id[]" value="<?php echo $values["item_id"];?>">
                          <input type="hidden" name="amount[]" value="<?php echo $values["item_amount"];?>">
                          <input type="hidden" name="price[]" value="<?php echo $values["item_price"];?>">
                          <input type="hidden" name="sum_price[]" value="<?php echo $sumPrice;?>">
                        </td>
                        <td><?php echo number_format($sumPrice);?></td>
                      </tr>
                    <?php } ?>
                  <?php } ?>
                </tbody>
              </table><!-- /.product -->

              <table>
                <tbody>
                  <?php if(!empty($_SESSION["shopping_cart"])){
                    $amount = 0;

                    foreach($_SESSION["shopping_cart"] as $keys => $values)  {
                      $amount += $values["item_amount"];
                      ?>
                      <tr>
                        <td>จำนวนที่สั่ง</td>
                        <td><?php echo number_format($amount);?></td>
                      </tr>
                    <?php } ?>
                  <?php } ?>
                  <tr>
                    <td>ค่าจัดส่ง</td>
                    <?php
                    if($total_weight >= 1 && $total_weight <= 3){
                      $send_price = 45;
                    }else if($total_weight >= 4 && $total_weight <= 5){
                      $send_price = 80;
                    }else if($total_weight >= 6 && $total_weight <= 10){
                      $send_price = 100;
                    }else if($total_weight >= 11 && $total_weight <= 15){
                      $send_price = 115;
                    }else if($total_weight >= 16 && $total_weight <= 20){
                      $send_price = 155;
                    }else if($total_weight >= 21 && $total_weight <= 25){
                      $send_price = 205;
                    }else if($total_weight >= 26 && $total_weight <= 30){
                      $send_price = 330;
                    }else{
                      $send_price = 420;
                    }
                    ?>
                    <?php $send_price = $send_price * $amount;?>
                    <td class="sub-total"><?php echo number_format($send_price);?> บาท</td>
                  </tr>
                  <tr>
                    <?php $total = $total + $send_price;?>
                    <td>Total</td>
                    <td class="price-total"><?php echo number_format($total);?> บาท</td>
                  </tr>
                </tbody>
              </table>

              <input type="hidden" name="total_price" value="<?php echo $total;?>">
              <div class="btn-order" style="text-align: center;">
                <input type="submit" name="submit" class="btn btn-success" value="บันทึก" class="order">
                
              </div><!-- /.btn-order -->

            </div><!-- /.cart-totals style2 -->
          </div><!-- /.col-md-5 -->
        </div><!-- /.row -->
      </form>
    </div><!-- /.container -->
  </section><!-- /.flat-checkout -->

  <?php
  require_once("footer.php");
  ?>


</body>
</html>