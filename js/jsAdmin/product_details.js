//product listView
var urlSearchParams = URL.searchParams;
let params = (new URL(document.location)).searchParams;
let pid = params.get("productID");
let options = {};
var show='';
console.log(pid);
$(document).ready(function() {
    var url = "http://localhost:3000/product?";
    $.get(url, function(data) {
      console.log(data);          
      var all = data.length;
      var showList ="";
      for(var i =1;i<=all;i++){
        showList += 
        '<div class="row">'+
          '<div class="span2">'+
            '<img style="height: 150px; width: auto" src="'+data[i].proImage+'" alt="" />'+
          '</div>'+
          '<div class="span4">'+
            '<h3>'+ data[i].proName+'</h3>'+
            '<hr class="soft" />'+
            '<h5>'+ data[i].proName+'</h5>'+
            '<p>'+ data[i].proName+'</p>'+
            '<a class="btn btn-small pull-right" href="productsDetails.html?productID='+i+'">รายละเอียด'+
              '<i class=""></i></a>'+
            '<hr class="soft" />'+
          '</div>'+
          '<div class="span3 alignR">'+
            '<form class="form-horizontal qtyFrm">'+
              '<h3>฿'+data[i].priceUnit+'</h3>'+
              '<a class="btn btn-primary" href="productsEdit.html?productID='+i+'">แก้ไข'+
                '<i class=""></i></a> '+
              '<a class="btn btn-danger" href="products.html?productID='+i+'">ลบ'+
                '<i class=""></i></a>'+
            '<form>'+'</div>'+'</div>'+
            '<hr class="soft" />';
          }
      document.getElementById('proListView').innerHTML = showList;
    });
  });