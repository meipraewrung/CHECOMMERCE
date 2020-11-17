var urlSearchParams = URL.searchParams;
let params = new URL(document.location).searchParams;
let pid = params.get("productID");
let options = {};
var show = "";
console.log(pid);
$(document).ready(function () {
  console.log(pid);
  var url = "http://localhost:3000/orderStatus?";
  $.get(url, function (data) {
    console.log(data);
    var all = data.length;
    let show = "";
    for (let index = 0; index < all; index++) {
      // show += JSON.stringify(data[index]);
      console.log(data[index].productID);

      if (data[index].id == pid) {
        show +=
            '<div class="span8">' +
                '<h3>ชื่อผู้สั่ง : ' + data[index].customerNameSurName  + '</h3>' + 
                '<p style="font-size: 15px;"><b style="font-size: 17px;">เบอร์โทรติดต่อ : </b>' + data[index].phone  + '</p>' +
                '<p style="font-size: 15px;"><b style="font-size: 17px;">ที่อยู๋ในการจัดส่ง : </b>' + data[index].address  + '</p>' +
                '<p style="font-size: 15px;"><b style="font-size: 17px;">ชื่อสินค้า : </b>' + data[index].nameProduct  + '</p>' +
                '<p style="font-size: 15px;"><b style="font-size: 17px;">จำนวน : </b>' + data[index].amount  + '<b style="font-size: 17px;"> ชิ้น</b></p>' +
                '<p style="font-size: 15px;"><b style="font-size: 17px;">ราคา : </b>' + data[index].piece  + '<b style="font-size: 17px;"> บาท</b></p>' +
                '<p style="font-size: 15px;"><b style="font-size: 17px;">ค่าจัดส่ง : </b>' + data[index].deliveryCost  + '<b style="font-size: 17px;"> บาท</b></p>' +
                '<p style="font-size: 15px;"><b style="font-size: 17px;">รวมการสั้งซื้อ : </b>' + data[index].includingOrder  + '<b style="font-size: 17px;"> บาท</b></p>' +
                '<p style="font-size: 17px;"><b style="font-size: 21px;">สถานะการจัดส่ง : </b>' + data[index].status  + '<b style="font-size: 17px;"></b></p>' +
                '<div class="span8 alignR">' +
                    '<a href="/pages/admin/statusProduct.html" class="btn btn-danger">กลับ<i class=""></i></a>' +
                '</div>' +
            '</div>';

        // else {
        //   alert("Can not find");
        //   $("#err").show();
        //   window.location.href = "/pages/admin/products.html"
        // }
      }
    }
    document.getElementById("orderListDT").innerHTML = show;
  });
});
