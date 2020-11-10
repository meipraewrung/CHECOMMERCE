//product blockView
var nameType = "all";

$(document).ready(function () {
  nameType = "all";
  Pages(1);
});

function Category(name) {
  nameType = name;
  console.log(name);
  Pages(1);
}

function Pages(page) {
  var url = "http://localhost:3000/product?";

  console.log(url);

  $.get(url, function (data) {
    var min = 14 * page - 14;
    var max = 14 * page;

    console.log("Item : form " + min + " to " + max);

    var show = "";

    var item = [];

    data.forEach((element) => {
      if (nameType == element.proGroupN || nameType == "all") {
        item.push(element);
      }
    });

    if (nameType == "all") {
      for (let index = min; index <= max; index++) {
        show +=
          '<li class="span3">' +
          '<div class="thumbnail" style="height: 350px;>' +
          '<a href="/pages/users/productDetails.html?productID=' +
          item[index].id +
          '">' +
          '<img style="height: 150px; width: auto" src="/./' +
          item[index].proImage +
          '" alt="" />' +
          "</a>" +
          '<div class="caption">' +
          "<h5>" +
          JSON.stringify(item[index].proName) +
          "</h5>" +
          "<p>" +
          item[index].priceUnit +
          "</p>" +
          '<h4 style="text-align:center">' +
          '<a class="btn" href="/pages/users/productDetails.html?productID=' +
          (index + 1) +
          '">' +
          '<i class="icon-zoom-in"></i></a> ' +
          // '<a class="btn" href="/pages/users/productSummary.html?productID='+(index+1)+'">'+'เพิ่ม'+
          // 	'<i class="icon-shopping-cart"></i></a> '+
          '<a class="btn" href="#">' +
          "เพิ่ม" +
          '<i class="icon-shopping-cart"></i></a> ' +
          '<a class="btn btn-primary" href="#">฿' +
          item[index].priceUnit +
          "</a></h4>" +
          "</div>" +
          "</div>" +
          "</li>";
      }
    } else {
      for (let index = 0; index < item.length; index++) {
        show +=
          '<li class="span3">' +
          '<div class="thumbnail" style="height: 350px;>' +
          '<a href="/pages/users/productDetails.html?productID=' +
          item[index].id +
          '">' +
          '<img style="height: 150px; width: auto" src="/./' +
          item[index].proImage +
          '" alt="" />' +
          "</a>" +
          '<div class="caption">' +
          "<h5>" +
          JSON.stringify(item[index].proName) +
          "</h5>" +
          "<p>" +
          item[index].priceUnit +
          "</p>" +
          '<h4 style="text-align:center">' +
          '<a class="btn" href="/pages/users/productDetails.html?productID=' +
          (index + 1) +
          '">' +
          '<i class="icon-zoom-in"></i></a> ' +
          // '<a class="btn" href="/pages/users/productSummary.html?productID='+(index+1)+'">'+'เพิ่ม'+
          // 	'<i class="icon-shopping-cart"></i></a> '+
          '<a class="btn" href="#">' +
          "เพิ่ม" +
          '<i class="icon-shopping-cart"></i></a> ' +
          '<a class="btn btn-primary" href="#">฿' +
          item[index].priceUnit +
          "</a></h4>" +
          "</div>" +
          "</div>" +
          "</li>";
      }
    }
    // console.log('show',show);
    document.getElementById("showProduct").innerHTML = show;
  });
}

var urlSearchParams = URL.searchParams;
let params = new URL(document.location).searchParams;
let pid = params.get("productID");
let options = {};
var show = "";
console.log(pid);
$(document).ready(function () {
  console.log(pid);
  var url = "http://localhost:3000/product?";
  $.get(url, function (data) {
    console.log(data);
    var all = data.length;
    let show = "";
    for (let index = 0; index < all; index++) {
      // show += JSON.stringify(data[index]);
      console.log(data[index].productID);

      if (data[index].id == pid) {
        show +=
          '<div class="row">' +
          '<div class="span10">' +
          '<div class="span2">' +
          '<img style="height: 150px; width: auto" src="/./' +
          data[index].proImage +
          '" alt="" />' +
          "</div>" +
          '<div class="span4">' +
          "<h3>" +
          data[index].proName +
          "</h3>" +
          '<hr class="soft" />' +
          "<h4>ประเภทสินค้า : " +
          data[index].proType +
          "</h4>" +
          "<h4>กลุ่มสินค้า : " +
          data[index].proGroupN +
          "</h4>" +
          "<p><b>ชื่อสินค้า : </b>" +
          data[index].proName +
          "</p>" +
          '<hr class="soft" />' +
          "</div>" +
          '<div class="span3 alignR">' +
          '<form class="form-horizontal qtyFrm">' +
          "<h3>ราคา : " +
          data[index].priceUnit +
          " บาท</h3>" +
          '<a class="btn btn-primary" href="/pages/admin/productsEdit.html?productID=' +
          (index + 1) +
          '">แก้ไข' +
          '<i class=""></i></a> ' +
          '<a class="btn btn-danger" href="/pages/admin/products.html?productID=' +
          (index + 1) +
          '">ลบ' +
          '<i class=""></i></a>' +
          "<br><br>" +
          '<a href="/pages/admin/products.html" class="btn btn-danger" id="cancle">กลับ<i class=""></i></a>' +
          "<form>" +
          "</div>" +
          '<div class="span10">' +
          "<p style='font-size: 19px;'><b>รายละเอียดของสินค้า : </b><br>";
        for (let j = 0; j < data[index].productDetail.length; j++) {
          console.log(data[index].productDetail.length);
          show += data[index].productDetail[j] + "<br>";
        }
        show += "</p>" + "</div>";
        "</div>" + '<hr class="soft" />';

        // else {
        //   alert("Can not find");
        //   $("#err").show();
        //   window.location.href = "/pages/admin/products.html"
        // }
      }
    }
    document.getElementById("proListView").innerHTML = show;
  });
});
