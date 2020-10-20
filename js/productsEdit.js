var urlSearchParams = URL.searchParams;
let params = (new URL(document.location)).searchParams;
let tid = params.get("id");
let options = {};
var show = '';
console.log(tid);

$(document).ready(function () {
    var url = "http://localhost:3000/customers?";
    $.get(url, function (data) {

        var all = data.length;
        var r = "";
        for (var i = 0; i < all; i++) {
            if (data[i].customerID === tid) {
                r += '<tr><td>' + data[i].customerID + '</td><td>' +
                    data[i].companyName + '</td><td>' + data[i].contactName + '</td><td>' + data[i].contactTitle + '</td><td>' +
                    "street :" + data[i].address.street + "<br>" +
                    "city :" + data[i].address.city + "<br>" +
                    "region :" + data[i].address.region + "<br>" +
                    "postalCode :" + data[i].address.postalCode + "<br>" +
                    "country :" + data[i].address.country + "<br>" +
                    "phone :" + data[i].address.phone +
                    '</td></tr>';
                console.log(data[i].customerID);

                $("#customerID").val(data[i].customerID);
                $("#companyName").val(data[i].companyName);
                $("#contactName").val(data[i].contactName);
                $("#contactTitle").val(data[i].contactTitle);
                $("#street").val(data[i].address.street);
                $("#city").val(data[i].address.city);
                $("#region").val(data[i].address.region);
                $("#postalCode").val(data[i].address.postalCode);
                $("#country").val(data[i].address.country);
                $("#phone").val(data[i].address.phone);

                $("#save").click(function () {
                    var newuser = {};
                   // newuser.id = data.id;
                    newuser[i].customerID = $("#customerID").val();
                    newuser[i].contactName = $("#contactName").val();
                    newuser[i].contactTitle = $("#contactTitle").val();
                    newuser[i].address.street = $("#street").val();
                    newuser[i].address.city = $("#city").val();
                    newuser[i].address.region = $("#region").val();
                    newuser[i].address.postalCode = $("#postalCode").val();
                    newuser[i].address.country = $("#country").val();
                    newuser[i].address.phone = $("#phone").val();
                    console.log(JSON.stringify(newuser));
                    var updateUrl = "http://localhost:3000/customers/" + data[i].customerID ;
                    $.ajax({
                        url: updateUrl,
                        type: 'PUT',
                        data: newuser,
                        success: function (result) {
                            console.log('Updated!');
                        }
                    });
                    $("#err").show();
                    setTimeout(location.reload.bind(location), 900);
                });
            }

        }


    });

});



