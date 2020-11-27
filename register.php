<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
if(isset($_POST["submit"])){

  saveRegister($_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["address"],$_POST["phone"],$_POST["email"]);
    
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
                  <h3>สมัครสมาชิก</h3>
                </div>
                <br/>
                <form method="post" action="">
                  <div class="form-group">
                    <input type="text" required="" class="form-control" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" required="" class="form-control" name="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="text" required="" class="form-control" name="firstname" placeholder="ชื่อ">
                  </div>
                  <div class="form-group">
                    <input type="text" required="" class="form-control" name="lastname" placeholder="นามสกุล">
                  </div>
                  <div class="form-group">
                    <input type="text" required="" class="form-control" name="address" placeholder="ที่อยู่">
                  </div>
                  <div class="form-group">
                    <input type="text" required="" class="form-control" name="phone" placeholder="โทรศัพท์">
                  </div>
                  <div class="form-group">
                    <input type="text" required="" class="form-control" name="email" placeholder="อีเมล">
                  </div>
                  
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-fill-out btn-block btn-warning" name="submit">ลงทะเบียน</button>
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