document.addEventListener("DOMContentLoaded", function() {
    var eleProductImage = document.getElementById("productImage");
    var eleProductName = document.getElementById("productName");
    var eleProductId = document.getElementById("productId");
  
    function getProductDetails() {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "https://fakestoreapi.com/products/1", true);
      xhr.onload = function() {
        var res = JSON.parse(xhr.responseText);
        eleProductImage.src = res.image;
        eleProductName.innerHTML = res.title;
        eleProductId.innerHTML = res.description;
      };
      xhr.send();
    }
  
    getProductDetails();
  });