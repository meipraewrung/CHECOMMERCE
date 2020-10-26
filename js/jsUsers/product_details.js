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
          '<div class="span2">'+
            '<img style="height: 150px; width: auto" src="'+data[index].proImage+'" alt="" />'+
          '</div>'+
          '<div class="span4">'+
            '<h3>'+ JSON.stringify(data[index].proName)+'</h3>'+
            '<hr class="soft" />'+
            '<h5>'+ JSON.stringify(data[index].proName)+'</h5>'+
            '<p>'+ JSON.stringify(data[index].proName)+'</p>'+
            '<a class="btn btn-small pull-right" href="productsDetails.html?productID='+index+'">รายละเอียด'+
              '<i class=""></i></a>'+
            '<hr class="soft" />'+
          '</div>'+
          '<div class="span3 alignR">'+
            '<form class="form-horizontal qtyFrm">'+
              '<h3>฿'+data[index].priceUnit+'</h3>'+
              '<a class="btn btn-primary" href="productsEdit.html?productID='+(index+1)+'">แก้ไข'+
                '<i class=""></i></a> '+
              '<a class="btn btn-danger" href="products.html?productID='+(index+1)+'">ลบ'+
                '<i class=""></i></a>'+
            '<form>'+'</div>'+'</div>'+
            '<hr class="soft" />';
        }
        // else {
        //   alert("Can not find");
        //   $("#err").show();
        //   window.location.href = "products.html"
        // }
          }
      document.getElementById('proListView').innerHTML = show;
    });
  });