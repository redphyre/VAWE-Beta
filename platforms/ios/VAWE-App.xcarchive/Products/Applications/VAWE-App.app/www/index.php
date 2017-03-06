<?php
header("Content-Type: text/html; charset=ISO-8859-1");
header('Access-Control-Allow-Origin: *'); 

$user = $_GET['user'];
$vendor = $_GET['vendor'];
$con=mysqli_connect("localhost","hmhpenfwaa","wuJJFZs7a7","hmhpenfwaa");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<!DOCTYPE html>
<html>
<style type="text/css">
	body {
		margin: 0;
		padding: 0;
	}
	.ui-icon-csm-home:after {
		background-image: url(img/Home%20Green.png);
	}
	.ui-btn-active {
		background-color: #6EB02D!important;
	}
	.ui-nodisc-icon.ui-btn:after, .ui-nodisc-icon .ui-btn:after {
		background-color: #ED248F!important;
	}
	.ui-input-search {
		margin-left:10px!important;
		margin-right:10px!important;
	}
	.facebook {
		background-image:url(img/facebook-login-blue.png);
	}
	.google {
		background-image:url(img/google-sign-in.png);
	}
	.ui-icon-myapp-settings {
		background: url("img/apple-icon.png") 18px 18px no-repeat !important;
	}
	@media only screen and (-webkit-min-device-pixel-ratio: 2) {
		.ui-icon-myapp-settings {
			background: url("img/apple-icon@2x.png") no-repeat rgba(0, 0, 0, 0.8) !important;
			background-size: 18px 18px;
		}
		// more declarations here
	}
	.messageInputContainer {
		width:75%!important;
		
	}
	.clientMessage {
		float:left;
		background-color:#177AD0;
		color:white;
		width:200px!important;
		height:inherit;
		padding:15px;
		left:10px;
		margin-bottom:15px;
		border-bottom-right-radius: 25px;
		border-top-left-radius: 25px;
		border-top-right-radius: 25px;
	}
	.vendorMessage {
		float:right;
		background-color:#9F9F9F;
		color:white;
		width:200px!important;
		height:inherit;
		padding:15px;
		right:10px;
		margin-bottom:15px;
		border-bottom-left-radius: 25px;
		border-top-left-radius: 25px;
		border-top-right-radius: 25px;
	}
	.messageBox {
		height:100%;
		position:absolute;
		top:100%!important;
	}
	.messageBody {
		display:flex;
		flex-direction: column-reverse;
		min-height:100%;
		overflow-y: auto!important;
	}
</style>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/jquery.mobile-1.4.5.css" />
<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script>
<script type="text/javascript" src="cordova.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDfYHAzjn7XKBSpMVTfhWW-piZT2ZkJAac"></script>
    
