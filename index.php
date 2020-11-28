<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<body class="header_sticky">

  <div>test =======</div>
  <?php
  require_once("header.php");
  $randomProductInIndex = getRandomProductInIndex();
  ?>
  <div class="boxed">

    <div class="overlay"></div>

    <?php
    require_once("nav.php");
    ?>

    <section class="flat-row flat-slider">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="slider owl-carousel center">
              <img src="images/products/Home/ncMV7BBa-CH_Patlung_Exceptional_BannerBig (1).jpg" alt=""><!-- /.imagesHome1 -->
              <img src="images/products/Home/JZ2V2Pnd-S__23511042.jpg" alt=""><!-- /.imagesHome2 -->
            </div><!-- /.slider -->
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.flat-slider -->
    <section class="flat-imagebox">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="product-tab">
              <ul class="tab-list">
                <!-- <li class="active">สินค้าแนะนำ</li> -->
              </ul>
            </div><!-- /.product-tab -->
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->


        <div class="box-product">
          <div class="row">
            <?php if (empty($randomProductInIndex)) { ?>
              <?php echo "<h3>ไม่พบข้อมูล</h3>"; ?>
            <?php } else { ?>
              <?php $i = 1; ?>
              <?php foreach ($randomProductInIndex as $dataPro) { ?>
                <div class="col-lg-3 col-sm-6">
                  <div class="product-box">
                    <div class="imagebox">
                      <ul class="box-image ">
                        <li>
                          <a href="detail_product.php?id=<?php echo $dataPro['id']; ?>" title="">
                            <img style="height:150px; width:auto;" src="images/product/<?php echo $dataPro['product_img']; ?>" alt="">
                          </a>
                        </li>
                      </ul><!-- /.box-image -->
                      <div class="box-content">
                        <div class="cat-name">
                          <a href="detail_product.php?id=<?php echo $dataPro['id']; ?>" title=""><?php echo $dataPro['group_name']; ?></a>
                        </div>
                        <div class="product-name">
                          <a href="detail_product.php?id=<?php echo $dataPro['id']; ?>" title=""><?php echo $dataPro['pro_name']; ?></a>
                        </div>
                        <div class="price">
                          <span class="sale"><?php echo number_format($dataPro['price']); ?></span>
                        </div>
                      </div><!-- /.box-content -->
                      <div class="box-bottom">
                        <div class="btn-add-cart">
                          <a href="detail_product.php?id=<?php echo $dataPro['id']; ?>" title="">
                            <img src="images/icons/add-cart.png" alt="">รายละเอียด
                          </a>
                        </div>
                      </div><!-- /.box-bottom -->
                    </div><!-- /.imagebox -->
                  </div>
                </div>

              <?php } ?>
            <?php } ?>


          </div><!-- /.row -->

        </div><!-- /.box-product -->
      </div><!-- /.container -->
    </section><!-- /.flat-imagebox -->









    <?php
    require_once("footer.php");
    ?>
  </div><!-- /.boxed -->



</body>

</html>