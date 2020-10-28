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

// $("#login").click(function() {
//     var email = document.getElementById('inputEmail').value;
//     var pwd = document.getElementById('inputPassword').value;    
// console.log(email,pwd);
// var url = "http://localhost:3000/customers?";
// $.get(url, function(data) {
//     console.log(data);          
//     var all =data.length;
//             if(email == "admin@nw.com" && pwd== "12345**"){
//             // $("#suc").show();
//             console.log("SuccessAdmin");
//            window.location.href = "products.html" ;
//             }  
//             else if (data.customerEmail===email && data.customerPWSl === pwd ){
//             // $("#suc").show();
//             console.log("SuccessUser");
//            window.location.href = "products.html" ;
//             }
//          else {
//             alert("Error Password or Email")
//             $("#err").show();
        
//          }
//         });
// });

//});


$("#login").click(function() {
    var email = document.getElementById('inputEmail').value;
    var pwd = document.getElementById('inputPassword').value;    
    // var url1 = "http://localhost:3000/admin?";
    // var url2 = "http://localhost:3000/customers?";
    // $.get((url1 || url2), function(data) {
    //     console.log(data);
    //     if( data.adminEmail == email && data.adminPW == pwd ){
    //         $("#suc").show();
    //         console.log("SuccessAdmin");
    //         window.location.href = "products.html" ;
    //     } else if ( data.customerEmail == email && data.customerPW == pwd ){
    //         $("#suc").show();
    //         console.log("SuccessUser");
    //         window.location.href = "index.html" ;
    //     } else {
    //         console.log("Error Password or Email");
    //         alert("Error Password or Email")
    //         $("#err").show();
    //     }
    // });

    var url1 = "http://localhost:3000/admin?";
    var url2 = "http://localhost:3000/customers?";
    $.get(url1, function(data1) {
        console.log("admin", data1);
        $.get(url2, function(data2) {
            console.log("customers", data2);
            console.log("email&pw", email, pwd);
            /////////////////////////////ยังไม่เข้า if/////////////////////////////
            if(email == "admin@nw.com" && pwd== "12345**"){
                console.log("email&pw", email, pwd);
                $("#suc").show();
                console.log("SuccessAdmin");
                window.location.href = "products.html" ;
            } else if (email == "customers@nw.com" && pwd== "12345**"){
                console.log(email, pwd);
                $("#suc").show();
                console.log("SuccessUser");
                window.location.href = "index.html" ;
            } else {
                console.log("Error Password or Email");
                alert("Error Password or Email")
                $("#err").show();
            }   
        });
    });

    // var url1 = "http://localhost:3000/admin?";
    // var url2 = "http://localhost:3000/customers?";
    // $.get(url1, function(data1) {
    //     console.log("admin", data1);
    //     $.get(url2, function(data2) {
    //         console.log("customers", data2);
    //         console.log("email&pw", email, pwd);
    //         /////////////////////////////ยังไม่เข้า if/////////////////////////////
    //         if(email == data1.adminEmail && pwd == data1.adminPW){
    //             console.log("email&pw", email, pwd);
    //             $("#suc").show();
    //             console.log("SuccessAdmin");
    //             window.location.href = "products.html" ;
    //         } else if (email === data2.customerEmail && pwd === data2.customerPW){
    //             console.log(email, pwd);
    //             $("#suc").show();
    //             console.log("SuccessUser");
    //             window.location.href = "index.html" ;
    //         } else {
    //             console.log("Error Password or Email");
    //             alert("Error Password or Email")
    //             $("#err").show();
    //         }   
    //     });
    // });
    
});
