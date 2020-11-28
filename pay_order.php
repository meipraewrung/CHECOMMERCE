<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$allOrderDetail = getAllOrderDetail($_GET["order_id"]);

?>
<?php
if(isset($_POST["submit"])){

  savePayment($_POST["orders_id"],$_POST["pay_by"],$_POST["bank_to"],$_POST["bank_from"],$_POST["bank_branch"],$_POST["amount_pay"],$_FILES["slipt_img"]["name"]);

}
?>
<body>

  <?php
  require_once("nav.php");
  ?>

  <section class="flat-checkout">
    <div class="container">
      <form action="" method="post" class="checkout" accept-charset="utf-8" enctype="multipart/form-data">
        <input type="hidden" id="first-name" name="orders_id" placeholder="" value="<?php echo $_GET['order_id'];?>">
        <div class="row">
          <div class="col-md-7">
            <div class="box-checkout">
              <h3 class="title">ชำระเงิน</h3>

              <div class="billing-fields">
                <div class="fields-title">
                  <h3>รายละเอียดการชำระ</h3>
                  <span></span>
                  <div class="clearfix"></div>
                </div><!-- /.fields-title -->
                <div class="fields-content">
                  <div class="field-row">
                    <label for="company-name">ชื่อ - นามสกุล ผู้ชำระ</label>
                    <input type="text" id="company-name" name="pay_by">
                  </div>
                  <div class="field-row">
                    <label>ชำระผ่านบัญชี</label>
                    <select name="bank_to" required>
                      <option value="">-- โปรดเลือก -- </option>
                      <option value="1">เลขที่บัญชี:413-014756-4 ชื่อบัญชี:นายปณิธาน ชูเชื้อ ธนาคารไทยพาณิชย์ สาขา:เทสโก้โลตัส พัทลุง</option>
                    </select>
                  </div>
                  <div class="field-row">
                    <p class="field-one-half">
                      <label for="email-address">ธนาคารที่โอน </label>
                      <input type="text" id="email-address" name="bank_from">
                    </p>
                    <p class="field-one-half">
                      <label for="phone">สาขาที่โอน</label>
                      <input type="text" id="phone" name="bank_branch">
                    </p>

                    <div class="clearfix"></div>
                  </div>
                  <div class="field-row">
                    <p class="field-one-half">
                      <label for="email-address">จำนวนเงิน </label>
                      <input type="text" id="email-address" name="amount_pay">
                    </p>
                    <p class="field-one-half">
                      <label for="phone">หลักฐานการชำระ</label>
                      <input type="file" name="slipt_img" class="form-control" required>
                    </p>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="btn-order" style="text-align: center;">

                    <input type="submit" name="submit" class="btn btn-success" value="บันทึก" class="order">

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
                  <?php if(empty($allOrderDetail)){ ?>
                    <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                  <?php }else{?>
                    <?php $total = 0;?>
                    <?php $total_weight = 0;?>
                    <?php $amount = 0;?>
                    <?php foreach($allOrderDetail as $data){ ?>
                      <?php $total += $data["sum_price"];?>
                      <?php $total_weight += $data["pro_weight"];?>
                      <?php $amount += number_format($data["amount"]); ?>
                      <tr>
                        <td>
                          <?php echo $data["pro_name"];?>
                        </td>
                        <td><?php echo number_format($data["sum_price"]);?></td>
                      </tr>
                    <?php } ?>
                  <?php } ?>
                </tbody>
              </table><!-- /.product -->
              <table>
                <tbody>
                  <tr>
                    <td>จำนวนที่สั่ง</td>
                    <td><?php echo $amount; ?></td>
                  </tr>
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
              <input type="hidden" id="send_price" name="send_price" placeholder="" value="<?php echo $send_price;?>">
              <input type="hidden" name="total_price" value="<?php echo $total;?>">
              <!-- /.btn-order -->

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