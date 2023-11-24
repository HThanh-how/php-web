var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    var xml = this.responseXML;

    var products = xml.getElementsByTagName("product");

    var html = "";

    for (var i = 0; i < products.length; i++) {
      var id = products[i].getAttribute("id");
      var name =
        products[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;

      html +=
        "<li><a href='product_details.php?id=" + id + "'>" + name + "</a></li>";
    }

    document.getElementById("tag").innerHTML = "<ul>" + html + "</ul>";
  }
};

var keyword = document.getElementById("search").value;

xhttp.open("GET", "search_products.php?keyword=" + keyword, true);

xhttp.send();
