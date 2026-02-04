/* MULTI LOCATION */

function initialize() {
	var latlng  = new google.maps.LatLng();
	var latlng2 = new google.maps.LatLng();
	var latlng3 = new google.maps.LatLng();
	var imageCustom = "https://s3.amazonaws.com/static.organiclead.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/InnerContactAssets/style2_icon.png";
	var stylesArray = "[ { &quot;featureType&quot;: &quot;administrative&quot;, &quot;elementType&quot;: &quot;labels.text.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#6195a0&quot; } ] }, { &quot;featureType&quot;: &quot;landscape&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f2f2f2&quot; } ] }, { &quot;featureType&quot;: &quot;landscape&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#ffffff&quot; } ] }, { &quot;featureType&quot;: &quot;poi&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;poi.park&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#e6f3d6&quot; }, { &quot;visibility&quot;: &quot;on&quot; } ] }, { &quot;featureType&quot;: &quot;road&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;saturation&quot;: -100 }, { &quot;lightness&quot;: 45 }, { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f4d2c5&quot; }, { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;labels.text&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#4e4e4e&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f4f4f4&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;labels.text.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#787878&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;labels.icon&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;transit&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;water&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#eaf6f8&quot; }, { &quot;visibility&quot;: &quot;on&quot; } ] }, { &quot;featureType&quot;: &quot;water&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#eaf6f8&quot; } ] } ]";
	/* MAP 1 SETTINGS */ 
	if(!$('#mapCustom1').length == 0){
		var map =  new google.maps.Map(document.getElementById("mapCustom1"), {
			zoom: 15,
			center: latlng,
			disableDefaultUI: true,
			styles: stylesArray
		});
		var myMarker = new google.maps.Marker({
			position: latlng,
			map: map,
			icon: imageCustom,
			title: 'Location 1'
		});
	}
	/* MAP 2 SETTINGS */ 
	if(!$('#mapCustom2').length == 0){
		var map2 = new google.maps.Map(document.getElementById("mapCustom2"),{
			zoom: 15,
			center: latlng2,
			disableDefaultUI: true,
			styles: stylesArray

		});
		var myMarker2 = new google.maps.Marker({
			position: latlng2,
			map: map2,
			icon: imageCustom,
			title: 'Location 3'
		});
	}
	/* MAP 3 SETTINGS */ 
	if(!$('#mapCustom3').length == 0){
		var map3 = new google.maps.Map(document.getElementById("mapCustom3"), {
			zoom: 15,
			center: latlng3,
			disableDefaultUI: true,
			styles: stylesArray

		});
		var myMarker3 = new google.maps.Marker({
			position: latlng3,
			map: map3,
			icon: imageCustom,
			title: 'Location 3'
		});
	}
}
google.maps.event.addDomListener(window, 'load', initialize);
/* END MULTI LOCATION */

if(!$('#mapCustomstyle1').length == 0){
	console.log('xx');
	function initMap() {
		var latlng = new google.maps.LatLng();
		var imageCustom = "https://s3.amazonaws.com/static.organiclead.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/InnerContactAssets/style2_icon.png";
		var stylesArray = "[ { &quot;featureType&quot;: &quot;administrative&quot;, &quot;elementType&quot;: &quot;labels.text.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#6195a0&quot; } ] }, { &quot;featureType&quot;: &quot;landscape&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f2f2f2&quot; } ] }, { &quot;featureType&quot;: &quot;landscape&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#ffffff&quot; } ] }, { &quot;featureType&quot;: &quot;poi&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;poi.park&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#e6f3d6&quot; }, { &quot;visibility&quot;: &quot;on&quot; } ] }, { &quot;featureType&quot;: &quot;road&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;saturation&quot;: -100 }, { &quot;lightness&quot;: 45 }, { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f4d2c5&quot; }, { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;labels.text&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#4e4e4e&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f4f4f4&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;labels.text.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#787878&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;labels.icon&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;transit&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;water&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#eaf6f8&quot; }, { &quot;visibility&quot;: &quot;on&quot; } ] }, { &quot;featureType&quot;: &quot;water&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#eaf6f8&quot; } ] } ]";
		var mapCustom = new google.maps.Map(document.getElementById('mapCustomstyle1'), {
			zoom: 14,
			disableDefaultUI: true,
			center: latlng,
			styles: stylesArray
		});

		var Location_1 = new google.maps.Marker({
			position: latlng,
			map: mapCustom,
			icon: imageCustom,
			title: 'Location Name'
		});

	}

	google.maps.event.addDomListener(window, 'load', initMap);
}

