﻿<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$allHistoryBuy = getAllHistoryBuy($_SESSION["id"]);
$status_map = array( 1=>'<a style="color:red">ค้างชำระ</a>',2=>'<a style="color:blue">รอการตรวจสอบ</a>',3=>'<a style="color:green">ชำระเรียบร้อย</a>',4=>'<a style="color:green">จัดส่งเรียบร้อย</a>');
if (isset($_GET['delete'])) {
  deleteHistoryBuy($_GET['delete']);
}
?>
<body>

  <?php
  require_once("nav.php");
  ?>


  <section class="flat-tracking background">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="order-tracking">
            <div class="title">
              <h3>ประวัติการสั่งซื้อสินค้า</h3>
            </div><!-- /.title -->
            <div class="tracking-content">
              <table class="table table-condensed" style="width:100%;">
                <thead style="font-size: 17px;">
                  <tr>
                    <td style="width:15%;">ผู้รับ</td>
                    <td style="width:17%;">ที่อยู่การจัดส่ง</td>
                    <td>โทรศัพท์</td>
                    <td>วันที่สั่งซื้อ</td>
                    <td>เวลาที่สั่งซื้อ</td>
                    <td>ราคารวม</td>
                    <td style="width:13%;">สถานะ</td>
                    <td style="width:31%;"></td>
                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($allHistoryBuy)){ ?>
                    <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                  <?php }else{?>
                    <?php $i=1;?>
                    <?php foreach($allHistoryBuy as $data){ ?>
                      <tr>
                        <td><?php echo $data["receive_firstname"];?> <?php echo $data["receive_lastname"];?></td>
                        <td><?php echo $data["receive_address"];?></td>
                        <td><?php echo $data["receive_phone"];?></td>
                        <td><?php echo formatDateFull($data["date_order"]);?></td>
                        <td><?php echo $data["time_order"];?></td>
                        <td><?php echo number_format($data["total_price"]);?></td>
                        <td><?php echo $status_map[$data["status"]];?></td>
                        <td>
                          <?php if($data["status"] == 1){ ?>
                            <a href="pay_order.php?order_id=<?php echo $data['id'];?>" class="btn btn-warning">ชำระเงิน</a>
                          <?php } ?>
                          <a href="detail_order.php?order_id=<?php echo $data['id'];?>" class="btn btn-info">รายละเอียด</a>
                          <?php if($data["status"] == 1){ ?>
                                    <a href="?delete=<?php echo $data['id'];?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการลบ');">ยกเลิกการสั่ง</a>
                          <?php } ?>
                        </td>
                        
                      </tr>
                      <?php $i++; ?>
                    <?php } ?>
                  <?php } ?>
                </tbody>
              </table>
            </div><!-- /.tracking-content -->
          </div><!-- /.order-tracking -->
        </div><!-- /.col-md-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.flat-tracking -->

  <?php
  require_once("footer.php");
  ?>


</body>
</html>