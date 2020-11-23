<?php
//$user = getUser($_SESSION["id"]);
if (isset($_GET['logout'])) {
  logout();
}


$allCategory = getAllCategory();


?>
<section id="header" class="header">
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <ul class="flat-support">
           <li class="phone">
            ติดต่อเรา: <a href="#" title="">(074) 610464</a>
          </li>

        </ul><!-- /.flat-support -->
      </div><!-- /.col-md-4 -->
      <div class="col-md-8">
        <ul class="flat-unstyled">
          <li class="account">
            <a href="#" title="">สมาชิก<i class="fa fa-angle-down" aria-hidden="true"></i></a>
            <ul class="unstyled">
              <?php if($_SESSION["id"] == "" || empty($_SESSION["id"])){ ?>
                <li>
                  <a href="login.php" title="">เข้าสู่ระบบ</a>
                </li>
                <li>
                  <a href="register.php" title="">สมัครสมาชิก</a>
                </li>
              <?php }else{ ?>
                <li>
                  <a href="profile.php" title="">แก้ไขข้อมูลส่วนตัว</a>
                </li>
                <li><a class="nav-link nav_item" href="?logout=true">ออกจากระบบ</a></li> 
              <?php } ?>

            </ul><!-- /.unstyled -->
          </li>
        </ul><!-- /.flat-unstyled -->
      </div><!-- /.col-md-4 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.header-top -->
<div class="header-middle">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div id="logo" class="logo">
          <a href="index.php" title="">
            <img src="images/logos/logo2.png" alt="">
          </a>
        </div><!-- /#logo -->
      </div><!-- /.col-md-3 -->
      <div class="col-md-6">
        <!--<div class="top-search">
          <form action="#" method="get" class="form-search" accept-charset="utf-8">

            <div class="box-search">
              <input type="text" name="search" placeholder="Search what you looking for ?">
              <span class="btn-search">
                <button type="submit" class="waves-effect"><img src="images/icons/search.png" alt=""></button>
              </span>

            </div>
          </form>
        </div>-->
      </div>
      <div class="col-md-3">



        <?php if($_SESSION["id"] != "" && !empty($_SESSION["id"])){ ?>
        <div class="box-cart">
          <?php 
          $numArr = count($_SESSION["shopping_cart"]);
          if(isset($_GET["action"]))  
          {  
            if($_GET["action"] == "delete")  
            {  
             foreach($_SESSION["shopping_cart"] as $keys => $values)  
             {  
              if($values["item_id"] == $_GET["id"])  
              {  
               unset($_SESSION["shopping_cart"][$keys]);  
               echo '<script>alert("ลบรายการที่เลือกแล้ว")</script>';  
               echo '<script>window.history.go(-1)</script>';  
             }  
           }  
         }  
       }
       ?>
       <div class="inner-box">
        <a href="#" title="">
          <div class="icon-cart">
            <img src="images/icons/cart.png" alt="">
            <span><?php echo $numArr;?></span>
          </div>
              <!--<div class="price">

                0.00
              </div>-->
            </a>
            <div class="dropdown-box">


              <div class="ps-cart-item"><a class="ps-cart-item__close" href="?action=delete&id=<?php echo $values["item_id"]; ?>"></a>
                <div class="ps-cart-item__thumbnail"><img src="images/products/<?php echo $values["item_pro_image"];?>" alt="">
                </div>
                <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="#"><?php echo $values["item_products_name"];?></a>
                  <p><span>จำนวน:<i><?php echo $values["item_amount"];?></i></span><span>ราคา:<i><?php echo $values["item_price"];?></i></span></p>
                </div>
              </div>

              <ul>
                <?php if(!empty($_SESSION["shopping_cart"])){
                  $total = 0;
                  $amount = 0;
                  $i=0;

                  foreach($_SESSION["shopping_cart"] as $keys => $values)  {
                    $sumPrice = $values["item_price"] * $values["item_amount"];
                    $amount += $values["item_amount"];
                    $total += $sumPrice;
                    ?>
                    <li>
                      <div class="img-product">
                        <img src="images/product/<?php echo $values["item_product_img"];?>" alt="">
                      </div>
                      <div class="info-product">
                        <div class="name">
                          <?php echo $values["item_pro_name"];?>
                        </div>
                        <div class="price">
                          <span><?php echo $values["item_amount"];?> x</span>
                          <span><?php echo $values["item_price"];?></span>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <a href="?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="delete">x</span></a>
                      
                    </li>
                  <?php } ?>
                <?php } ?>

              </ul>
              <div class="total">
                <span>รวมราคา:</span>
                <span class="price"><?php echo number_format($total); ?></span>
              </div>
              <div class="btn-cart">
                <a href="checkout.php" class="check-out" title="">ยืนยันการสั่งซื้อ</a>
              </div>
            </div>
          </div><!-- /.inner-box -->
        </div><!-- /.box-cart -->

      <?php } ?>
      </div><!-- /.col-md-3 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.header-middle -->
