<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php

$currentUser = getCurrentUser($_SESSION["id"]);
if(isset($_POST["submit"])){

  editProfile($_POST["id"],$_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["address"],$_POST["phone"],$_POST["email"]);
    
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
                  <h3>แก้ไขข้อมูลส่วนตัว</h3>
                </div>
                <br/>
                <form method="post" action="">
                  <input type="hidden" required="" class="form-control" name="id" value="<?php echo $currentUser['id'];?>">
                  <div class="form-group">
                    Username <input type="text" required="" class="form-control" name="username" placeholder="Username" value="<?php echo $currentUser['username'];?>">
                  </div>
                  <div class="form-group">
                    Password<input type="password" required="" class="form-control" name="password" placeholder="Password" value="<?php echo $currentUser['password'];?>">
                  </div>
                  <div class="form-group">
                    Firstname<input type="text" required="" class="form-control" name="firstname" placeholder="ชื่อ" value="<?php echo $currentUser['firstname'];?>">
                  </div>
                  <div class="form-group">
                    Lastname<input type="text" required="" class="form-control" name="lastname" placeholder="นามสกุล" value="<?php echo $currentUser['lastname'];?>">
                  </div>
                  <div class="form-group">
                    Address<input type="text" required="" class="form-control" name="address" placeholder="ที่อยู่" value="<?php echo $currentUser['address'];?>">
                  </div>
                  <div class="form-group">
                    Phone<input type="text" required="" class="form-control" name="phone" placeholder="โทรศัพท์" value="<?php echo $currentUser['phone'];?>">
                  </div>
                  <div class="form-group">
                    Email<input type="text" required="" class="form-control" name="email" placeholder="อีเมล" value="<?php echo $currentUser['email'];?>">
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