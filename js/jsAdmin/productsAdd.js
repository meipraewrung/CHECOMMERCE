function toUniqueArray(a){
    var newArr = [];
    for (var i = 0; i < a.length; i++) {
        if (newArr.indexOf(a[i]) === -1) {
            newArr.push(a[i]);
        }
    }
  return newArr;
}



$(document).ready(function () {
    var url = "http://localhost:3000/product?";
    $.get(url, function (data) {

        var all = data.length;
        var r = "";
        for (var i = 1; i <= all; i++) {
           
            r+='"'+data[i].proGroupN+'",';
        
            return r;
        }
        console.log(r);
        
        var unique='' ;
        console.log(unique);
        console.log("==========");
        unique=r.filter((v, i, a) => a.indexOf(v) === i);
        console.log(unique);
   
                // console.log(r+'<br>');
                
                // $("#save").click(function () {
                //     var newuser = {};
                //    // newuser.id = data.id;
                //     newuser[i].customerID = $("#customerID").val();
                //     newuser[i].contactName = $("#contactName").val();
                //     newuser[i].contactTitle = $("#contactTitle").val();
                //     newuser[i].address.street = $("#street").val();
                //     newuser[i].address.city = $("#city").val();
                //     newuser[i].address.region = $("#region").val();
                //     newuser[i].address.postalCode = $("#postalCode").val();
                //     newuser[i].address.country = $("#country").val();
                //     newuser[i].address.phone = $("#phone").val();
                //     console.log(JSON.stringify(newuser));
                //     // var updateUrl = "http://localhost:3000/product" ;
                //     $.ajax({
                //         url: Url,
                //         type: 'POST',
                //         contentType: "application/json; charset=utf-8",
                //         data: newuser,
                //         success: function (result) {
                //             console.log('Updated!');
                //         }
                //     });
                //     $("#err").show();
                //     setTimeout(location.reload.bind(location), 900);
                // });
            

        


    });

});



// $(document).ready(function () {
//     var url = "http://localhost:3000/product?";

//                 $("#save").click(function () {
//                     var newuser = {
//                         "proGroupN": "ตู้เย็น 1 ประตู",
//                         "proName": "ตู้เย็น SAMSUNG รุ่น RA19PT2",
//                         "number": "1",
//                         "priceUnit": "5590.56",
//                         "proType": "เครื่องใช้ไฟฟ้าภายในบ้าน" = data.id;
//                     };
//                    // newuser.id = data.id;
//                     newuser[i].customerID = $("#customerID").val();
//                     newuser[i].contactName = $("#contactName").val();
//                     newuser[i].contactTitle = $("#contactTitle").val();
//                     newuser[i].address.street = $("#street").val();
//                     newuser[i].address.city = $("#city").val();
//                     newuser[i].address.region = $("#region").val();
//                     newuser[i].address.postalCode = $("#postalCode").val();
//                     newuser[i].address.country = $("#country").val();
//                     newuser[i].address.phone = $("#phone").val();
//                     console.log(JSON.stringify(newuser));
//                     $.ajax({
//                         url: url,
//                         type: 'PUT',
//                         contentType: "application/json; charset=utf-8",
//                         data: newuser,
//                         success: function (result) {
//                             console.log('Updated!');
//                         }
//                     });
//                     $("#err").show();
//                     setTimeout(location.reload.bind(location), 900);
//                 });

// });

