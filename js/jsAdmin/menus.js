//product blockView
$(document).ready(function () {
	var url = "http://localhost:3000/product?";
	console.log(url);
	$.get(url, function (data) {
	  var all = data.length;
	  let show = "";
	  sortResults("proType", true);
  
	  for (let index = 0; index < data.length; index++) {
		console.log(data[index].proType);
		if (index == 0) {
		  show +=
			'<li class="subMenu"><a>' +
			data[index].proType +
			"</a>" +
			'<ul style="display:none">' +
			'<li><a href="productsDetails.html?productID=' +
			(index + 1) +
			'"><i class="icon-chevron-right"></i>' +
			data[index].proGroupN +
			"</a>" +
			"</li>" +
			"</ul>" +
			"</li>";
		} else if (index != 0 && data[index].proType != data[index - 1].proType) {
		  show +=
			'<li class="subMenu"><a>' +
			data[index].proType +
			"</a>" +
			'<ul style="display:none">' +
			'<li><a href="productsDetails.html?productID=' +
			(index + 1) +
			'"><i class="icon-chevron-right"></i>' +
			data[index].proGroupN +
			"</a>" +
			"</li>" +
			"</ul>" +
			"</li>";
		  //	  console.log('show',show);
		}
	  }
	  //	console.log('show',show);
	  document.getElementById("sideMenu").innerHTML = show;
  
	  function sortResults(prop, asc) {
		data.sort(function (a, b) {
		  if (asc) {
			return a[prop] > b[prop] ? 1 : a[prop] < b[prop] ? -1 : 0;
		  } else {
			return b[prop] > a[prop] ? 1 : b[prop] < a[prop] ? -1 : 0;
		  }
		});
		//renderResults();
	  }
	});
  });