</head>
<body>
<div id="page1" data-role="page">
	<div data-role="header" data-position="fixed" align="center"><img src="img/VAWE-long-300x30-transparent.png" width="300" height="30" alt=""/></div>
	<div data-role="content" style="margin:0; padding:0;">
		<div style="padding-bottom:5px;">
			<img src="img/CATERING (1).png" style="width:100%!important;">
		</div>
		<div style="padding-bottom:5px;">
			<img src="img/Rev. Pamela A. Mann.png" style="width:100%!important;">
		</div>
		<div style="padding-bottom:5px;">
			<img src="img/CATERING.png" style="width:100%!important;">
		</div>
		<div style="padding-bottom:5px;">
			<img src="img/Wedding in a Box.png" style="width:100%!important;">
		</div>
		<div style="padding-bottom:5px;">
			<img src="img/Flutter My Shutter.png" style="width:100%!important;">
		</div>
		<div style="padding-bottom:5px;">
			<img src="img/Brock's riverside.png" style="width:100%!important;">
		</div>
	</div>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" class="ui-nodisc-icon">
			<ul>
				<li><a href="#" class="ui-icon-home ui-btn-icon-top ui-btn-active">Home</a></li>
				<li><a href="#" class="ui-icon-calendar ui-btn-icon-top">Events</a></li>
				<li><a href="#vendors" class="ui-icon-search ui-btn-icon-top">Vendors</a></li>
				<li><a href="#map" class="ui-icon-location ui-btn-icon-top">Map</a></li>
				<li><a href="#" onClick="loginCheck()" class="ui-icon-user ui-btn-icon-top">Profile</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="vendorMessages" data-role="page" data-transition="pop">
	<div data-role="header" data-position="fixed" align="center"><img src="img/VAWE-long-300x30-transparent.png" width="300" height="30" alt=""/></div>
	<div data-role="content" style="margin:0px; padding:0px;">
		<ul id="messageResults" class="ui-btn" data-filter="true" data-filter-placeholder="Search user..." data-role="listview" style="padding-left:10px; padding-right:10px;">
		</ul>
	</div>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" class="ui-nodisc-icon">
			<ul>
				<li><a href="#page1" class="ui-icon-home ui-btn-icon-top">Home</a></li>
				<li><a href="#" class="ui-icon-calendar ui-btn-icon-top">Events</a></li>
				<li><a href="#" class="ui-icon-mail ui-btn-icon-top">Messages</a></li>
				<li><a href="#map" class="ui-icon-location ui-btn-icon-top">Map</a></li>
				<li><a href="#" onClick="loginCheck()" class="ui-icon-user ui-btn-icon-top">Profile</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="vendors" data-role="page" data-transition="slideup">
	<div data-role="header" data-position="fixed" align="center"><img src="img/VAWE-long-300x30-transparent.png" width="300" height="30" alt=""/></div>
	<div data-role="content" style="margin:0px; padding:0px;">
		<ul id="results" class="ui-btn" data-filter="true" data-filter-placeholder="Search vendors..." data-role="listview" style="padding-left:10px; padding-right:10px;">
		</ul>
	</div>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" class="ui-nodisc-icon">
			<ul>
				<li><a href="#page1" class="ui-icon-home ui-btn-icon-top">Home</a></li>
				<li><a href="#" class="ui-icon-calendar ui-btn-icon-top">Events</a></li>
				<li><a href="#vendors" class="ui-icon-search ui-btn-icon-top">Vendors</a></li>
				<li><a href="#map" class="ui-icon-location ui-btn-icon-top">Map</a></li>
				<li><a href="#" onClick="loginCheck()" class="ui-icon-user ui-btn-icon-top">Profile</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="map" data-role="page" data-transition="slideup">
	<div data-role="header" data-position="fixed" align="center"><img src="img/VAWE-long-300x30-transparent.png" width="300" height="30" alt=""/></div>
	<div data-role="content" style="margin:0px; padding:0px;">
		<div style="width:100%;height:716px; min-height:90%;" id="map-canvas"></div>
	</div>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" class="ui-nodisc-icon">
			<ul>
				<li><a href="#page1" class="ui-icon-home ui-btn-icon-top">Home</a></li>
				<li><a href="#" class="ui-icon-calendar ui-btn-icon-top">Events</a></li>
				<li ><a href="#vendors" class="ui-icon-search ui-btn-icon-top">Vendors</a></li>
				<li><a href="#" class="ui-icon-location ui-btn-icon-top">Map</a></li>
				<li><a href="#" onClick="loginCheck()" class="ui-icon-user ui-btn-icon-top">Profile</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="vendor-page" data-role="page" data-transition="flip">
	<div data-role="header" data-position="fixed" align="center"><img src="img/VAWE-long-300x30-transparent.png" width="300" height="30" alt=""/></div>
	<a href="#" data-rel="back" data-icon="back" data-iconpos="left" style="margin-left:10px; margin-right:10px;" class="ui-btn ui-btn-b ui-icon-back ui-btn-icon-left ui-shadow-icon ui-corner-all">Back</a>
	<div id="vendor-data" data-role="content">
	</div>
	<a href="#message-vendor" id="vendor-message" style="margin-left:10px; margin-right:10px;" class="ui-btn ui-btn-a ui-icon-mail ui-corner-all ui-btn-icon-left" data-transition="flip">Message Vendor</a>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" class="ui-nodisc-icon">
			<ul>
				<li><a href="#page1" class="ui-icon-home ui-btn-icon-top">Home</a></li>
				<li><a href="#" class="ui-icon-calendar ui-btn-icon-top">Events</a></li>
				<li ><a href="#vendors" class="ui-icon-search ui-btn-icon-top">Vendors</a></li>
				<li><a href="#map" class="ui-icon-location ui-btn-icon-top">Map</a></li>
				<li><a href="#" onClick="loginCheck()" class="ui-icon-user ui-btn-icon-top">Profile</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="message-vendor" data-role="page" data-transition="flip">
	<div data-role="header" class="ui-header ui-bar-b" data-position="fixed">
		<a href="#" data-rel="back" class="ui-btn ui-btn-b ui-icon-shadow ui-corner-all ui-btn-left ui-icon-left ui-btn-icon-notext ui-icon-back">Close</a>
		<h3>Send a Message</h3>
	</div>
	<div data-role="main" class="ui-content messageBody">
		<div id="messageBox"></div>
		<div id="mFooter"></div>
	</div>
	<div data-role="footer" class="ui-footer" data-position="fixed" style="z-index:0;"><div class="messageInputContainer"><form id="messageForm"><input class="messageInput" type="text" id="messageToSend" name="messageToSend" placeholder="Type your message..."></form></div><a href="#" style="position:absolute; right:10px; bottom:5px;" onClick="sendMessage()">Send</a></div>
