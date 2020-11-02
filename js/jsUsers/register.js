$("#register").click(function () {
    console.log('Register');
    let newUser = {};
    // newUser.id = pid;
    newUser.customerPrefix = $("#prefix").val();
    newUser.customerName = $("#userFName").val();
    newUser.customerSurName = $("#userLName").val();
    newUser.customerEmail = $("#userEmail").val();
    newUser.customerPW = $("#userPassword").val();
    newUser.customerHBD = $("#bDay").val();
    newUser.addressInfo = $("#address").val();
    newUser.addressPostalCode = $("#postalCode").val();
    newUser.phone = $("#mobilePhone").val();
    console.log(newUser);
    // $.ajax({
    //     url: "http://localhost:3000/customers/",
    //     type: 'POST',
    //     // data: newUser,
    //     dataType: 'json',
    //     contentType: 'application/json',
    //     data: JSON.stringify(newUser),
    //     success: function (result) {
    //         console.log('Success new user!');
    //     }
    // });
    // $("#err").show();
    // window.open('index.html');
});

// $("#Add").click(function () {
//     console.log('Register');
    
//     let newUser = {};
//     // newUser.id = pid;
//     newUser.customerPrefix = $("#prefix").val();
//     newUser.customerName = $("#userFName").val();
//     newUser.customerSurName = $("#userLName").val();
//     newUser.customerEmail = $("#userEmail").val();
//     newUser.customerPW = $("#userPassword").val();
//     newUser.customerHBD = $("#bDay").val();
//     newUser.addressInfo = $("#address").val();
//     newUser.addressPostalCode = $("#postalCode").val();
//     newUser.phone = $("#mobilePhone").val();

//     console.log(newUser);

//     $.ajax({
//         url: "http://localhost:3000/customers/",
//         type: 'POST',
//         // data: newUser,
//         dataType: 'json',
//         contentType: 'application/json',
//         data: JSON.stringify(newUser),
//         success: function (result) {
//             // window.location.href = "productsEdit.html";
//             console.log('Updated!');
//         }
//     });
//     $("#err").show();
//     // window.open('index.html');
//     // window.location.href = "products.html";
//     // setTimeout(location.reload.bind(window.location.href = "products.html"), 900);
// });