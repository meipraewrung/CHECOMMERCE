// //product blockView
// $(document).ready(function() {
// 	var url = "http://localhost:3000/product?";
// 	console.log(url);
// 	$.get(url, function(data) {
// 	  console.log('data',data);          
// 		var all =data.length;
// 		let show = "";
// 		for (let index = 0; index < 18; index++) {
// 		  show+= 
// 		  '<li class="span3">'+
// 		  	'<div class="thumbnail" style="height: 350px;">'+
// 		  		'<a href="productDetails.html?productID='+data[index].id+'">'+
// 					'<img style="height: 150px; width: auto" src="'+data[index].proImage+'" alt="" />'+
// 		  		'</a>'+
// 		  		'<div class="caption">'+
// 					'<h5>'+ JSON.stringify(data[index].proName)+'</h5>'+
// 					'<p>'+ data[index].priceUnit+'</p>'+
// 					'<h4 style="text-align:center">'+
// 					'<a class="btn" href="productDetails.html?productID='+(index+1)+'">'+
// 						'<i class="icon-zoom-in"></i></a> '+
// 					// '<a class="btn" href="productSummary.html?productID='+(index+1)+'">'+'เพิ่ม'+
// 					// 	'<i class="icon-shopping-cart"></i></a> '+ 
// 					'<a class="btn" href="#">'+'เพิ่ม'+
// 						'<i class="icon-shopping-cart"></i></a> '+ 
// 					'<a class="btn btn-primary" href="#">฿'+data[index].priceUnit+'</a></h4>'+
// 		 		 '</div>'+'</div>'+'</li>';
// 		  // console.log('show',show);
		  
// 		}
// 		// console.log('show',show);
// 		document.getElementById('showProduct').innerHTML = show;
// 	});
//   });

//   $('#pagination-container').pagination({
// 	dataSource: c1,
// 	totalNumber: 43,
// 	pageSize: 5,
// 	ajax: {
// 	  beforeSend: function () {
// 		$('#data-container').html('Loading data from flickr.com ...');
// 	  }
// 	},
// 	callback: function (data, pagination) {
// 	  // template method of yourself  
// 	  // var html = Handlebars.compile($('#name').html(), {
// 	  //     data: data
// 	  // });                
// 	  // var html = _.template($('#name').html, {
// 	  //     data: data
// 	  // }); 

// 	  var html = simpleTemplating(data);

// 	  $('#data-container').html(html);

// 	}
//   })

//product blockView
$(document).ready(function() {
	var url = "http://localhost:3000/product?";
	console.log(url);
	$.get(url, function(data) {
	  console.log('data',data);          
		var all =data.length;
		let show = "";
		for (let index = 0; index < all; index++) {
		  show+= 
		  '<li class="span3">'+
		  	'<div class="thumbnail" style="height: 350px;>'+
		  		'<a href="/pages/admin/productDetails.html?productID='+data[index].id+'">'+
					'<img style="height: 150px; width: auto" src="'+data[index].proImage+'" alt="" />'+
		  		'</a>'+
		  		'<div class="caption">'+
					'<h5>'+ JSON.stringify(data[index].proName)+'</h5>'+
					'<p>'+ data[index].priceUnit+'</p>'+
					'<h4 style="text-align:center">'+
					'<a class="btn" href="/pages/admin/productDetails.html?productID='+(index+1)+'">'+
						'<i class="icon-zoom-in"></i></a> '+
					// '<a class="btn" href="/pages/admin/productSummary.html?productID='+(index+1)+'">'+'เพิ่ม'+
					// 	'<i class="icon-shopping-cart"></i></a> '+ 
					'<a class="btn" href="#">'+'เพิ่ม'+
						'<i class="icon-shopping-cart"></i></a> '+ 
					'<a class="btn btn-primary" href="#">฿'+data[index].priceUnit+'</a></h4>'+
		 		 '</div>'+'</div>'+'</li>';
		  // console.log('show',show);
		  
		}
		// console.log('show',show);
		document.getElementById('showProduct').innerHTML = show;
	});
  });