//product blockView
$(document).ready(function() {
    var url = "http://localhost:3000/orderStatus?";
    console.log(url);
    $.get(url, function(data) {
      console.log('data',data);          
        var all =data.length;
        let show = "";
        console.log(data.length);
          show+= 
          
                '<thead>' +
                    '<tr>' +
                            '<th>ชื่อผู้สั่ง</th>' +
                            '<th>ชื่อสินค้า</th>' +
                            '<th>จำนวน(ชิ้น)</th>' +
                            '<th></th>' +
                    '</tr>' +
                '</thead>' ;
        for (let index = 0; index < all; index++) {
            show+= 
                '<tbody>' +
                    '<tr>'+
                        '<td>' + data[index].customerNameSurName + '</td>' +
                        '<td>' + data[index].nameProduct + '</td>' +
                        '<td>' + data[index].amount + '</td>' +
                        '<td>' +
                            '<a href="/pages/admin/orderListDetails.html?productID='+(index+1)+'"  class="btn" id=""><i  class="icon-zoom-in"></i></a>' +
                        '</td>' + 
                    '</tr>' + 
                '</tbody>';}
          // console.log('show',show);
        
        // console.log('show',show);
        document.getElementById('productOrder').innerHTML = show;
    });
  });