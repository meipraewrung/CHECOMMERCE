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
