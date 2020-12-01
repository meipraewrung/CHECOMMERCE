<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$currentProduct = getCurrentProduct($_GET["id"]);
$currentCategory = getCurrentCategory($_GET["id"]);
$currentGroups = getCurrentGroups($_GET["id"]);
?>

<?php 
if(isset($_POST["add_to_cart"]))  
{
  if(isset($_SESSION["shopping_cart"]))  
  {
    //session_destroy();
    //die();
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_POST["pro_id"], $item_array_id))  
    {  
      $count = count($_SESSION["shopping_cart"]);
      
      $item_array = array(
       'item_id' => $_POST["pro_id"],  
       'item_pro_number' => $_POST["pro_number"],
       'item_pro_name' => $_POST["pro_name"],
       'item_pro_size' => $_POST["pro_size"],
       'item_pro_weight' => $_POST["pro_weight"],
       'item_price' => $_POST["price"],
       'item_product_img' => $_POST["product_img"],
       'item_amount' => $_POST["amount"]  
     );
      $_SESSION["shopping_cart"][$count] = $item_array;
      echo '<script>window.history.go(-1)</script>'; 
    }  
    else  
    {  
      echo '<script>alert("รายการนี้มีสั่งแล้ว")</script>';  
      echo '<script>window.history.go(-1)</script>';  
    }  
  }else{
    $item_array = array(  
      'item_id' => $_POST["pro_id"],  
       'item_pro_number' => $_POST["pro_number"],
       'item_pro_name' => $_POST["pro_name"],
       'item_pro_size' => $_POST["pro_size"],
       'item_pro_weight' => $_POST["pro_weight"],
       'item_price' => $_POST["price"],
       'item_product_img' => $_POST["product_img"],
       'item_amount' => $_POST["amount"]  
    );  
    $_SESSION["shopping_cart"][0] = $item_array;
    echo '<script>window.history.go(-1)</script>';  
  }
}




?>
<body>

  <?php
  require_once("nav.php");
  ?>

  <section class="flat-product-detail">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="flexslider">
            <ul class="slides">
              <li data-thumb="images/product/<?php echo $currentProduct['product_img'];?>">
                <a href='#' id="zoom" class='zoom'><img src="images/product/<?php echo $currentProduct['product_img'];?>" alt='' width='400' height='300' /></a>
              </li>
              
            </ul><!-- /.slides -->
          </div><!-- /.flexslider -->
        </div><!-- /.col-md-6 -->


        <div class="col-md-6">
          <form action="" method="post">
            <input type="hidden" class="form-control" name="pro_id" value="<?php echo $currentProduct["id"];?>">
            <input type="hidden" class="form-control" name="pro_number" value="<?php echo $currentProduct["pro_number"];?>">
            <input type="hidden" class="form-control" name="pro_name" value="<?php echo $currentProduct["pro_name"];?>">
            <input type="hidden" class="form-control" name="pro_size" value="<?php echo $currentProduct["pro_size"];?>">
            <input type="hidden" class="form-control" name="pro_weight" value="<?php echo $currentProduct["pro_weight"];?>">
            <input type="hidden" class="form-control" name="price" value="<?php echo $currentProduct["price"];?>">
            <input type="hidden" class="form-control" name="product_img" value="<?php echo $currentProduct["product_img"];?>">
            <div class="product-detail">
              <div class="header-detail">
                <h4 class="name"><?php echo $currentProduct['pro_name'];?></h4>
                <div class="category">
                  <?php echo $currentGroups['group_name'];?>
                </div>
              <!--<div class="reviewed">
                
                <div class="status-product">
                  Availablity <span>In stock</span>
                </div>
              </div>-->
            </div><!-- /.header-detail -->
            <div class="content-detail">
              <div class="price">
                <div class="sale">
                  <?php echo number_format($currentProduct['price']);?> บาท
                </div>
              </div>
              <div class="product-qunatity">
                จำนวนที่มี : <span class="id"><?php echo $currentProduct['qunatity'];?></span>
              </div>
              <div class="info-text">
                <?php echo $currentProduct['pro_detail'];?>
              </div>
              <div class="product-id">
                รหัสสินค้า : <span class="id"><?php echo $currentProduct['pro_number'];?></span>
              </div>
              <!-- <div class="product-size-weight"> -->
                <!-- ขนาด : <span class="id"><?php /*echo $currentProduct['pro_size'];*/?></span> ซ.ม.&emsp;&emsp;&emsp; --> <!-- /.&emsp; 4*3 -->
                <!-- น้ำหนัก : <span class="id"><?php /*echo $currentProduct['pro_weight'];*/?></span> ก.ก. -->
              <!-- </div> -->
            </div><!-- /.content-detail -->
            <div class="footer-detail">
              <div class="quanlity-box">

                <div class="quanlity">
                  <input type="text" name="amount" value="" min="1" max="100" placeholder="Quanlity" required>
                </div>
              </div><!-- /.quanlity-box -->
              <div class="box-cart style2" >
                <div class="btn-add-cart">
                  <?php if($_SESSION["id"] != ""){ ?>
                    <?php if($_SESSION["status"] == 1){ ?>
                    <button type="submit" name="add_to_cart" class="btn btn-danger"><img src="images/icons/add-cart.png" alt="">ใส่ตะกร้า</button>
                    <?php }else{ ?>
                      <p style="color: red;">สงวนสิทธิ์สำหรับสมาชิก หรือลูกค้าเท่านั้น</p>
                    <?php } ?>
                  <?php }else{ ?>
                    <p style="color: red;">กรุณาสมัครสมาชิก หรือเข้าสู่ระบบเพื่อทำการสั่งซื้อ</p>
                  <?php } ?>
                </div>
              </div><!-- /.box-cart -->
              
            </div><!-- /.footer-detail -->
          </div><!-- /.product-detail -->
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