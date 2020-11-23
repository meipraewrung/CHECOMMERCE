<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$allProduct = getAllProduct();
if (isset($_GET['delete'])) {
  deleteProduct($_GET['delete']);
}

$status_map = array( 0=>'<a style="color:green">ปกติ</a>',1=>'<a style="color:blue">สินค้าหมด</a>',2=>'<a style="color:red">งดขายชั่วคราว</a>');

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
                        <h3>จัดการสินค้า</h3>
                    </div><!-- /.title -->
                    <div class="tracking-content">
                        <a href="edit_product.php" class="btn btn-success" style="float:right;">เพิ่มสินค้า</a>
                        <table class="table table-condensed">
                          <thead>
                            <tr>
                              <td>เลขที่</td>
                              <td>สินค้า</td>
                              <td>ประเภท</td>
                              <td>กลุ่ม</td>
                              <td>ขนาด</td>
                              <td>น้ำหนัก</td>
                              <td>จำนวน</td>
                              <td>ราคา</td>
                              <td>สถานะ</td>
                              <td></td>
                          </tr>
                      </thead>
                      <tbody>
                        <?php if(empty($allProduct)){ ?>
                            <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                        <?php }else{?>
                            <?php $i=1;?>
                            <?php foreach($allProduct as $data){ ?>
                                <tr>
                                  <td><?php echo $data["pro_number"];?></td>
                                  <td><?php echo $data["pro_name"];?></td>
                                  <td><?php echo $data["cate_name"];?></td>
                                  <td><?php echo $data["group_name"];?></td>
                                  <td><?php echo $data["pro_size"];?></td>
                                  <td><?php echo $data["pro_weight"];?></td>
                                  <td><?php echo $data["qunatity"];?></td>
                                  <td><?php echo number_format($data["price"]);?></td>
                                  <td><?php echo $status_map[$data["status"]];?></td>
                                  <td style="float:right;">
                                    <a href="edit_product.php?id=<?php echo $data['id'];?>" class="btn btn-warning">แก้ไข</a>
                                    <a href="?delete=<?php echo $data['id'];?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
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