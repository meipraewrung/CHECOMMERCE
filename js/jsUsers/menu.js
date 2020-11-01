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
		  '<li class="subMenu"><a>'+data[index].proType+'</a>'+
		  	'<ul style="display:none">'+
                '<li><a href="product_details.html?productID='+(index+1)+'"><i class="icon-chevron-right"></i>'+
                data[index].proGroupN+'</a>'
            +'</li>'+'</ul>'+'</li>';
		  // console.log('show',show);
		  
		}
		// console.log('show',show);
		document.getElementById('sideMenu').innerHTML = show;
	});
  });