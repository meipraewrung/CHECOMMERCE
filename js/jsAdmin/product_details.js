//product listView
var urlSearchParams = URL.searchParams;
let params = (new URL(document.location)).searchParams;
let pid = params.get("productID");
let options = {};
var show='';
console.log(pid);
$(document).ready(function() {
    var url = "http://localhost:3000/product?";
    $.get(url, function(data) {
      console.log(data);          
      var all = data.length;
      var showList ="";
      for(var i =1;i<=all;i++){
        if(data[i].customerID===pid){
        showList += '<div id="gallery" class="span3">'+
        '<a href="'+data[i].proImage+'" title="'+data[i].proName+'">'+
          '<img src="'+data[i].proImage+'" style="width:100%"'+
            'alt="'+data[i].proName+'" />'+
        '</a> </div>'+
        '<div class="span6" id="showdetail>'+"<h3>"+data[i].proName+"</h3>"+
        '<small>'+data[i].proGroupN+'</small>'+
        '<hr class="soft" />'+
        '<form class="form-horizontal qtyFrm">'+
          '<div class="control-group">'+
            '<label class="control-label"><span>'+data[i].priceUnit+'</span></label>'+
            '<div class="controls">'+
              '<input type="number" class="span1" placeholder="Qty." disabled />'+
              document.getElementById("favorite").value=data[i].number+
              '<input type="text" class="span1" placeholder="color" disabled />'+
             '</button>  </div> </div> </form>'+
             '<hr class="soft clr" />'+
             '<p>'+data[i].proGroupN+'</p><hr class="soft" /></div>';
          }
          else {
            alert("Can not find");
            window.location.href = "products.html" ;

          }
        }

      document.getElementById('showdetail').innerHTML = showList;
    });
  });