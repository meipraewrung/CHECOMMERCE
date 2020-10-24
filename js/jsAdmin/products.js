//product blockView
$(document).ready(function() {
  var url = "http://localhost:3000/product?";
  console.log(url);
  $.get(url, function(data) {
    console.log('data',data);          
      var all =data.length;
      // for(var i = all; i < data.length;i++){
      //   // console.log( show += data[i]);
      //   // show = data[i];
      //   // console.log('data2',data[i]++);
      //   show = all
      // }
      let show = "";
      for (let index = 0; index < data.length; index++) {
        // show += JSON.stringify(data[index]);
        show+= 
           '<div class="thumbnail">'+
               '<a href="product_details.html?productID='+JSON.stringify(data[index].productID)+'">'+
                   '<img style="height: 150px; width: auto" src="'+data[index].proImage+'" alt="" />'+
               '</a>'+
               '<div class="caption">'+
                 '<h5>'+ JSON.stringify(data[index].proName)+'</h5>'+
                 '<h4 style="text-align:center">'+
                 '<a class="btn" href="product_details.html?productID='+index+'">'+
                   '<i class="icon-zoom-in"></i></a> '+
                 '<a class="btn btn-primary" href="productsEdit.html?productID='+index+'">แก้ไข'+
                   '<i class=""></i></a> '+
                 '<a class="btn btn-danger" href="products.html?productID='+index+'">ลบ'+
                   '<i class=""></i></a>'+
                 '</h4>'+
               '</div>'+'</div>';
        // console.log('show',show);
        
      }
      // console.log('show',show);
      document.getElementById('showproduct').innerHTML = show;
  });
});
