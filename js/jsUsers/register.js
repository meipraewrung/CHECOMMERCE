$("#register").click(function () {
    console.log('Register');
    let newuser = {};
    // newuser.id = pid;
    newuser.Title = $("#Title").val();
    newuser.FristName = $("#inputFname1").val();
    newuser.LastName = $("#inputLname").val();
    newuser.Email = $("#input_email").val();
    newuser.Password = $("#inputPassword1").val();
    newuser.DateofBirth = $("#bday").val();
    newuser.Address = $("#address").val();
    newuser.PostalCode = $("#postcode").val();
    newuser.MobilePhone = $("#mobilephone").val();
    console.log(newuser);
    $.ajax({
        url: "http://localhost:3000/users/",
        type: 'POST',
        // data: newuser,
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(newuser),
        success: function (result) {
            console.log('Success new user!');
        }
    });
    $("#err").show();
    //window.open('register.html');
});