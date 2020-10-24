<<<<<<< HEAD
=======
//product listView
$(document).ready(function() {
  var url = "http://localhost:3000/product?";
  $.get(url, function(data) {
    console.log(data);          
    var all = data.length;
    var showList ="";
    for(var i =0;i<all;i++){
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
>>>>>>> parent of efb9a4a... Edit Products

//product blockView
$(document).ready(function() {
  var url = "http://localhost:3000/product?";
  $.get(url, function(data) {
    //  console.log(data);          
      var all =data.length;
      var show ="";
<<<<<<< HEAD
      for(var i =1;i<=all;i++){
=======
      for(var i =0;i<all;i++){
>>>>>>> parent of efb9a4a... Edit Products
       show+= 
       '<li class="span3">'+
          '<div class="thumbnail">'+
              '<a href="product_details.html?productID='+i+'">'+
                  '<img style="height: 150px; width: auto" src="'+data[i].proImage+'" alt="" />'+
              '</a>'+
              '<div class="caption">'+
                '<h5>'+ data[i].proName+'</h5>'+
                '<h4 style="text-align:center">'+
<<<<<<< HEAD
                '<a class="btn" href="product_details.html?productID='+i+'">'+
                  '<i class="icon-zoom-in"></i></a> '+
                '<a class="btn btn-primary" href="productsEdit.html?productID='+i+'">แก้ไข'+
                  '<i class=""></i></a> '+
                '<a class="btn btn-danger" href="products.html?productID='+i+'">ลบ'+
                  '<i class=""></i></a>'+
=======
                  '<a class="btn" href="product_details.html?productID='+i+'">'+
                    '<i class="icon-zoom-in"></i></a> '+
                  '<a class="btn btn-primary" href="productsEdit.html?productID='+i+'">แก้ไข'+
                    '<i class=""></i></a> '+
                  '<a class="btn btn-danger" href="products.html?productID='+i+'">ลบ'+
                    '<i class=""></i></a>'+
>>>>>>> parent of efb9a4a... Edit Products
                '</h4>'+
              '</div>'+'</div>'+'</li>';
      }
      document.getElementById('thumbnails').innerHTML = show;
  });
});
