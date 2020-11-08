$("#login").click(function () {
    var email = document.getElementById("inputEmail").value;
    var pwd = document.getElementById("inputPassword").value;
  
    var url = "http://localhost:3000/admin?";
  
    $.get(url, function (adminData) {
      console.log("admin", adminData);
      console.log("email&pw", email, pwd, adminData);
      isNotMatch = true;
  
      //start loop match customer
      adminData.forEach((element) => {
        if (email === element.adminEmail && pwd === element.adminPW) {
          isNotMatch = false;
          console.log("email&pw", email, pwd);
          $("#suc").show();
          console.log("SuccessUser");
          window.location.href = "/pages/admin/products.html" ;
        }
      });
  
      //end loop
      if (isNotMatch) {
        console.log("Error Password or Email");
        alert("Error Password or Email");
        $("#err").show();
      }
    });
  });
  