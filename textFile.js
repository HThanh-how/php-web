
var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {

  if (this.readyState == 4 && this.status == 200) {

    var xml = this.responseXML;

    var products = xml.getElementsByTagName("product");

    var html = "";
    // Duyệt qua từng phần tử <product>
    for (var i = 0; i < products.length; i++) {
      
      var id = products[i].getAttribute("id");
      var name = products[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
      var price = products[i].getElementsByTagName("price")[0].childNodes[0].nodeValue;
      var image = products[i].getElementsByTagName("image")[0].childNodes[0].nodeValue;

      html += "<div class='product'>";
      html += "<img src='" + image + "' alt='" + name + "'>";
      html += "<h3>" + name + "</h3>";
      html += "<p>" + price + "</p>";
      html += "<a href='product_details.php?id=" + id + "'>Xem chi tiết</a>";
      html += "</div>";
    }

    document.getElementById("demo").innerHTML = html;
  }
};


xhttp.open("GET", "product_listing.php", true);


xhttp.send();
