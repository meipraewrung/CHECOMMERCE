<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$allHistoryBuy = getAllHistoryBuy($_SESSION["id"]);
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
                        <h3>จัดการประเภทสินค้า</h3>
                    </div><!-- /.title -->
                    <div class="tracking-content">
                        <table class="table table-condensed">
                          <thead>
                            <tr>
                              <td>ชื่อ-นามสกุล ผู้รับ</td>
                              <td>ที่อยู่ในการจัดส่ง</td>
                              <td>โทรศัพท์</td>
                              <td>อีเมล</td>
                              <td>วันที่สั่งซื้อ</td>
                              <td>เวลาที่สั่งซื้อ</td>
                              <td>ราคารวม</td>
                              <td>สถานะ</td>
                              <td></td>
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
                                  <td><?php echo $data["receive_email"];?></td>
                                  <td><?php echo formatDateFull($data["date_order"]);?></td>
                                  <td><?php echo $data["time_order"];?></td>
                                  <td><?php echo number_format($data["total_price"]);?></td>
                                  <td><?php echo $data["status"];?></td>
                                  <td style="float:right;">
                                    <a href="edit_category.php?id=<?php echo $data['id'];?>" class="btn btn-warning">รายละเอียด</a>
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