<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentOrders = getCurrentOrders($_GET["order_id"]);
$currentUser =    ($currentOrders["users_id"]);
$allOrderDetail = getAllOrderDetail($_GET["order_id"]);

?>
<?php
if (isset($_POST["submit"])) {

  savePayment($_POST["orders_id"], $_POST["pay_by"], $_POST["bank_to"], $_POST["bank_from"], $_POST["bank_branch"], $_POST["amount_pay"], $_FILES["slipt_img"]["name"]);
}
?>

<body>

  <?php
  require_once("nav.php");
  ?>

  <section class="flat-checkout">
    <div class="container">
      <form action="" method="post" class="checkout" accept-charset="utf-8" enctype="multipart/form-data">
        <input type="hidden" id="first-name" name="orders_id" placeholder="" value="<?php echo $_GET['order_id']; ?>">
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
                <thead style="font-size: 17px;">
                  <tr>
                    <th>สินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวนที่สั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($allOrderDetail)) { ?>
                    <?php echo "<h3>ไม่พบข้อมูล</h3>"; ?>
                  <?php } else { ?>
                    <?php $total = 0; ?>
                    <?php $amount = 0; ?>
                    <?php foreach ($allOrderDetail as $data) { ?>
                      <?php $total += $data["sum_price"]; ?>

                      <?php $amount += number_format($data["amount"]); ?>
                      <?php $sum_price += number_format($data["sum_price"]); ?>

                      <tr>
                        <td>
                          <?php echo $data["pro_name"]; ?>
                        </td>
                        <td><?php echo $sum_price; ?></td>
                        <td><?php echo $amount; ?></td>
                      </tr>
                    <?php } ?>
                  <?php } ?>
                </tbody>
              </table><!-- /.product -->
              <table>
                <tbody>
                  <tr>
                    <td>ค่าจัดส่ง</td>
                    <td class="sub-total"><?php echo number_format($currentOrders["total_send_price"]); ?> บาท</td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td class="price-total"><?php echo number_format($currentOrders["total_price"]); ?> บาท</td>
                  </tr>
                </tbody>
              </table>

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