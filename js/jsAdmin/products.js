
//product blockView
$(document).ready(function() {
  var url = "http://localhost:3000/product?";
  $.get(url, function(data) {
    //  console.log(data);          
      var all =data.length;
      var show ="";
      for(var i =1;i<=all;i++){
       show+= 
       '<li class="span3">'+
          '<div class="thumbnail">'+
              '<a href="product_details.html?productID='+i+'">'+
                  '<img style="height: 150px; width: auto" src="'+data[i].proImage+'" alt="" />'+
              '</a>'+
              '<div class="caption">'+
                '<h5>'+ data[i].proName+'</h5>'+
                '<h4 style="text-align:center">'+
                '<a class="btn" href="product_details.html?productID='+i+'">'+
                  '<i class="icon-zoom-in"></i></a> '+
                '<a class="btn btn-primary" href="productsEdit.html?productID='+i+'">แก้ไข'+
                  '<i class=""></i></a> '+
                '<a class="btn btn-danger" href="products.html?productID='+i+'">ลบ'+
                  '<i class=""></i></a>'+
                '</h4>'+
              '</div>'+'</div>'+'</li>';
      }
      document.getElementById('thumbnails').innerHTML = show;
  });
});
