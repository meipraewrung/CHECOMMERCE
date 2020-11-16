//product listView
var urlSearchParams = URL.searchParams;
let params = (new URL(document.location)).searchParams;
let pid = params.get("productID");
let options = {};
var show='';
// console.log(pid);
$(document).ready(function() {
    var url = "http://localhost:3000/product?";
    $.get(url, function(data) {
    //   console.log(data);          
      var all = data.length;
      let show = "";
      for (let index = 0; index < data.length; index++) {
        // show += JSON.stringify(data[index]);
        if(data[index].id==pid){
            console.log(data[index]);
                $("#Groups").val(data[index].proType + " / " + data[index].proGroupN);
                $("#ProName").val(data[index].proName);
                $("#total").val(data[index].number);
                $("#price").val(data[index].priceUnit);
                $("#type").val(data[index].proType);
                $("#pdDetails").val(data[index].productDetail);
                document.getElementById('image').src=data[index].proImage;
                $("#fileInput").val(JSON.stringify(data[index].proImage));
            }
        }
    });
});


function myFunction(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result);
                // .width(150)
                // .height(200);
        };

        reader.readAsDataURL(input.files[0]);
        // console.log(themes/images/products.files[0]);

    }
  }

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
    $('#yourImage').attr('src', e.target.result);
};

$("#save").click(function () {
    console.log(pid);
    console.log('SAVE');
    let newuser = {};
    
    // newuser.id = pid;
    newuser.proGroupN = $("#Groups").val();
    newuser.proName = $("#ProName").val();
    newuser.number = $("#total").val();
    newuser.priceUnit = $("#price").val();
    newuser.proType = $("#type").val(); 
    newuser.proImage = document.getElementById('image').src;

    console.log(newuser);
    // var updateUrl = "http://localhost:3000/product?"+pid ;
    // console.log(updateUrl);
    $.ajax({
        url: "http://localhost:3000/product/"+pid,
        type: 'PUT',
        // data: newuser,
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(newuser),
        success: function (result) {
            // window.location.href = "/pages/admin/productsEdit.htmlproductID= "+ data[index].productID;
            console.log('Updated!');
        }
    });
    $("#err").show();
    setTimeout(location.reload.bind(location), 900);
});



