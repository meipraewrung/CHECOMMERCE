<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["submit"])){
    checkLogin($_POST["username"],$_POST["password"]);
}
?>
<body>

  <?php
  require_once("nav.php");
  ?>


  <!-- START MAIN CONTENT -->
  <div class="main_content">

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <br/><br/>
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>เข้าสู่ระบบ</h3>
                            </div>
                            <br/>
                            <form method="post" action="">
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="username" placeholder="ชื่อผู้ใช้งาน">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" name="password" placeholder="รหัสผ่าน">
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="submit">เข้าสู่ระบบ</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->


</div>
<!-- END MAIN CONTENT -->

<?php
require_once("footer.php");
?>


</body>
</html>