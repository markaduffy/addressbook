<div class="row top-nav">
	<div class="col-md-12">
		<ul class="nav nav-tabs" role="tablist">
		  <li><a href="/contacts/">Contacts</a></li>
		  <li class="active"><a href="/contacts/map">Map</a></li>
		</ul>
	</div>
</div>

<?php  

if (!empty($contacts)){

?>

<div class="row">
	<div class="col-md-6">

		<table id="address-table" class="table table-condensed">
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Lat/Lon</th>
			</tr>

			<?php foreach($contacts as $key => $value){ ?>

			<tr>
				<td><a href="" data-toggle="modal" data-target="#myModal"><?php echo $value['Contact']['full_name'] ?></a></td>
				<td>
					<?php echo $value['Contact']['address1'] ?><br />
					<?php echo $value['Contact']['address2'] ?><br />
					<?php echo $value['Contact']['city'] ?><br />
					<?php echo $value['Contact']['state'] ?><br />
					<?php echo $value['Contact']['zip'] ?><br />
				</td>
				<td>
					<?php echo $value['Contact']['lat'] ?> <?php echo $value['Contact']['lng'] ?>
				</td>
			</tr>

			<?php } ?>

		</table>

	</div>
	<div class="col-md-6">
		<div id="map_canvas" style="width: 100%; height: 300px;"></div>
	</div>
</div>


<?php  

echo $this->Html->scriptBlock(
    '',
    array('inline' => false)
);


?>

<script type="text/javascript">

    var geocoder;
    var map;
    var markersArray = [];
    var bounds;
    var infowindow =  new google.maps.InfoWindow({
        content: ''
    });

	//plot initial point using geocode instead of coordinates (works just fine)
	function initialize(){

	    geocoder = new google.maps.Geocoder();
	    bounds = new google.maps.LatLngBounds();

	    var myOptions = {
	        zoom: 2, 
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
	        navigationControlOptions: {
	            style: google.maps.NavigationControlStyle.SMALL
	        }
	    };
	    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	        geocoder.geocode({'address': '2740 Smallman Street, Suite 100, Pittsburgh, PA 15222'}, function(results, status){ 
	        if (status == google.maps.GeocoderStatus.OK){
	            map.setCenter(results[0].geometry.location);

	            marker = new google.maps.Marker({
	                map: map,
	                position: results[0].geometry.location
	            });

	            bounds.extend(results[0].geometry.location);

	            markersArray.push(marker);
	        }
	        else{
	            alert("Geocode was not successful for the following eason: " + status);
	        }
	    });

	    plotMarkers();
	}

	var locationsArray = [
	    <?php 
			foreach($contacts as $key => $value){ 
				echo "['" . $value['Contact']['full_name'] . "','" . $value['Contact']['lat'] . " " . $value['Contact']['lng'] . "'],";
			}
		?>
	];

	function plotMarkers(){
	    var i;
	    for(i = 0; i < locationsArray.length; i++){
	        codeAddresses(locationsArray[i]);
	    }
	}

	function codeAddresses(address){
	    geocoder.geocode( { 'address': address[1]}, function(results, status) { 
	        if (status == google.maps.GeocoderStatus.OK) {
	            marker = new google.maps.Marker({
	                map: map,
	                position: results[0].geometry.location
	            });

	            google.maps.event.addListener(marker, 'click', function() {
	                infowindow.setContent(address[0]);
	                infowindow.open(map, this);
	            });

	            bounds.extend(results[0].geometry.location);

	            markersArray.push(marker); 
	        }
	        else{
	            alert("Geocode was not successful for the following reason: " + status);
	        }

	        map.fitBounds(bounds);
	    });
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php } else { ?>

<p>You have no contacts saved. Please enter them using this <a href="/contacts">form</a>.</p>

<?php } ?>