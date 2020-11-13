var urlSearchParams = URL.searchParams;
let params = new URL(document.location).searchParams;
let pid = params.get("customersID");
let options = {};
var show = "";
console.log(pid); //product blockView
$(document).ready(function () {
  var url = "http://localhost:3000/customers?";
  console.log(url);
  $.get(url, function (data) {
    console.log("data", data);
    var all = data.length;
    let show = "";
    for (let index = 0; index < all; index++) {
      console.log(data[index].customersID);
      if (data[index].id == pid) {
        show += "";
        // console.log('show',show);
      }
    }
    // console.log('show',show);
    document.getElementById("CTM").innerHTML = show;
  });
});
$(document).ready(function () {
  var url = "http://localhost:3000/customers?";
  console.log(url);
  $.get(url, function (data) {
    console.log("data", data);
    var all = data.length;
    let show = "";
    for (let index = 0; index < all; index++) {
      console.log(data[index].customersID);
      if (data[index].id == pid) {
        show += 
        "<div class='span6'>" +
            "<h4>"+"ที่อยู่ 1"+"</h4>"+
            "<p>102 หมู่ที่ 2 ตำบลเขาเจียก อำเภอเมืองพัทลุง จ.พัทลุง<br /><br /></p>"+
        "</div>";
        // console.log('show',show);
      }
    }
    // console.log('show',show);
    document.getElementById("addressCTM").innerHTML = show;
  });
});