if(!$('#mapCustomstyle2').length == 0){
	function initMap2() {
		var latlng = new google.maps.LatLng();
		var imageCustom = "https://s3.amazonaws.com/static.organiclead.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/InnerContactAssets/style2_icon.png";
		var stylesArray = "[ { &quot;featureType&quot;: &quot;administrative&quot;, &quot;elementType&quot;: &quot;labels.text.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#6195a0&quot; } ] }, { &quot;featureType&quot;: &quot;landscape&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f2f2f2&quot; } ] }, { &quot;featureType&quot;: &quot;landscape&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#ffffff&quot; } ] }, { &quot;featureType&quot;: &quot;poi&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;poi.park&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#e6f3d6&quot; }, { &quot;visibility&quot;: &quot;on&quot; } ] }, { &quot;featureType&quot;: &quot;road&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;saturation&quot;: -100 }, { &quot;lightness&quot;: 45 }, { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f4d2c5&quot; }, { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;labels.text&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#4e4e4e&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f4f4f4&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;labels.text.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#787878&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;labels.icon&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;transit&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;water&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#eaf6f8&quot; }, { &quot;visibility&quot;: &quot;on&quot; } ] }, { &quot;featureType&quot;: &quot;water&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#eaf6f8&quot; } ] } ]";
		var mapCustom = new google.maps.Map(document.getElementById('mapCustomstyle2'), {
			zoom: 14,
			disableDefaultUI: true,
			center: latlng,
		});

		var Location_1 = new google.maps.Marker({
			position: latlng,
			map: mapCustom,
			icon: imageCustom,
			title: 'Location Name'
		});

	}
	google.maps.event.addDomListener(window, 'load', initMap2);
}

if(!$('#mapCustomstyle3').length == 0){
	function initMap3() {
		var latlng = new google.maps.LatLng();
		var imageCustom = "https://s3.amazonaws.com/static.organiclead.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/InnerContactAssets/style2_icon.png";
		var stylesArray = "[ { &quot;featureType&quot;: &quot;administrative&quot;, &quot;elementType&quot;: &quot;labels.text.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#6195a0&quot; } ] }, { &quot;featureType&quot;: &quot;landscape&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f2f2f2&quot; } ] }, { &quot;featureType&quot;: &quot;landscape&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#ffffff&quot; } ] }, { &quot;featureType&quot;: &quot;poi&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;poi.park&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#e6f3d6&quot; }, { &quot;visibility&quot;: &quot;on&quot; } ] }, { &quot;featureType&quot;: &quot;road&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;saturation&quot;: -100 }, { &quot;lightness&quot;: 45 }, { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f4d2c5&quot; }, { &quot;visibility&quot;: &quot;simplified&quot; } ] }, { &quot;featureType&quot;: &quot;road.highway&quot;, &quot;elementType&quot;: &quot;labels.text&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#4e4e4e&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#f4f4f4&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;labels.text.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#787878&quot; } ] }, { &quot;featureType&quot;: &quot;road.arterial&quot;, &quot;elementType&quot;: &quot;labels.icon&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;transit&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;visibility&quot;: &quot;off&quot; } ] }, { &quot;featureType&quot;: &quot;water&quot;, &quot;elementType&quot;: &quot;all&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#eaf6f8&quot; }, { &quot;visibility&quot;: &quot;on&quot; } ] }, { &quot;featureType&quot;: &quot;water&quot;, &quot;elementType&quot;: &quot;geometry.fill&quot;, &quot;stylers&quot;: [ { &quot;color&quot;: &quot;#eaf6f8&quot; } ] } ]";
		var mapCustom = new google.maps.Map(document.getElementById('mapCustomstyle3'), {
			zoom: 14,
			disableDefaultUI: true,
			center: latlng,
			styles: stylesArray
		});

		var Location_1 = new google.maps.Marker({
			position: latlng,
			map: mapCustom,
			icon: imageCustom,
			title: 'Location Name'
		});

	}
	google.maps.event.addDomListener(window, 'load', initMap3);
}


$(function($) {
	var templateBackground = $('.contact-template.style-1').attr('data-background-header-display');

	if (templateBackground == 'No' || templateBackground == 'no' ) {
		$('#ry-pg-banner').hide();
	}


});


$(window).resize(function () {
	var div = $('.style-2 .custom-social-wrapper .social-inner-wrap li');
	var width = div.width();
	setTimeout(function() {
		div.css('height', width);
	}, 100);
	

	var div2 = $('.style-3 .custom-social-wrapper .social-inner-wrap li');
	var width = div.width();
	setTimeout(function() {
		div2.css('height', width);
	}, 100);

});