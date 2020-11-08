//product blockView
$(document).ready(function () {
	var url = "http://localhost:3000/productTitle?";
	console.log(url);
	$.get(url, function (data) {
		let show = "";
		for (let i = 0; i < data.length; i++) {
			show += '<li class="subMenu"><p><b>' + data[i].proType + '</b></p>' +
				'<ul>'
			for (let j = 0; j < data[i].proGroupN.length; j++) {
				show += '<li><a href="/pages/users/productGroup.html?productID=' + (i + 1) +'">'+
						'<i class="icon-chevron-right"></i>' + data[i].proGroupN[j] + '</a></li>'
			}
			show += '</ul>' + '</li>';
		}
		document.getElementById("sideMenu").innerHTML = show;
	});
});