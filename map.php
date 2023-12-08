<!DOCTYPE html>
<html>
<body>

<h1>My First Google Map</h1>
<h1>Tìm kiếm vị trí bằng Google Maps</h1>
  <form action="" method="post">
    <input type="text" name="address" placeholder="Nhập địa chỉ">
    <input type="submit" value="Tìm kiếm">
  </form>
<div id="googleMap" style="width:100%;height:600px;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(10.8230989,106.6296638),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $address = $_POST["address"];

      // Tạo kết nối với API Google Maps
      $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=AIzaSyBIRk2HTJTp1lDvo_G7JxnCVAM3aCULia0";
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      curl_close($curl);

      // Trả về kết quả
      $data = json_decode($response, true);
      if ($data["status"] == "OK") {
        $lat = $data["results"][0]["geometry"]["location"]["lat"];
        $lng = $data["results"][0]["geometry"]["location"]["lng"];
        echo "<h3>Vị trí được tìm thấy:</h3>";
        echo "<p>Vĩ độ: $lat</p>";
        echo "<p>Kinh độ: $lng</p><script>
        function myMap() {
        var mapProp= {
          center:new google.maps.LatLng($lat,$lng),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById(\"googleMap\"),mapProp);
        }
        </script>";
      } else {
        echo "<h3>Không tìm thấy vị trí</h3>";
      }
    }
  ?>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIRk2HTJTp1lDvo_G7JxnCVAM3aCULia0&callback=myMap"></script>
</body>
</html>