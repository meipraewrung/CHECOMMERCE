//product listView
var urlSearchParams = URL.searchParams;
let params = (new URL(document.location)).searchParams;
let pid = params.get("productID");
let options = {};
var show='';
// console.log(pid);
$(document).ready(function() {
    var url = "http://localhost:3000/orderStatus?";
    $.get(url, function(data) {
    //   console.log(data);          
      var all = data.length;
      let show = "";
      for (let index = 0; index < data.length; index++) {
        // show += JSON.stringify(data[index]);
        if(data[index].id==pid){
            console.log(data[index]);
                $("#customerNameSurName").val(data[index].customerNameSurName);
                $("#phone").val(data[index].phone);
                $("#address").val(data[index].address);
                $("#nameProduct").val(data[index].nameProduct);
                $("#amount").val(data[index].amount);
                $("#piece").val(data[index].piece);
                $("#deliveryCost").val(data[index].deliveryCost);
                $("#includingOrder").val(data[index].includingOrder);
                $("#DateOfReceiving").val(data[index].DateOfReceiving);
                $("#status").val(data[index].status);
            }
        }
    });
});

$("#save").click(function () {
    console.log(pid);
    console.log('SAVE');
    let newuser = {};
    
    // newuser.id = pid;
    newuser.customerNameSurName = $("#customerNameSurName").val();
    newuser.phone = $("#phone").val();
    newuser.address = $("#address").val();
    newuser.nameProduct = $("#nameProduct").val();
    newuser.amount = $("#amount").val(); 
    newuser.piece = $("#piece").val();
    newuser.deliveryCost = $("#deliveryCost").val();
    newuser.includingOrder = $("#includingOrder").val();
    newuser.DateOfReceiving = $("#DateOfReceiving").val();
    newuser.status = $("#status").val(); 

    console.log(newuser);
    // var updateUrl = "http://localhost:3000/product?"+pid ;
    // console.log(updateUrl);
    $.ajax({
        url: "http://localhost:3000/orderStatus/"+pid,
        type: 'PUT',
        // data: newuser,
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(newuser),
        success: function (result) {
            // window.location.href = "/pages/admin/productsEdit.htmlproductID= "+ data[index].productID;
            console.log('Updated!');
        }
    });
    $("#err").show();
    setTimeout(location.reload.bind(location), 900);
});



