//product listView
var urlSearchParams = URL.searchParams;
let params = (new URL(document.location)).searchParams;
let pid = params.get("productID");
let options = {};
var show='';
// console.log(pid);
$(document).ready(function() {
    var url = "http://localhost:3000/product?";
    $.get(url, function(data) {
    //   console.log(data);          
      var all = data.length;
      let show = "";
      for (let index = 0; index < data.length; index++) {
        // show += JSON.stringify(data[index]);
        if(data[index].id==pid){
            console.log(data[index]);
                $("#Group").val(JSON.stringify(data[index].proGroupN));
                $("#ProName").val(JSON.stringify(data[index].proName));
                $("#total").val(data[index].number);
                $("#price").val(data[index].priceUnit);
                $("#type").val(data[index].proType);
                document.getElementById('image').src=data[index].proImage;
                $("#fileInput").val(JSON.stringify(data[index].proImage));
            }
        }
    });

});