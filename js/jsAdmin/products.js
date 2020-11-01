// $(function () {
//   var url = "http://localhost:3000/product";
//   console.log(url);
//   console.log(html);
//   $.get(url, function (data) {
//     // console.log('data',data);          
//     let all = data.length;
//     $('#pagination-container').pagination({
//       dataSource: data,
//       pageSize: 20,
//       ajax: {
//           beforeSend: function() {
//               dataContainer.html('Loading data from flickr.com ...');
//           }
//       },
//       callback: function(data, pagination) {
//           // template method of yourself
//           var html = template(data);
//           $('#data-container').html(html);
//       }
//   })
//   });
// });


// //product blockView
// function simpleTemplating(data) {
//   var url = "http://localhost:3000/product";
//   console.log(url);
//   $.get(url, function (data) {
//     // console.log('data',data);          
//     let html = "";
//     let pid = ""

//     for (let index = 0; index < data.length; index++) {
//       pid = index + 1;
//       html +='<ul class="showProduct" id="showProduct">'+
//         '<li class="span3">' +
//         '<div class="thumbnail">' +
//         '<a href="productsDetails.html?productID=' + data[index].id + '">' +
//         '<img style="height: 150px; width: auto" src="' + data[index].proImage + '" alt="" />' +
//         '</a>' +
//         '<div class="caption">' +
//         '<h5>' + JSON.stringify(data[index].proName) + '</h5>' +
//         '<p>' + data[index].priceUnit + '</p>' +
//         '<h4 style="text-align:center">' +
//         '<a class="btn" href="productsDetails.html?productID=' + (index + 1) + '">' +
//         '<i class="icon-zoom-in"></i></a> ' +
//         '<a class="btn btn-primary" href="productsEdit.html?productID=' + (index + 1) + '">แก้ไข' +
//         '<i class=""></i></a> ' +
//         '<button type="button" class="btn btn-danger" id="Delete" onClick="handleDelete(' + pid + ')" name="Delete">ลบ' +
//         '<i class=""></i></button>' +
//         '</h4>' +
//         '</div>' + '</div>' + '</li>'+'</div>';
//       // console.log('show',show);

//     }
//     // console.log('show',show);
//     // document.getElementById('showProduct').innerHTML = show;
    
//   });
//   return html;
// };


// //product delecte
// function handleDelete(id) {
//   console.log('D', id);

//   $.ajax({
//     url: "http://localhost:3000/product/" + id,
//     type: 'DELETE',
//     dataType: 'json',
//     contentType: 'application/json',
//     success: function (result) {
//       console.log('Updated!');
//     }
//   });
//   $("#err").show();
//   setTimeout(location.reload.bind(location), 900);

// }

//product blockView
$(document).ready(function() {
  var url = "http://localhost:3000/product?";
  console.log(url);
  $.get(url, function(data) {
    console.log('data',data);          
      var all =data.length;
      let show = "";
      console.log(data.length);
      for (let index = 0; index < 6; index++) {
        show+= 
        '<li class="span3">'+
          '<div class="thumbnail" style="height: 350px;>'+
              '<a href="productsDetails.html?productID='+data[index].id+'">'+
                  '<img style="height: 150px; width: auto" src="'+data[index].proImage+'" alt="" />'+
              '</a>'+
              '<div class="caption">'+
                '<h5>'+JSON.stringify(data[index].proName)+'</h5>'+
                '<p>'+data[index].priceUnit+'</p>'+
                '<h4 style="text-align:center">'+
                '<a class="btn" href="productsDetails.html?productID='+(index+1)+'">'+
                  '<i class="icon-zoom-in"></i></a> '+
                '<a class="btn btn-primary" href="productsEdit.html?productID='+(index+1)+'">แก้ไข'+
                  '<i class=""></i></a> '+
                '<a class="btn btn-danger" href="products.html?productID='+(index+1)+'">ลบ'+
                  '<i class=""></i></a>'+
                '</h4>'+
              '</div>'+'</div>'+'</li>';
        // console.log('show',show);
      }
      // console.log('show',show);
      document.getElementById('showProduct').innerHTML = show;
  });
});

//product blockView
$(document).ready(function() {
  var url = "http://localhost:3000/product?";
  console.log(url);
  $.get(url, function(data) {
    console.log('data',data);          
      var all =data.length;
      let show = "";
      console.log(data.length);
      for (let index = 10; index < 19; index++) {
        show+= 
        '<li class="span3">'+
          '<div class="thumbnail" style="height: 350px;>'+
              '<a href="productsDetails.html?productID='+data[index].id+'">'+
                  '<img style="height: 150px; width: auto" src="'+data[index].proImage+'" alt="" />'+
              '</a>'+
              '<div class="caption">'+
                '<h5>'+JSON.stringify(data[index].proName)+'</h5>'+
                '<p>'+data[index].priceUnit+'</p>'+
                '<h4 style="text-align:center">'+
                '<a class="btn" href="productsDetails.html?productID='+(index+1)+'">'+
                  '<i class="icon-zoom-in"></i></a> '+
                '<a class="btn btn-primary" href="productsEdit.html?productID='+(index+1)+'">แก้ไข'+
                  '<i class=""></i></a> '+
                '<a class="btn btn-danger" href="products.html?productID='+(index+1)+'">ลบ'+
                  '<i class=""></i></a>'+
                '</h4>'+
              '</div>'+'</div>'+'</li>';
        // console.log('show',show);
      }
      // console.log('show',show);
      document.getElementById('showProduct2').innerHTML = show;
  });
});

//product blockView
$(document).ready(function() {
  var url = "http://localhost:3000/product?";
  console.log(url);
  $.get(url, function(data) {
    console.log('data',data);          
      var all =data.length;
      let show = "";
      console.log(data.length);
      for (let index = 19; index < 29; index++) {
        show+= 
        '<li class="span3">'+
          '<div class="thumbnail" style="height: 350px;>'+
              '<a href="productsDetails.html?productID='+data[index].id+'">'+
                  '<img style="height: 150px; width: auto" src="'+data[index].proImage+'" alt="" />'+
              '</a>'+
              '<div class="caption">'+
                '<h5>'+JSON.stringify(data[index].proName)+'</h5>'+
                '<p>'+data[index].priceUnit+'</p>'+
                '<h4 style="text-align:center">'+
                '<a class="btn" href="productsDetails.html?productID='+(index+1)+'">'+
                  '<i class="icon-zoom-in"></i></a> '+
                '<a class="btn btn-primary" href="productsEdit.html?productID='+(index+1)+'">แก้ไข'+
                  '<i class=""></i></a> '+
                '<a class="btn btn-danger" href="products.html?productID='+(index+1)+'">ลบ'+
                  '<i class=""></i></a>'+
                '</h4>'+
              '</div>'+'</div>'+'</li>';
        // console.log('show',show);
      }
      // console.log('show',show);
      document.getElementById('showProduct3').innerHTML = show;
  });
});

//product delete
function handleDelete (id){
  console.log('D',id);

    $.ajax({
        url: "http://localhost:3000/product/"+id,
        type: 'DELETE',  
        dataType: 'json',
        contentType: 'application/json',
        success: function (result) {
            console.log('Updated!');
        }
    });
    $("#err").show();
    setTimeout(location.reload.bind(location), 900);

}
<<<<<<< HEAD
=======


>>>>>>> parent of 6a9417e... Merge pull request #33 from meipraewrung/praewrung
