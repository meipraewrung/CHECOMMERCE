<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php

$currentUser = getCurrentUser($_SESSION["id"]);
if (isset($_POST["submit"])) {

  editProfile($_POST["id"], $_POST["username"], $_POST["password"], $_POST["firstname"], $_POST["lastname"], $_POST["address"], $_POST["phone"], $_POST["email"]);
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
              <br /><br />
              <div class="padding_eight_all bg-white">
                <div class="heading_s1">
                  <h3>แก้ไขข้อมูลส่วนตัว</h3>
                </div>
                <br />
                <form method="post" action="">
                  <input type="hidden" required="" class="form-control" name="id" value="<?php echo $currentUser['id']; ?>">
                  <div class="form-group">
                  ชื่อผู้ใช้งาน <input type="text" required="" class="form-control" name="username" placeholder="ชื่อผู้ใช้งาน" value="<?php echo $currentUser['username']; ?>" pattern="^[a-zA-Z\s]+$" title="Username ต้องเป็นภาษาอังกฤษเท่านั้น ตัวอย่าง:customer">
                  </div>
                  <div class="form-group">
                  รหัสผ่าน <input type="password" required="" class="form-control" name="password" placeholder="รหัสผ่าน" value="<?php echo $currentUser['password']; ?>" pattern="[a-zA-Z0-9-_\.].{7,45}" title="Password ต้องมีมากกว่าหรือเท่ากับ 8 ตัวขึ้นไป ตัวอย่าง:customer103">
                  </div>
                  <div class="form-group">
                  ชื่อ <input type="text" required="" class="form-control" name="firstname" placeholder="ชื่อ" value="<?php echo $currentUser['firstname']; ?>" pattern="^[ก-๙]+$" title="ชื่อต้องเป็นภาษาไทยเท่านั้น ตัวอย่าง:นิยม">
                  </div>
                  <div class="form-group">
                  นามสกุล <input type="text" required="" class="form-control" name="lastname" placeholder="นามสกุล" value="<?php echo $currentUser['lastname']; ?>" title="นามสกุลอต้องเป็นภาษาไทยเท่านั้น ตัวอย่าง:ยินดี">
                  </div>
                  <div class="form-group">
                  ที่อยู่ <input type="text" required="" class="form-control" name="address" placeholder="ที่อยู่" value="<?php echo $currentUser['address']; ?>" title="กรุณากรอกที่อยู่ ตัวอย่าง:ที่อยู่ 103 หมู่ที่ 3 ตำบลเขาเจียก เขต/อำเภอเมืองพัทลุง จังหวัดพัทลุง 93103">
                  </div>
                  <div class="form-group">
                  เบอร์โทรศัพท์ <input type="text" required="" class="form-control" name="phone" placeholder="เบอร์โทรศัพท์" value="<?php echo $currentUser['phone']; ?>" pattern="^0([8|9|6])([0-9]{8}$)" title="กรุณากรอกเบอร์มือถือตัวเลข 10 หลัก ตัวอย่าง:0888888888">
                  </div>
                  <div class="form-group">
                  อีเมล <input type="text" required="" class="form-control" name="email" placeholder="อีเมล" value="<?php echo $currentUser['email']; ?>" placeholder="อีเมล" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Email ยังไม่ถูกต้อง ตัวอย่าง:abc123@Gmail.com">
                  </div>


                  <div class="form-group">
                    <?php if ($_SESSION["status"] == 1 ||  $_SESSION["status"] == 2) { ?>
                      <button type="submit" class="btn btn-fill-out btn-block btn-warning" name="submit">บันทึก</button>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-fill-out btn-block btn-warning" name="submit">ลงทะเบียน</button>
                    <?php } ?>
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