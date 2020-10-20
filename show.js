$(document).ready(function() {
    var url = "http://localhost:3000/product?";
    $.get(url, function(data) {
      //  console.log(data);          
        var all =data.length;
        var show ="";
        for(var i =0;i<all;i++){
         show+= '<li class="span3">'+
         '<div class="thumbnail">'+
           '<a href="product_details.html?productID='+i+'">'+
           '<img src="themes/images/products/3.jpg" alt="" />'+
           '</a><div class="caption">'+
             '<h5>'+ data[i].proName+'</h5>'+
             '<h4 style="text-align:center">'+
             '<a class="btn" href="product_details.html?productID='+i+'">'+
              '<i class="icon-zoom-in"></i></a> '+
               '<a class="btn" href="product_summary.html?productID='+i+'">Add to '+
               '<i class="icon-shopping-cart"></i></a>'+ 
               '<a class="btn btn-primary" href="#">&euro;'+data[i].priceUnit+'</a></h4>'+
           '</div> </div></li>';
        }
        console.log(show);
        //$('#totalProduct').append(all);
        document.getElementById('thumbnails').innerHTML = show;
    });
});
