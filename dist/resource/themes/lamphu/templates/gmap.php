<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
<?php
$thongtin=get_thongtin();
$add=str_replace("\r\n","<br/>",$thongtin['diachigmap']);
?>
<script>
var myCenter=new google.maps.LatLng(<?php echo $thongtin['toadox']; ?>,<?php echo $thongtin['toadoy']; ?>);

function initialize(){
var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
});

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:'<?php echo $add; ?>'
});

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>