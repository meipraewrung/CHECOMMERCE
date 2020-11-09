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


function myFunction(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result);
                // .width(150)
                // .height(200);
        };

        reader.readAsDataURL(input.files[0]);
        // console.log(themes/images/products.files[0]);

    }
  }

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
    $('#yourImage').attr('src', e.target.result);
};

$("#Add").click(function () {
    console.log('ADD');
    let newProducts = {};
    // newProducts.id = pid;
    newProducts.proGroupN = $("#Groups").val();
    newProducts.proName = $("#ProName").val();
    newProducts.number = $("#total").val();
    newProducts.priceUnit = $("#price").val();
    newProducts.proType = $("#type").val(); 
    newProducts.proImage = document.getElementById('image').src;

    console.log(newProducts);
    
    $.ajax({
        url: "http://localhost:3000/product/",
        type: 'POST',
        // data: newProducts,
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(newProducts),
        success: function (result) {
            // window.location.href = "/pages/admin/productsEdit.html";
            console.log('Updated!');
        }
    });
    $("#err").show();
    window.open('/pages/admin/products.html');
    // window.location.href = "/pages/admin/products.html";
    // setTimeout(location.reload.bind(window.location.href = "/pages/admin/products.html"), 900);
});


