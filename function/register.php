<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentUser = getCurrentUser($_GET["id"]);
$allProvince = getAllProvince();
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveRegister($_POST["firstname"],$_POST["lastname"],$_POST["address"],$_POST["telephone"],$_POST["email"],$_POST["status"],$_POST["username"],$_POST["password"],$_POST["province"],$_POST["amphures"],$_POST["districts"],$_POST["zip_code"]);
  }else{
    editProfileCustomer($_POST["id"],$_POST["firstname"],$_POST["lastname"],$_POST["address"],$_POST["telephone"],$_POST["email"],$_POST["status"],$_POST["username"],$_POST["password"],$_POST["province"],$_POST["amphures"],$_POST["districts"],$_POST["zip_code"]);
  }
  

}
if($_GET["id"] == ""){
  $txtHead = "สมัครสมาชิก";
}else{
  $txtHead = "แก้ไขโปรไฟล์";
}
?>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<body class="">
  <div class="wrapper ">
    <?php
    require_once("menu.php");
    ?>
    <div class="main-panel">
      <?php
      require_once("nav.php");
      ?>
      <div class="content">
        <div class="container-fluid">
          <form name="prduct_detail_form" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentUser["id"];?>">
            <input type="hidden" class="form-control" name="status" value="3">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title"><?php echo $txtHead;?></h4>
                    <p class="card-category">รายละเอียด</p>
                  </div>
                  <div class="card-body">

                    <legend>โปรดระบุข้อมูล</legend><br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อ <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="firstname" value="<?php echo $currentUser["firstname"];?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">นามสกุล <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="lastname" value="<?php echo $currentUser["lastname"];?>" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">ที่อยู่ <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="address" value="<?php echo $currentUser["address"];?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">จังหวัด <span style="color:red">*</span></label>
                          <select name="province" class="form-control" id="province">
                            <option value="">-- โปรดเลือก --</option>
                            <?php foreach($allProvince as $dataProvince){ ?>
                            <?php $selected = ""; 
                            if($currentSettingEngine['province'] == $dataProvince['id']){
                              $selected = " selected"; 

                            } 
                            ?> 
                            <option value="<?php echo $dataProvince['id']?>" <?php echo $selected;?>><?php echo $dataProvince['name_th']?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">อำเภอ <span style="color:red">*</span></label>
                          <select name="amphures" class="form-control" id="amphures"></select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ตำบล <span style="color:red">*</span></label>
                          <select name="districts" class="form-control" id="districts"></select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">รหัสไปรษณีย์ <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="zip_code" id="zip_code" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">หมายเลขโทรศัพท์ <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="telephone" value="<?php echo $currentUser["telephone"];?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">อีเมล์</label>
                          <input type="text" class="form-control" name="email" value="<?php echo $currentUser["email"];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อผู้ใช้งาน <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="username" value="<?php echo $currentUser["username"];?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">รหัสผ่าน <span style="color:red">*</span></label>
                          <input type="password" class="form-control" name="password" value="<?php echo $currentUser["password"];?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-avatar">
                    <a href="#pablo">
                      <img class="img" src="image/ico_emp.png" />
                    </a>
                  </div>
                  <div class="card-body">

                    <input type="submit" name="submit" class="btn btn-primary btn-round" value="บันทึก">
                    <input type="button" name="botton" class="btn btn-primary btn-round" onClick="javascript:history.go(-1)" value="ย้อนกลับ">
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
      <script>
      $(function() {
        $("#amphur").autocomplete({
          source: "api/api.php?load=allAmphur",
          select: function( event, ui ) {
            event.preventDefault();
            $("#amphur").val(ui.item.value);
          }
        });
      });
      </script>
      <script>
      $(function() {
        $("#province").autocomplete({
          source: "api/api.php?load=allProvince",
          select: function( event, ui ) {
            event.preventDefault();
            $("#province").val(ui.item.value);
          }
        });
      });
      </script>

      <script>
      $(function(){
        var defaultOption = '<option value=""> ------- เลือก ------ </option>';
        $('#province').change(function() {
          $("#amphures").html(defaultOption);
          $.ajax({
      // A string containing the URL to which the request is sent.
      url: "json_filter/jsonAction.php",
      // Data to be sent to the server.
      data: ({ nextList : 'amphures', provinceId: $('#province').val() }),
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
          $("#amphures").append('<option value="' + value.id + '">' + value.name_th + '</option>');
        });
      }
    });
        });

        $('#amphures').change(function() {
          $("#districts").html(defaultOption);
          $.ajax({
      // A string containing the URL to which the request is sent.
      url: "json_filter/jsonAction.php",
      // Data to be sent to the server.
      data: ({ nextList : 'districts', amphuresId: $('#amphures').val() }),
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
          $("#districts").append('<option value="' + value.id + '">' + value.name_th + '</option>');
        });
      }
    });
        });

        $('#districts').change(function() {
          var dis_id = $('#districts').val();
              $.get('api/api.php?load=zip_code&dis_id='+dis_id,function(data){
                equ_line = jQuery.parseJSON(data);
                for (var i = 0, len = equ_line.length; i < len; i++) {
                  $('#zip_code').val(equ_line[i].zip_code);
                }


              });
        });




      });
</script>

<?php
require_once("footer.php");
?>

</div>
</div>


</body>

</html>
