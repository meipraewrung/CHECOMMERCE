var urlSearchParams = URL.searchParams;
let params = new URL(document.location).searchParams;
let pid = params.get("customersID");
let options = {};
var show = "";
console.log(pid); //product blockView
$(document).ready(function () {
  var url = "http://localhost:3000/customers?";
  console.log(url);
  $.get(url, function (data) {
    console.log("data", data);
    var all = data.length;
    let show = "";
    for (let index = 0; index < all; index++) {
      console.log(data[index].customersID);
      if (data[index].id == pid) {
        show += "";
        // console.log('show',show);
      }
    }
    // console.log('show',show);
    document.getElementById("CTM").innerHTML = show;
  });
});
