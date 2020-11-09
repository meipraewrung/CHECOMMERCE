//product blockView
$(document).ready(function () {
	var url = "http://localhost:3000/productTitle?";
	console.log(url);
	$.get(url, function (data) {
		let show = "";
		for (let i = 0; i < data.length; i++) {
			show += '<li class="subMenu"><h4><b>' + data[i].proType + '</b></h4>' +
				'<ul>'
			for (let j = 0; j < data[i].proGroupN.length; j++) {
				show += '<li><a onclick=Category("' + data[i].proGroupN[j] +'")>'+
						'<i class="icon-chevron-right"></i>' + data[i].proGroupN[j] + '</a></li>'
			}
			show += '</ul>' + '</li>';
			show += '</ul>' + '</li>';
		}
		document.getElementById("sideMenu").innerHTML = show;
	});
});