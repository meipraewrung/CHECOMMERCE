//product listView
var urlSearchParams = URL.searchParams;
let params = new URL(document.location).searchParams;
let pid = params.get("customersID");
let options = {};
var show = "";
// console.log(pid);
$(document).ready(function () {
  var url = "http://localhost:3000/customers?";
  $.get(url, function (data) {
    //   console.log(data);
    var all = data.length;
    let show = "";
    for (let index = 0; index < data.length; index++) {
      // show += JSON.stringify(data[index]);
      if (data[index].id == pid) {
        console.log(data[index]);
        $("#NameSurname").val(data[index].customerNameSurName);
        $("#HBD").val(data[index].customerHBD);
        $("#cusPhone").val(data[index].phone);
        $("#cusEmail").val(data[index].customerEmail);
        $("#cusPW").val(data[index].customerPW);
        $("#PostalCode").val(data[index].pessPostalCode);
        $("#arInfo1").val(data[index].addressInfo1);
        $("#arInfo2").val(data[index].addressInfo2);
        $("#arInfo3").val(data[index].addressInfo3);
        document.getElementById("image").src = data[index].proImage;
        $("#fileInput").val(JSON.stringify(data[index].proImage));
      }
    }
  });
});

function myFunction(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#image").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function imageIsLoaded(e) {
  $("#myImg").attr("src", e.target.result);
  $("#yourImage").attr("src", e.target.result);
}

$("#save").click(function () {
  console.log(pid);
  console.log("SAVE");
  let newuser = {};

  // newuser.id = pid;
  newuser.proGroupN = $("#Groups").val();
  newuser.proName = $("#ProName").val();
  newuser.number = $("#total").val();
  newuser.priceUnit = $("#price").val();
  newuser.proType = $("#type").val();
  newuser.proImage = document.getElementById("image").src;

  console.log(newuser);
  $.ajax({
    url: "http://localhost:3000/customers/" + pid,
    type: "PUT",
    // data: newuser,
    dataType: "json",
    contentType: "application/json",
    data: JSON.stringify(newuser),
    success: function (result) {
      console.log("Updated!");
    },
  });
  $("#err").show();
  setTimeout(location.reload.bind(location), 900);
});