<div class="header-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-2">
        <div id="mega-menu">
          <div class="btn-mega"><span></span>Menu</div>
          
        </div>
      </div><!-- /.col-md-3 -->
      <div class="col-md-9 col-10">
        <div class="nav-wrap">
          <div id="mainnav" class="mainnav">
            <ul class="menu">
              <li class="column-1">
                <a href="index.php" title="">หน้าหลัก</a>
              </li>
              <li class="column-1">
                <a href="about.php" title="">เกี่ยวกับเรา</a>
              </li>

              <?php if($_SESSION["id"] == "" || empty($_SESSION["id"])){ ?>

              <?php }else{ ?>

                <?php if($_SESSION["status"] == 1){ ?>
                  <li class="has-mega-menu">
                    <a href="#" title="">สินค้า</a>
                    <div class="submenu">
                      <div class="row">

                        <?php if(empty($allCategory)){ ?>
                          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                        <?php }else{?>
                          <?php $i=1;?>
                          <?php foreach($allCategory as $dataCate){ ?>
                            <div class="col-lg-3 col-md-12">
                              <h3 class="cat-title"><?php echo $dataCate["cate_name"];?></h3>
                              <ul class="submenu-child">
                                <?php $allGroupsInCategory = getAllGroupsInCategory($dataCate["id"]); ?>
                                <?php if(empty($allGroupsInCategory)){ ?>
                                  <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                                <?php }else{?>
                                  <?php $i=1;?>
                                  <?php foreach($allGroupsInCategory as $dataGroup){ ?>
                                    <li>
                                      <a href="all_product.php?cate_id=<?php echo $dataCate["id"];?>&group_id=<?php echo $dataGroup["id"];?>"><?php echo $dataGroup["group_name"];?></a>
                                    </li>
                                  <?php } ?>
                                <?php } ?>

                              </ul>
                            </div>
                          <?php } ?>
                        <?php } ?>

                      </div>

                    </div>
                  </li>
                  <li class="column-1">
                    <a href="history_buy.php" title="">ประวัติการสั่งซื้อ</a>
                  </li>
                  <li class="column-1">
                    <a href="how_pay.php" title="">วิธีการชำระเงิน</a>
                  </li>
                <?php } ?>

                <?php if($_SESSION["status"] == 2){ ?>
                  <li class="column-1">
                    <a href="#" title="">จัดการข้อมูล</a>
                    <ul class="submenu">
                      <li>
                        <a href="manage_category.php" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>จัดการประเภทสินค้า</a>
                      </li>
                      <li>
                        <a href="manage_groups.php" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>จัดการกลุ่มสินค้า</a>
                      </li>
                      <li>
                        <a href="manage_product.php" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>จัดการสินค้า</a>
                      </li>

                    </ul>
                  </li>
                  <li class="column-1">
                    <a href="check_pay.php" title="">ตรวจสอบการชำระ</a>
                  </li>
                  <li class="column-1">
                    <a href="all_history_order.php" title="">การสั่งซื้อทั้งหมด</a>
                  </li>
                  <li class="column-1">
                    <a href="report.php" title="">รายงาน</a>
                  </li>
                <?php } ?>
                




              <?php } ?>
              

              <li class="column-1">
                <a href="contact.php" title="">ติดต่อเรา</a>
              </li>

              
              <!--<li class="column-1">
                <a href="shop.html" title="">Shop</a>
                <ul class="submenu">
                  <li>
                    <a href="shop.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop left sidebar</a>
                  </li>
                  <li>
                    <a href="shop-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop right sidebar</a>
                  </li>
                  <li>
                    <a href="shop-v3.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop list view</a>
                  </li>
                  <li>
                    <a href="shop-v4.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop full width</a>
                  </li>
                  <li>
                    <a href="shop-v5.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop 03 column</a>
                  </li>
                  <li>
                    <a href="shop-cart.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop cart</a>
                  </li>
                  <li>
                    <a href="shop-checkout.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop checkout</a>
                  </li>
                </ul>
              </li>-->


            </ul><!-- /.menu -->
          </div><!-- /.mainnav -->
        </div><!-- /.nav-wrap -->

      </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.header-bottom -->
  </section><!-- /#header -->