</div>
<div id="login-page" data-role="dialog" class="ui-overlay-shadow" data-transition="flip">
	<div data-role="header" class="ui-header ui-bar-b">
		<h3>Login</h3>
	</div>
	<div data-role="main" class="ui-content">
		<form id="login-form">
			<input type="text" id="user" name="user" placeholder="Username"/>
			<input type="password" id="pass" name="pass" placeholder="Password"/>
			<input type="button" id="login-submit" value="Login"/>
			<h6><a href="reset.html">Forgot password? Click here to reset.</a></h6>
		</form>
		<button onClick="touchID()" style="background-image:url('img/touchid-100x100.png'); width:50px!important; background-size: 50px 50px; height:50px!important; padding:2px;"></button>
		<br/>
		<a href="#" class="ui-btn ui-btn-b">Join VAWE</a>
		<a href="#vendor-login" class="ui-btn ui-btn-c">Vendor Login</a>
	</div>
</div>
<div id="vendor-login" data-role="dialog" class="ui-overlay-shadow" data-transition="pop">
	<div data-role="header" class="ui-header ui-bar-c">
		<h3>Vendor Login</h3>
	</div>
	<div data-role="main" class="ui-content">
		<form id="vendor-login-form">
			<input type="text" id="vendor-user" name="vendor-user" placeholder="Username"/>
			<input type="password" id="vendor-pass" name="vendor-pass" placeholder="Password"/>
			<input type="button" id="vendor-login-submit" value="Login"/>
			<h6><a href="reset.html">Forgot password? Click here to reset.</a></h6>
		</form>
		<button onClick="touchID()" style="background-image:url('img/touchid-100x100.png'); width:50px!important; background-size: 50px 50px; height:50px!important; padding:2px;"></button>
		<br/>
	</div>
</div>
<div data-role="panel" id="profile" data-position="right" data-display="overlay" data-theme="a" class="ui-panel ui-panel-position-right ui-panel-display-overlay ui-body-a ui-panel-animate ui-panel-closed">
	<div class="ui-panel-inner">
	<h3>My Profile</h3>
	<div id="usernameSpace"></div>
	<br/>
	<p>
	<ul data-role="listview" data-theme="a">
		<li class="ui-btn ui-btn-d ui-btn-text ui-btn-icon-right ui-icon-calendar">My Events</li>
		<li class="ui-btn ui-btn-d ui-btn-text ui-btn-icon-right ui-icon-camera">My Photos</li>
		<li class="ui-btn ui-btn-d ui-btn-text ui-btn-icon-right ui-icon-heart">Favorites</li>
		<li class="ui-btn ui-btn-d ui-btn-text ui-btn-icon-right ui-icon-mail">Messages</li>
		<li class="ui-btn ui-btn-d ui-btn-text ui-btn-icon-right ui-icon-shop">Registry</li>
		<li class="ui-btn ui-btn-d ui-btn-text ui-btn-icon-right ui-icon-gear">Settings</li>
		<li class="ui-btn ui-btn-d ui-btn-text ui-btn-icon-right ui-icon-back">Logout</li>
	</ul>
	</p>
	</div>
