var urlSearchParams = URL.searchParams;
let params = (new URL(document.location)).searchParams;
let tid = params.get("id");
let options = {};
var show='';
console.log(tid);
  
$(document).ready(function() {
    var url = "http://localhost:3000/products?";
    $.get(url, function(data) {
        var all = data.length;
        console.log(all);
        
       var Product = all+("Item");
        $('#totalProduct').append(Product);
    });
});

$(document).ready(function() {
    var url = "http://localhost:3000/products?";
    $.get(url, function(data) {
        // console.log(data);          
        var all =data.length;
        var r ="";
        for(var i =0;i<all;i++){
            if(data[i].productID===tid){
            r += '<tr><td>'+data[i].productID+'</td><td>'+"Group :"+
         +data[i].proGroupN+'</td><td>'
         +"Name"+data[i].proName+'</td><td>'
         +"number"+data[i].number+'</td><td>'
         +"Unit :"+data[i].apriceUnit+'</td><td>'+
         "Type :"+ data[i].address.proType + 
         '</td></tr>';                   
        }  
    }
        document.getElementById('dataTable').innerHTML = r;
        console.log(r);
      
    });
});