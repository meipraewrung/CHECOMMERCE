// //product listView
// var urlSearchParams = URL.searchParams;
// let params = (new URL(document.location)).searchParams;
// let pid = params.get("productID");
// let options = {};
// var show='';
// // console.log(pid);
// $(document).ready(function() {
//     var url = "http://localhost:3000/product?";
//     $.get(url, function(data) {
//     //   console.log(data);          
//       var all = data.length;
//       let show = "";
//       for (let index = 0; index < data.length; index++) {
//         // show += JSON.stringify(data[index]);
//         if(data[index].id==pid){
//             console.log(data[index]);
//                 $("#Group").val(JSON.stringify(data[index].proGroupN));
//                 $("#ProName").val(JSON.stringify(data[index].proName));
//                 $("#total").val(data[index].number);
//                 $("#price").val(data[index].priceUnit);
//                 $("#type").val(data[index].proType);
//                 document.getElementById('image').src=data[index].proImage;
//                 $("#fileInput").val(JSON.stringify(data[index].proImage));
//             }
//         }
//     });

// });

var urlSearchParams = URL.searchParams;
let params = (new URL(document.location)).searchParams;
let pid = params.get("productID");
let options = {};
var show='';
console.log(pid);
$(document).ready(function() {
  console.log(pid);
    var url = "http://localhost:3000/product?";
    $.get(url, function(data) {
      console.log(data);          
      var all = data.length;
      let show = "";
      for (let index = 0; index < data.length; index++) {
        // show += JSON.stringify(data[index]);
        console.log(data[index].productID);
        if(data[index].id==pid){
        show+= 
        '<div class="row">'+
        '<div class="span10">'+
            '<div class="span2">'+
                '<img style="height: 150px; width: auto" src="/./'+data[index].proImage+'" alt="" />'+
            '</div>'+
            '<div class="span4">'+
                '<h4>'+ JSON.stringify(data[index].proName)+'</h4>'+
                '<hr class="soft" />'+
                '<h5>'+ JSON.stringify(data[index].proName)+'</h5>'+
                '<p>'+ JSON.stringify(data[index].proName)+'</p>'+
                '<hr class="soft" />'+
            '</div>'+
            '<div class="span3 alignR">'+
                '<h4 style="text-align:center">'+
                    '<a class="btn" href="#">'+'เพิ่ม'+
                        '<i class="icon-shopping-cart"></i></a> '+ 
                    '<a class="btn btn-primary" href="#">฿'+data[index].priceUnit+'</a>'+'</h4>'+
                    '<h4 style="text-align:center">'+
                '<a href="/pages/users/product.html" class="btn btn-danger" id="cancle">กลับ<i class=""></i></a>'+'</h4>'+
                        '</div>'+'</div>'+		
            '<hr class="soft" />';
        }
      }
      document.getElementById('proListView').innerHTML = show;
    });
  });