</div>
		<script>
	/*
	 * Google Maps documentation: http://code.google.com/apis/maps/documentation/javascript/basics.html
	 * Geolocation documentation: http://dev.w3.org/geo/api/spec-source.html
	 */
		
	var map;
	window.user = null;
	$( document ).on( "pageinit", "#map", function() {
		var defaultLatLng = new google.maps.LatLng(34.0983425, -118.3267434);  // Default to Hollywood, CA when no geolocation support

		if ( navigator.geolocation ) {
			function success(pos) {
				// Location found, show map with these coordinates
				drawMap(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
			}

			function fail(error) {
				drawMap(defaultLatLng);  // Failed to find location, show default map
			}

			// Find the users current position.  Cache the location for 5 minutes, timeout after 6 seconds
			navigator.geolocation.getCurrentPosition(success, fail, {maximumAge: 500000, enableHighAccuracy:true});
		} else {
			drawMap(defaultLatLng);  // No geolocation support, show default map
		}
		
		var citymap = {
			Birchwood: {
			  center: {lat: 45.640301, lng: -91.577599},
			  population: 442
        	}
      	}
      

		function drawMap(latlng) {
			var myOptions = {
				zoom: 10,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

			// Add an overlay to the map of current lat/lng
			
			for (var city in citymap) {
			  // Add the circle for this city to the map.
			  var cityCircle = new google.maps.Circle({
				strokeColor: '#6EB02D',
				strokeOpacity: 1.0,
				strokeWeight: 3,
				fillColor: '#ED248F',
				fillOpacity: 0.35,
				map: map,
				center: citymap[city].center,
				radius: Math.sqrt(citymap[city].population) * 100
			  });
			}
		
			var contentString = '<div id="content">'+
				'<div id="siteNotice">'+
				'</div>'+
				'<h1 id="firstHeading" class="firstHeading">My Event</h1>'+
				'<div id="bodyContent">'+
				'This is the location of my event party. ' +
				'</div>'+
				'</div>';
			
			var contentString2 = '<div id="content">'+
				'<div id="siteNotice">'+
				'</div>'+
				'<h1 id="firstHeading" class="firstHeading">LA Wedding</h1>'+
				'<div id="bodyContent">'+
				'This is the location of my wedding. ' +
				'</div>'+
				'</div>';

			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
			
			var infowindow2 = new google.maps.InfoWindow({
				content: contentString2
			})

			marker = new google.maps.Marker({
				map: map,
				draggable: false,
				animation: google.maps.Animation.DROP,
				position: {lat: 45.640301, lng: -91.577599},
				title: 'My Event'

			});
			
			marker2 = new google.maps.Marker({
				map: map,
				draggable: false,
				animation: google.maps.Animation.DROP,
				position: {lat: 34.0522, lng: 118.2437},
				title: 'LA Wedding'
			})

			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
			
			marker2.addListener('click', function() {
				infoWindow2.open(map, marker2);
			})
		}
	});
	</script>
<script type="text/javascript">
	$(document).on("pageinit", "#page1", function(event, ui) {
		if (window.vendorlogin == "true") {
			$("a:contains('Vendors')").removeClass('ui-icon-search').addClass('ui-icon-mail');
			$("a:contains('Vendors')").attr("href", "#vendorMessages");
			$("a:contains('Vendors')").text('Messages');
		}
	})
	$(document).on("pageinit", "#message-vendor", function() {
		setInterval(getMessages(), 1000);
	})
	function getMessages() {
		$.ajax({
			type: "GET",
			url: "http://www.weddingindustryinsider.com/www/messagecount.php",
			data: 'user='+window.user+'&vendor='+window.vendor,
			cache: false,
			success: function(data) 
			{
				if (data > getCookie(window.vendor)) {
					document.cookie = window.vendor+'='+data;
					$.ajax({
						type: "GET",
						url: "http://www.weddingindustryinsider.com/www/loadmessages.php",
						data: 'user='+window.user+'&vendor='+window.vendor,
						cache: false,
						success: function(data) 
						{
							document.getElementById("messageBox").innerHTML = data;
						},
						complete: function() {
							var height = $("div.messageBody")[0].scrollHeight;
							$.mobile.silentScroll(height);
						}
					});
				}
				else {
					return;
				}
			}
		});
	}
	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	$(document).on("pageshow", "#message-vendor", function() {
		if (window.user == null) {
			$( ":mobile-pagecontainer" ).pagecontainer( "change", "#login-page", { transition: "slide" });
		}
		$.ajax({
			type: "GET",
			url: "http://www.weddingindustryinsider.com/www/loadmessages.php",
			data: 'user='+window.user+'&vendor='+window.vendor,
			cache: false,
			success: function(data) 
			{
				$.ajax({
					type: "GET",
					url: "http://www.weddingindustryinsider.com/www/messagecount.php",
					data: 'user='+window.user+'&vendor='+window.vendor,
					cache: false,
					success: function(data)
					{
						document.cookie = window.vendor+'='+data;
					}
				})
				document.getElementById("messageBox").innerHTML = data;
			},
			complete: function() {
				var height = $("div.messageBody")[0].scrollHeight;
				$.mobile.silentScroll(height);
			}
		});
	})
	var login = "false";
	$(document).on( "pageinit", "#vendors", function() {
		var filter = 0;
		 $.ajax({
			type: "POST",
			url: "http://www.weddingindustryinsider.com/www/vendorlist.php",
			data: 'filter=' + filter,
			cache: false,
			success: function(data) 
			{
				document.getElementById("results").innerHTML = data;
				$("#results").listview("refresh");
			}
		 });
	})
	function changePage(vendorID) {
		$( ":mobile-pagecontainer" ).pagecontainer( "change", "#vendor-page", { transition: "slide" });
		$.ajax({
			type: "POST",
			url: "http://www.weddingindustryinsider.com/www/vendorpull.php",
			data: 'id=' + vendorID,
			cache: false,
			success: function(data) 
			{
				document.getElementById("vendor-data").innerHTML = data;
				var e = document.getElementById("vendor-message");
				e.setAttribute("name", vendorID);
				window.vendor = vendorID;
			}
		 })
	}
	</script>
    	<script type="text/javascript">
		function touchID() {
			if (window.plugins) {
				window.plugins.touchid.isAvailable(function() {
					window.plugins.touchid.has("MyKey", function() {
						alert("Touch ID avaialble and Password key available");
					}, function() {
						if (window.plugins) {
							window.plugins.touchid.verify("MyKey", "My Message", function(password) {
								alert("Touch " + password);
							});
						}
					});
				}, function(msg) {
					alert("no Touch ID available");
				});
			}
		}
		function loginCheck() {
			$.ajax({
				url: "login.php",
				cache: false,
				success: function(data)
				{
					if (login == "false") {
						$( ":mobile-pagecontainer" ).pagecontainer( "change", "#login-page", { transition: "slide" });
					}
					else {
						$("#profile").panel();
						$("#profile").panel("open").enhanceWithin();
					}
				}
			});
		}
		$("#login-submit").click(function(){
			$("#login-form").trigger("submit");
		});
		$("#login-form").submit(function(e){
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "http://www.weddingindustryinsider.com/www/logincheck.php",
				data: $("#login-form").serialize(),
				cache: false,
				success: function(data)
				{
					if (data == "1") {
						window.login = "true";
						window.user = $("#user").val();
						$( ":mobile-pagecontainer" ).pagecontainer( "change", "#page1", { transition: "flip" });
					}
					else {
						alert("Username or password Incorrect. Please try again.");
					}
				}
			});
		});
		$("#vendor-login-submit").click(function(){
			$("#vendor-login-form").trigger("submit");
		});
		$("#vendor-login-form").submit(function(e){
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "http://www.weddingindustryinsider.com/www/vendorlogin.php",
				data: $("#vendor-login-form").serialize(),
				cache: false,
				error: function(jqXHR, textStatus, data) {
					alert(textStatus);
				},
				success: function(data)
				{
					var result = data.split(",");
					if (result[0] == "YES") {
						window.login = "true";
						window.user = $("#vendor-user").val();
						window.displayName = result[1];
						window.vendorlogin = "true";
						getVendorID();
						$( ":mobile-pagecontainer" ).pagecontainer( "change", "#page1", { transition: "pop", reload: "true"});
						
					}
					else if (result[0] == "NO") {
						alert("Username is not listed as a vendor. Please check with account administrator.");
					}
					else if (result[0] == "FAIL") {
						alert("Username or password incorrect. Please try again.");
					}
				}
			});
		});
		function sendMessage() {
			$.ajax({
				type: "GET",
				url: "http://www.weddingindustryinsider.com/www/sendmessage.php",
				data: "user="+window.user+"&vendor="+window.vendor+"&message="+$("#messageToSend").val(),
				cache: false,
				success: function(data)
				{
					if (data = "Success") {
						$("#messageBox").append("<div class='clientMessage'>"+$("#messageToSend").val()+"</div>");
						var height = $("div.messageBody")[0].scrollHeight;
						$.mobile.silentScroll(height)
					}
				}
			});
		}
		function getVendorID() {
			$.ajax({
				type: "GET",
				url: "http://www.weddingindustryinsider.com/www/getVendorID.php",
				data: "username="+window.displayName,
				dataType: 'text',
				cache: false,
				error: function(jqXHR, textStatus, data) {
					alert(textStatus);
				},
				success: function(data)
				{	
					var result = data;
					result = result.split(",");
					window.vendorID = result[0];
					document.getElementById("usernameSpace").innerHTML = window.user;
				}
			});
		}
</script>
	</body>
</html>