//product blockView
$(document).ready(function() {
  var url = "http://localhost:3000/product?";
  console.log(url);
  $.get(url, function(data) {
    console.log('data',data);          
      var all =data.length;
      let show = "";
      for (let index = 0; index < data.length; index++) {
        show+= 
        '<li class="span3">'+
          '<div class="thumbnail">'+
              '<a href="productsDetails.html?productID='+data[index].productID+'">'+
                  '<img style="height: 150px; width: auto" src="'+data[index].proImage+'" alt="" />'+
              '</a>'+
              '<div class="caption">'+
                '<h5>'+JSON.stringify(data[index].proName)+'</h5>'+
                '<p>'+data[index].priceUnit+'</p>'+
                '<h4 style="text-align:center">'+
                '<a class="btn" href="productsDetails.html?productID='+(index+1)+'">'+
                  '<i class="icon-zoom-in"></i></a> '+
                '<a class="btn btn-primary" href="productsEdit.html?productID='+(index+1)+'">แก้ไข'+
                  '<i class=""></i></a> '+
                '<a class="btn btn-danger" href="products.html?productID='+(index+1)+'">ลบ'+
                  '<i class=""></i></a>'+
                '</h4>'+
              '</div>'+'</div>'+'</li>';
        // console.log('show',show);
      }
      // console.log('show',show);
      document.getElementById('showProduct').innerHTML = show;
  });
});
