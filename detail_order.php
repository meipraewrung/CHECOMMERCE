<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentOrders = getCurrentOrders($_GET["order_id"]);
$currentUser = getCurrentUser($currentOrders["users_id"]);
$allOrderDetail = getAllOrderDetail($_GET["order_id"]);
$currentPaymentOrder = getCurrentPaymentOrder($_GET["order_id"]);

$bank_map = array( 1=>'<a style="color:green">เลขที่บัญชี 1-234-56789-0 ชื่อบัญชี บริษัท ซีเอชพัทลุง จำกัด ธนาคาร กสิกรไทย สาขา พัทลุง</a>');

$status_map = array( 1=>'<a style="color:red">ค้างชำระ</a>',2=>'<a style="color:blue">รอการตรวจสอบ</a>',3=>'<a style="color:green">ชำระเรียบร้อย</a>',4=>'<a style="color:green">จัดส่งเรียบร้อย</a>');
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
              <h3 class="title">รายละเอียดการสั่งซื้อ</h3>

              <div class="billing-fields">
                <div class="fields-title">
                  <h3>สั่งซื้อโดย</h3>
                  <span></span>
                  <div class="clearfix"></div>
                </div><!-- /.fields-title -->
                <div class="fields-content">
                  <div class="field-row">
                    <label for="company-name">สั่งซื้อโดย : <?php echo $currentUser["firstname"];?> <?php echo $currentUser["lastname"];?></label>
                  </div>
                  <div class="field-row">
                    <label for="company-name">ชื่อ-นามสกุล ผู้รับ : <?php echo $currentOrders["receive_firstname"];?> <?php echo $currentOrders["receive_lastname"];?></label>
                  </div>
                  <div class="field-row">
                    <label for="company-name">ที่อยู่ในการจัดส่ง : <?php echo $currentOrders["receive_firstname"];?></label>
                  </div>
                  
                  <div class="field-row">
                    <p class="field-one-half">
                      <label for="email-address">หมายเลขโทรศัพท์ : <?php echo $currentOrders["receive_phone"];?></label>
                    </p>
                    <p class="field-one-half">
                      <label for="phone">อีเมล์ : <?php echo $currentOrders["receive_email"];?></label>
                    </p>

                    <div class="clearfix"></div>
                  </div>
                  <div class="field-row">
                    <p class="field-one-half">
                      <label for="email-address">วันที่สั่งซื้อ : <?php echo formatDateFull($currentOrders["date_order"]);?></label>
                    </p>
                    <p class="field-one-half">
                      <label for="phone">เวลาที่สั่งซื้อ : <?php echo $currentOrders["time_order"];?></label>
                    </p>

                    <div class="clearfix"></div>
                  </div>
                  <div class="field-row">
                    <label for="company-name">สถานะ : <?php echo $status_map[$currentOrders["status"]];?></label>
                  </div>
                  <?php if($currentOrders["status"] == 4){ ?>
                    <div class="field-row">
                      <label for="company-name" style="color:red;">หมายเลขการจัดส่ง : <?php echo $currentOrders["tracking_number"];?></label>
                    </div>
                  <?php } ?>



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
                      <tr>
                        <td>
                          <?php echo $data["pro_name"];?>
                        </td>
                        <td><?php echo number_format($data["sum_price"]);?></td>
                      </tr>
                </tbody>
              </table><!-- /.product -->
              <table>
                <tbody>
                      <tr>
                        <td>จำนวนที่สั่ง</td>
                        <td><?php echo number_format($data["amount"]);?></td>
                      </tr>
                    <?php } ?>
                  <?php } ?>
                  <tr>
                    <td>ค่าจัดส่ง</td>
                    <?php
                    if($total_weight >= 1 && $total_weight >= 4){
                      $send_price = 110;
                    }else if($total_weight >= 5 && $total_weight >= 9){
                      $send_price = 125;
                    }else if($total_weight >= 10 && $total_weight >= 14){
                      $send_price = 165;
                    }else if($total_weight >= 15 && $total_weight >= 19){
                      $send_price = 215;
                    }else if($total_weight >= 20 && $total_weight >= 24){
                      $send_price = 300;
                    }else{
                      $send_price = 390;
                    }
                    ?>
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
              <!-- /.btn-order -->

            </div><!-- /.cart-totals style2 -->
          </div><!-- /.col-md-5 -->
        </div><!-- /.row -->

        <?php if($currentOrders["status"] != 1){ ?>
          <div class="row">
            <div class="col-md-7">
              <div class="box-checkout">
                <h3 class="title">รายละเอียดการชำระ</h3>

                <div class="billing-fields">
                  <div class="fields-title">
                    <h3>รายละเอียด</h3>
                    <span></span>
                    <div class="clearfix"></div>
                  </div><!-- /.fields-title -->
                  <div class="fields-content">
                    <div class="field-row">
                      <label for="company-name">ชำระโดย : <?php echo $currentPaymentOrder["pay_by"];?></label>
                    </div>
                    <div class="field-row">
                      <label for="company-name">ธนาคารที่ชำระ : <?php echo $bank_map[$currentPaymentOrder["bank_to"]];?></label>
                    </div>
                    <div class="field-row">
                      <p class="field-one-half">
                        <label for="email-address">ธนาคารที่โอน : <?php echo $currentPaymentOrder["bank_from"];?></label>
                      </p>
                      <p class="field-one-half">
                        <label for="phone">สาขาที่โอน : <?php echo $currentPaymentOrder["bank_branch"];?></label>
                      </p>
                      <p class="field-one-half">
                        <label for="email-address">วันที่ชำระ : <?php echo formatDateFull($currentPaymentOrder["date_pay"]);?></label>
                      </p>
                      <p class="field-one-half">
                        <label for="phone">เวลาที่ชำระ : <?php echo $currentPaymentOrder["time_pay"];?></label>
                      </p>
                      <div class="field-row">
                        <label for="company-name">จำนวนเงิน : <?php echo number_format($currentPaymentOrder["amount_pay"]);?> บาท</label>
                      </div>

                      <div class="clearfix"></div>
                    </div>

                    <div class="btn-order" style="text-align: center;">
                      <button class="order" onclick="window.history.go(-1); return false;" title="">ย้อนกลับ</button>

                    </div>

                  </div><!-- /.fields-content -->
                </div><!-- /.billing-fields -->

              </div><!-- /.box-checkout -->
            </div><!-- /.col-md-7 -->
            <div class="col-md-5">
              <div class="cart-totals style2">
                <h3>หลักฐานการชำระ</h3>
                <img src="images/slipt/<?php echo $currentPaymentOrder['slipt_img'];?>" alt='' width='400' height='300' />
              </div><!-- /.cart-totals style2 -->
            </div><!-- /.col-md-5 -->
          </div><!-- /.row -->

        <?php } ?>
      </form>
    </div><!-- /.container -->
  </section><!-- /.flat-checkout -->

  <?php
  require_once("footer.php");
  ?>


</body>
</html>