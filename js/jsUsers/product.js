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
		  '<a href="product_details.html?productID='+data[index].productID+'">'+
			'<img style="height: 150px; width: auto" src="'+data[index].proImage+'" alt="" />'+
		  '</a>'+
		  '<div class="caption">'+
			'<h5>'+ JSON.stringify(data[index].proName)+'</h5>'+
			'<p>'+ data[index].priceUnit+'</p>'+
			'<h4 style="text-align:center">'+
			'<a class="btn" href="product_details.html?productID='+(index+1)+'">'+
			'<i class="icon-zoom-in"></i></a> '+
			'<a class="btn" href="product_summary.html?productID='+(index+1)+'">'+'เพิ่ม'+
			'<i class="icon-shopping-cart"></i></a> '+ 
			'<a class="btn btn-primary" href="#">฿'+data[index].priceUnit+'</a></h4>'+
		  '</div>'+'</div>'+'</li>';
		  // console.log('show',show);
		  
		}
		// console.log('show',show);
		document.getElementById('showProduct').innerHTML = show;
	});
  });