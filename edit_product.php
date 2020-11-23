<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 

$currentProduct = getCurrentProduct($_GET["id"]);
$allCategory = getAllCategory();
$allGroups = getAllGroups();
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveProduct($_POST["categories_id"],$_POST["groups_id"],$_POST["pro_number"],$_POST["pro_name"],$_POST["pro_detail"],$_POST["pro_size"],$_POST["pro_weight"],$_POST["qunatity"],$_POST["price"],$_POST["status"],$_FILES["product_img"]["name"]);
  }else{
    editProduct($_POST["id"],$_POST["categories_id"],$_POST["groups_id"],$_POST["pro_number"],$_POST["pro_name"],$_POST["pro_detail"],$_POST["pro_size"],$_POST["pro_weight"],$_POST["qunatity"],$_POST["price"],$_POST["status"],$_FILES["product_img"]["name"]);
  }
}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม สินค้า";
}else{
  $txtHead = "แก้ไข สินค้า";
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
                <?php if($currentProduct["pro_image"] == ""){ ?>
                  <img id="blah" src="images/product/flexslider/big-size.jpg" alt='' width='400' height='300' />
                <?php }else{ ?>
                  <img id="blah" src="images/product/<?php echo $currentProduct["pro_image"];?>" alt='' width='400' height='300' />
                <?php } ?>
                
              </li>
            </ul><!-- /.slides -->
          </div><!-- /.flexslider -->
        </div><!-- /.col-md-6 -->
        <div class="col-md-6">
          <form action="#" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?php echo $currentProduct['id'];?>">
            <div class="one-half order-id">
              <label for="order-id">ประเภทสินค้า</label>
              <select name="categories_id" class="form-control">
                <option value="">-- โปรดเลือกประเภทสินค้า --</option>
                <?php foreach($allCategory as $dataCate){ ?>
                  <?php $selected = ""; 
                  if($currentProduct['categories_id'] == $dataCate['id']){
                    $selected = " selected"; 

                  } 
                  ?> 
                  <option value="<?php echo $dataCate['id'];?>" <?php echo $selected;?>><?php echo $dataCate['cate_name'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="one-half order-id">
              <label for="order-id">กลุ่มสินค้า</label>
              <select name="groups_id" id="groups_id" class="form-control">
                <option value="">-- โปรดเลือกประเภทสินค้า --</option>
                <?php foreach($allGroups as $dataGroup){ ?>
                  <?php $selected = ""; 
                  if($currentProduct['groups_id'] == $dataGroup['id']){
                    $selected = " selected"; 

                  } 
                  ?> 
                  <option value="<?php echo $dataGroup['id'];?>" <?php echo $selected;?>><?php echo $dataGroup['group_name'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="one-half order-id">
              <label for="order-id">รหัสสินค้า</label>
              <input type="text" id="cate_name" name="pro_number" placeholder="รหัสสินค้า" value="<?php echo $currentProduct['pro_number'];?>">
            </div>
            <div class="one-half order-id">
              <label for="order-id">ชื่อสินค้า</label>
              <input type="text" id="cate_name" name="pro_name" placeholder="ชื่อสินค้า" value="<?php echo $currentProduct['pro_name'];?>">
            </div>
            <div class="one-half order-id">
              <label for="order-id">รายละเอีบด</label>
              <textarea id="comment-contact" name="pro_detail"><?php echo $currentProduct['pro_detail'];?></textarea>
            </div>
            <div class="one-half order-id">
              <label for="order-id">ขนาด (เซนติเมตร)</label>
              <input type="text" id="cate_name" name="pro_size" placeholder="ขนาด" value="<?php echo $currentProduct['pro_size'];?>">
            </div>
            <div class="one-half order-id">
              <label for="order-id">น้ำหนัก (กิโลกรัม)</label>
              <input type="text" id="cate_name" name="pro_weight" placeholder="น้ำหนัก" value="<?php echo $currentProduct['pro_weight'];?>">
            </div>
            <div class="one-half order-id">
              <label for="order-id">หน่วยจำนวน</label>
              <input type="text" id="cate_name" name="qunatity" placeholder="หน่วยจำนวน" value="<?php echo $currentProduct['qunatity'];?>">
            </div>
            <div class="one-half order-id">
              <label for="order-id">ราคาต่อหน่วย</label>
              <input type="text" id="cate_name" name="price" placeholder="ราคาต่อหน่วย" value="<?php echo $currentProduct['price'];?>">
            </div>
            <div class="one-half order-id">
              <label for="order-id">รูปสินค้า</label>
              <input type="file" id="imgInp" name="product_img" class="form-control">
            </div>
            <div class="one-half order-id">
              <label for="order-id">สถานะสินค้า</label>
              <select name="status" id="status" class="form-control">
                <option value="0" <?php if($currentProduct['status'] == 0){ ?> selected<?php } ?>>ปกติ</option>
                <option value="1" <?php if($currentProduct['status'] == 1){ ?> selected<?php } ?>>สินค้าหมด</option>
                <option value="2" <?php if($currentProduct['status'] == 2){ ?> selected<?php } ?>>งดขายชั่วคราว</option>
              </select>
            </div>
            <div class="btn-track" style="text-align: center;">
              <br/>
              <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
            </div><!-- /.container -->
          </form>
        </div><!-- /.col-md-6 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.flat-product-detail -->

  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });
  </script>

  <?php
  require_once("footer.php");
  ?>


</body>
</html>