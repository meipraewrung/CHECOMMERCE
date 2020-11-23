<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 

$currentGroups = getCurrentGroups($_GET["id"]);
$allCategory = getAllCategory();
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveGroups($_POST["categories_id"],$_POST["group_name"]);
  }else{
    editGroups($_POST["id"],$_POST["categories_id"],$_POST["group_name"]);
  }
  

}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม กลุ่มสินค้า";
}else{
  $txtHead = "แก้ไข กลุ่มสินค้า";
}

?>
<body>

  <?php
  require_once("nav.php");
  ?>



  <section class="flat-product-detail">
    <div class="container">
      <div class="title">
        <h3><?php echo $txtHead;?></h3>
      </div>
      <br/><br/>
      <div class="row">
        <div class="col-md-6">
          <div class="flexslider">
            <ul class="slides">
              <li data-thumb="images/product/flexslider/thumb/2.jpg">
                <img src="images/product/flexslider/big-size.jpg" alt='' width='400' height='300' />
              </li>
            </ul><!-- /.slides -->
          </div><!-- /.flexslider -->
        </div><!-- /.col-md-6 -->
        <div class="col-md-6">
          <form action="#" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $currentGroups['id'];?>">
            <div class="one-half order-id">
              <label for="order-id">ประเภทสินค้า</label>
              <select name="categories_id" class="form-control">
                <option value="">-- โปรดเลือกประเภทสินค้า --</option>
                <?php foreach($allCategory as $dataCate){ ?>
                  <?php $selected = ""; 
                  if($currentGroups['categories_id'] == $dataCate['id']){
                    $selected = " selected"; 

                  } 
                  ?> 
                  <option value="<?php echo $dataCate['id'];?>" <?php echo $selected;?>><?php echo $dataCate['cate_name'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="one-half order-id">
              <label for="order-id">กลุ่มสินค้า</label>
              <input type="text" id="group_name" name="group_name" placeholder="ชื่อประเภทสินค้า" value="<?php echo $currentGroups['group_name'];?>">
            </div><!-- /.one-half order-id -->
            <div class="btn-track" style="text-align: center;">
              <br/>
              <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
            </div><!-- /.container -->
          </form>
        </div><!-- /.col-md-6 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.flat-product-detail -->
  <?php
  require_once("footer.php");
  ?>


</body>
</html>