<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$allGroups = getAllGroups();
if (isset($_GET['delete'])) {
  deleteGroups($_GET['delete']);
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
                        <h3>จัดการกลุ่มสินค้า</h3>
                    </div><!-- /.title -->
                    <div class="tracking-content">
                        <a href="edit_groups.php" class="btn btn-success" style="float:right;">เพิ่มกลุ่มสินค้า</a>
                        <table class="table table-condensed">
                          <thead>
                            <tr>
                              <td>ประเภท</td>
                              <td>กลุ่ม</td>
                              <td></td>
                          </tr>
                      </thead>
                      <tbody>
                        <?php if(empty($allGroups)){ ?>
                            <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                        <?php }else{?>
                            <?php $i=1;?>
                            <?php foreach($allGroups as $data){ ?>
                                <tr>
                                  <td><?php echo $data["cate_name"];?></td>
                                  <td><?php echo $data["group_name"];?></td>
                                  <td style="float:right;">
                                    <a href="edit_groups.php?id=<?php echo $data['id'];?>" class="btn btn-warning">แก้ไข</a>
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