<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 

$currentProduct = getCurrentProduct($_GET["id"]);
$runNumber = runNumberProduct();
$allCategory = getAllCategory();
$allGroups = getAllGroups();
$allGroupsInCategory = getAllGroupsInCategoryProduct($currentProduct['categories_id']);

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
              
              <li data-thumb="themes/images/products/NoImage.gif">
                <?php if($currentProduct["product_img"] == ""){ ?>
                  <img id="blah" src="themes/images/products/NoImage.gif" alt='' width='400' height='300' />
                <?php }else{ ?>
                  <img id="blah" src="images/product/<?php echo $currentProduct["product_img"];?>" alt='' width='400' height='300' />
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
              <select name="categories_id" class="form-control" id="categories_id">
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
              <?php if ($currentProduct['groups_id'] == ""){ ?>
              <select name="groups_id" id="groups_id" class="form-control"></select>
              <?php }else{ ?>
                <select name="groups_id" id="groups_id" class="form-control">
                <option value="">-- โปรดเลือกประเภทสินค้า --</option>
                <?php foreach($allGroupsInCategory as $dataGr){ ?>
                  <?php $selected = ""; 
                  if($currentProduct['groups_id'] == $dataGr['id']){
                    $selected = " selected"; 

                  } 
                  ?> 
                  <option value="<?php echo $dataGr['id'];?>" <?php echo $selected;?>><?php echo $dataGr['group_name'];?></option>
                <?php } ?>
              </select>

              <?php } ?>
            </div>
            <div class="one-half order-id">
              <label for="order-id">รหัสสินค้า</label>
              <input type="text" id="cate_name" readonly name="pro_number" placeholder="รหัสสินค้า" value="<?php if($_GET["id"] == "" ){ echo $runNumber;}else { echo $currentProduct['pro_number']; } ?>">
            </div>
            <div class="one-half order-id">
              <label for="order-id">ชื่อสินค้า</label>
              <input type="text" id="cate_name" name="pro_name" placeholder="ชื่อสินค้า" value="<?php echo $currentProduct['pro_name'];?>">
            </div>
            <div class="one-half order-id">
              <label for="order-id">รายละเอียด</label>
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
              <label for="order-id">จำนวน(ชิ้น)</label>
              <input type="text" id="cate_name" name="qunatity" placeholder="จำนวน(ชิ้น)" value="<?php echo $currentProduct['qunatity'];?>">
            </div>
            <div class="one-half order-id">
              <label for="order-id">ราคาต่อชิ้น</label>
              <input type="text" id="cate_name" name="price" placeholder="ราคาต่อชิ้น" value="<?php echo $currentProduct['price'];?>">
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

<script>
      $(function(){
        var defaultOption = '<option value=""> ------- เลือก ------ </option>';


        $('#categories_id').change(function() {
          $("#groups_id").html(defaultOption);
          $.ajax({
      // A string containing the URL to which the request is sent.
      url: "json_filter/jsonAction.php",
      // Data to be sent to the server.
      data: ({ nextList : 'groups_id', categoriesId: $('#categories_id').val() }),
      // The type of data that you're expecting back from the server.
      dataType: "json",
      beforeSend: function() {
      },
      // success is called if the request succeeds.
      success: function(json){
        // Iterate over a jQuery object, executing a function for each matched element.
        $.each(json, function(index, value) {
          // Insert content, specified by the parameter, to the end of each element
          // in the set of matched elements.
          $("#groups_id").append('<option value="' + value.id + '">' + value.group_name + '</option>');
        });
      }
    });
        });

      });
</script>

  <?php
  require_once("footer.php");
  ?>


</body>
</html>