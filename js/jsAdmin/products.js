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
          '<a href="/pages/admin/productsDetails.html?productID=' +
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
          '<a class="btn" href="/pages/admin/productsDetails.html?productID=' +
          (index + 1) +
          '">' +
          '<i class="icon-zoom-in"></i></a> ' +
          '<a class="btn btn-primary" href="/pages/admin/productsEdit.html?productID=' +
          (index + 1) +
          '">แก้ไข' +
          '<i class=""></i></a> ' +
          '<a class="btn btn-danger" href="/pages/admin/products.html?productID=' +
          (index + 1) +
          '">ลบ' +
          '<i class=""></i></a>' +
          "</h4>" +
          "</div>" +
          "</div>" +
          "</li>";
      }
    } else {
      for (let index = 0; index < item.length; index++) {
        show +=
          '<li class="span3">' +
          '<div class="thumbnail" style="height: 350px;>' +
          '<a href="/pages/admin/productsDetails.html?productID=' +
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
          '<a class="btn" href="/pages/admin/productsDetails.html?productID=' +
          (index + 1) +
          '">' +
          '<i class="icon-zoom-in"></i></a> ' +
          '<a class="btn btn-primary" href="/pages/admin/productsEdit.html?productID=' +
          (index + 1) +
          '">แก้ไข' +
          '<i class=""></i></a> ' +
          '<a class="btn btn-danger" href="/pages/admin/products.html?productID=' +
          (index + 1) +
          '">ลบ' +
          '<i class=""></i></a>' +
          "</h4>" +
          "</div>" +
          "</div>" +
          "</li>";
      }
    }

    // console.log('show',show);
    document.getElementById("showProduct").innerHTML = show;
  });
}

//product delete
function handleDelete(id) {
  console.log("D", id);

  $.ajax({
    url: "http://localhost:3000/product/" + id,
    type: "DELETE",
    dataType: "json",
    contentType: "application/json",
    success: function (result) {
      console.log("Updated!");
    },
  });
  $("#err").show();
  setTimeout(location.reload.bind(location), 900);
}
