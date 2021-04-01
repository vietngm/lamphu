<?php
function gMapContact(){
    global $lienhe;
    if (is_page('lien-he')) {
        ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBQoUYt-NTFM1JfDgB9TQhzKigHOym5EY" type="text/javascript"></script>
<script defer>
var pp_position = new google.maps.LatLng(<?php echo $lienhe['toado']; ?>);
var marker;
var map;
function initialize() {
  var mapOptions = {
    zoom: 13,
	scrollwheel:false,
    center: pp_position
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: pp_position
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() != null){marker.setAnimation(null);}
  else{marker.setAnimation(google.maps.Animation.BOUNCE);}
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php
}}
add_action('wp_head', 'gMapContact');
?>
