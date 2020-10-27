// $.validator.setDefaults({
//     highlight: function(element) {
//         $(element).closest('.fcontrol-group').addClass('has-error');
//     },
//     unhighlight: function(element) {
//         $(element).closest('.control-group').removeClass('has-error');
//     },
//     errorElement: 'span',
//     errorClass: 'help-block',
//     errorPlacement: function(error, element) {
//         if(element.parent('.input-group').length) {
//             error.insertAfter(element.parent());
//         } else {
//             error.insertAfter(element);
//         }
//     }
// });
//console.log("dd");
//$(document).ready(function() {
$("#login").click(function() {
    var email = document.getElementById('inputEmail').value;
    var pwd = document.getElementById('inputPassword').value;    
console.log(email,pwd);
var url = "http://localhost:3000/customers?";
$.get(url, function(data) {
    console.log(data);          
    var all =data.length;
            if(email == "admin@nw.com" && pwd== "12345**"){
            // $("#suc").show();
            console.log("SuccessAdmin");
           window.location.href = "products.html" ;
            }
            else if (data.customerEmail===email && data.customerPWSl === pwd ){
            // $("#suc").show();
            console.log("SuccessUser");
           window.location.href = "products.html" ;
            }
         else {
            alert("Error Password or Email")
            $("#err").show();
        
         }
        });
});
//});