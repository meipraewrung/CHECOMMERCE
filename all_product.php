<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentGroups = getCurrentGroups($_GET["group_id"]);
$allProductInGroupAndCategory = getAllProductInGroupAndCategory($_GET["cate_id"],$_GET["group_id"]);
?>
<body>

  <?php
  require_once("nav.php");
  ?>


  <main id="shop">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-12">
          <div class="main-shop">
            <div class="wrap-imagebox">
              <div class="flat-row-title style1">
                <h3><?php echo $currentGroups["group_name"];?></h3>
                <div class="clearfix"></div>
              </div>
              
              <div class="tab-product">
                <div class="sort-box">


                  <?php if(empty($allProductInGroupAndCategory)){ ?>
                    <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                  <?php }else{?>
                    <?php $i=1;?>
                    <?php foreach($allProductInGroupAndCategory as $data){ ?>
                      <div class="product-box style3">
                        <div class="imagebox style1 v3">
                          <div class="box-image">
                            <a href="detail_product.php?id=<?php echo $data['id'];?>" title="">
                              <img src="images/product/<?php echo $data['product_img'];?>" alt="">
                            </a>
                          </div>
                          <div class="box-content">
                            <div class="cat-name">
                              <a href="detail_product.php?id=<?php echo $data['id'];?>" title=""><?php echo $data['group_name'];?></a>
                            </div>
                            <div class="product-name">
                              <a href="detail_product.php?id=<?php echo $data['id'];?>" title=""><?php echo $data['pro_name'];?></a>
                            </div>

                        <!--<div class="status">
                          Availablity: In stock
                        </div>-->

                        <div class="info">
                          <p>
                            <?php echo $data['pro_detail'];?>
                          </p>
                        </div>
                      </div>
                      <div class="box-price">
                        <div class="price">
                          <span class="sale"><?php echo number_format($data['price']);?> บาท</span>
                        </div>
                        <div class="btn-add-cart">
                          <a href="detail_product.php?id=<?php echo $data['id'];?>" title="">
                            <img src="images/icons/add-cart.png" alt="">รายละเอียด
                          </a>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                <?php } ?>
              <?php } ?>

              <div style="height: 9px;"></div>
            </div><!-- /.sort-box -->
          </div><!-- /.tab-product -->
        </div><!-- /.wrap-imagebox -->


            <!--<div class="blog-pagination">
              <span>
                Showing 1–15 of 20 results
              </span>
              <ul class="flat-pagination style1">
                <li class="prev">
                  <a href="#" title="">
                    <img src="images/icons/left-1.png" alt="">Prev Page
                  </a>
                </li>
                <li>
                  <a href="#" class="waves-effect" title="">01</a>
                </li>
                <li>
                  <a href="#" class="waves-effect" title="">02</a>
                </li>
                <li class="active">
                  <a href="#" class="waves-effect" title="">03</a>
                </li>
                <li>
                  <a href="#" class="waves-effect" title="">04</a>
                </li>
                <li class="next">
                  <a href="#" title="">
                    Next Page<img src="images/icons/right-1.png" alt="">
                  </a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>-->


          </div><!-- /.main-shop -->
        </div><!-- /.col-md-8 col-lg-9 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </main><!-- /#shop -->

  <?php
  require_once("footer.php");
  ?>


</body>
</html>