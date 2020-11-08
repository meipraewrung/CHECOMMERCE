$("#login").click(function () {
  var email = document.getElementById("inputEmail").value;
  var pwd = document.getElementById("inputPassword").value;

  var url = "http://localhost:3000/customers?";

  $.get(url, function (customersData) {
    console.log("customers", customersData);
    console.log("email&pw", email, pwd, customersData);
    
    isNotMatch = true;

    //start loop match customer
    customersData.forEach((element) => {
      if (email === element.customerEmail && pwd === element.customerPW) {
        isNotMatch = false;
        console.log("email&pw", email, pwd);
        $("#suc").show();
        console.log("SuccessAdmin");
        window.location.href = "/../index.html";
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
