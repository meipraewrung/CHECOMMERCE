$(document).ready(function() {
    var url = "http://localhost:3000/product?";
    $.get(url, function(data) {
      //  console.log(data);          
        var all =data.length;
        // var r ="";
        // for(var i =0;i<all;i++){
        //     r += '<tr><td><a href='+'"custdetail.html?id='+data[i].customerID+'"'+">"+data[i].customerID+'</a></td><td>'
        //  +data[i].companyName+'</td><td>'+data[i].contactName+'</td><td>'+data[i].contactTitle+'</td></tr>';                   
        // }  
        console.log(all);
        //$('#totalProduct').append(all);
        document.getElementById('totalProduct').innerHTML = all;
    });
});
