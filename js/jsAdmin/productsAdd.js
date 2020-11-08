// function toUniqueArray(a){
//     var newArr = [];
//     for (var i = 0; i < a.length; i++) {
//         if (newArr.indexOf(a[i]) === -1) {
//             newArr.push(a[i]);
//         }
//     }
//   return newArr;
// }


// $(document).ready(function () {
//     var url = "http://localhost:3000/product?";
//     $.get(url, function (data) {

//         var all = data.length;
//         var r = "";
//         for (var i = 1; i <= all; i++) {
           
//             r+='"'+data[i].proGroupN+'",';
        
//             return r;
//         }
//         console.log(r);
        
//         var unique='' ;
//         console.log(unique);
//         console.log("==========");
//         unique=r.filter((v, i, a) => a.indexOf(v) === i);
//         console.log(unique);    

//     });

// });


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

$("#Add").click(function () {
    console.log('ADD');
    let newProducts = {};
    // newProducts.id = pid;
    newProducts.proGroupN = $("#Groups").val();
    newProducts.proName = $("#ProName").val();
    newProducts.number = $("#total").val();
    newProducts.priceUnit = $("#price").val();
    newProducts.proType = $("#type").val(); 
    newProducts.proImage = document.getElementById('image').src;

    console.log(newProducts);
    
    $.ajax({
        url: "http://localhost:3000/product/",
        type: 'POST',
        // data: newProducts,
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(newProducts),
        success: function (result) {
            // window.location.href = "/pages/admin/productsEdit.html";
            console.log('Updated!');
        }
    });
    $("#err").show();
    window.open('/pages/admin/products.html');
    // window.location.href = "/pages/admin/products.html";
    // setTimeout(location.reload.bind(window.location.href = "/pages/admin/products.html"), 900);
});


