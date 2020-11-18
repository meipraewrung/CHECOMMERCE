//product blockView
$(document).ready(function() {
    var url = "http://localhost:3000/orderStatus?";
    console.log(url);
    $.get(url, function(data) {
      console.log('data',data);          
        var all =data.length;
        let show = "";
        console.log(data.length);
        for (let index = 0; index < all; index++) {
          show+= 
          '<div class="form-actions">' +
			'<h3>วันที่จะได้รับสินค้า : ' + data[index].DateOfReceiving + '</h3>'+
			'<div class="row">' +
				'<div class="span2">' +
					'<div class="" id="photoOdHt">' +
						'<div class="control-group">' +
                            '<div class="controls">' +
                            // '<img style="height: 150px; width: auto" src="/./' + item[index].proImage + '" alt="" />' +
								// '<img style="height: 150px; width: auto" src="/./themes/images/bank/ไทยพาณิชย์.png">' +
							'</div>' +
						'</div>' +
					'</div>' +
				'</div>' + 
				'<div class="span5">' +
					'<p style="font-size: 21px;"><b>' + data[index].DateOfReceiving + '</b></p>' +
					'<p style="font-size: 15px;"><b style="font-size: 17px;">จำนวน : </b>' + data[index].amount + '<b style="font-size: 17px;"> ชิ้น</b></p>' +
					'<p style="font-size: 15px;"><b style="font-size: 17px;">ราคา : </b>' + data[index].piece + '<b style="font-size: 17px;"> บาท</b></p>' +
					'<p style="font-size: 15px;"><b style="font-size: 17px;">ค่าจัดส่ง : </b>' + data[index].deliveryCost + '<b style="font-size: 17px;"> บาท</b></p>' +
					'<p style="font-size: 15px;"><b style="font-size: 17px;">รวมการสั้งซื้อ : </b>' + data[index].includingOrder + '<b style="font-size: 17px;"> บาท</b></p>' +
					'<p style="font-size: 17px;"><b style="font-size: 21px;">สถานะการจัดส่ง : </b>' + data[index].status + '<b style="font-size: 17px;"></b></p>' +
				'</div>' +
            '</div>' +
            '</div>';
          // console.log('show',show);
        }
        // console.log('show',show);
        document.getElementById('deliveryStatus').innerHTML = show;
    });
  });