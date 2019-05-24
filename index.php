<!DOCTYPE html>

<html>
<header>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./style.css">
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<div class="title">“ỨNG DỤNG SMARTPHONE TRONG GIÁM SÁT VÀ DỰ BÁO SỰ THAY ĐỔI NHIỆT ĐỘ TẠI THÀNH PHỐ HỒ CHÍ MINH ”
	</div>
<div class="XA">"Chủ nhiệm đề tài: Đinh Xuân Anh"</div>
	<style>
		#googleMap {
			height: 100%;
			width: 100%;
		}
	</style>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

</header>

<body id="top">
	<div id="slider" class="clear">
		<!-- ################################################################################################ -->
		<div class="flexslider basicslider">
			<ul class="slides">
				<li><img src="images/demo/slides/01.png" alt="">
					<div class="txtoverlay">
						<div class="centralise">
							<div class="verticalwrap">
								<article>
									
									<h3 class = "txtbanner">
										Thành phố Hồ
										Chí Minh là trung tâm phát triển kinh tế của khu vực phía Nam và cả nước. Tuy
										nhiên, thành phố cũng xếp vào loại hàng đầu thành phố của Việt Nam có thể chịu
										ảnh hưởng nặng nề bởi biến đổi khí hậu mà một biểu hiện dễ dàng nhận thấy chính
										là sự thay đổi nhiệt độ theo xu hướng ngày càng tăng. Vào mùa khô, thành phố như
										một quả cầu lửa và sức ép từ dân số khiến thành phố ngày càng chật vật trước
										hiện trạng biến đổi khí hậu. </h3>
								</article>
							</div>
						</div>
					</div>
				</li>
				<li><img src="images/demo/slides/02.png" alt="">
					<div class="txtoverlay">
						<div class="centralise">
							<div class="verticalwrap">
								<article >
									<h3 class = "txtbanner">Thêm vào đó,
										chỉ số tia UV tại thành phố Hồ Chí Minh đang ở mức rủi ro cao kể từ năm 2018.
										Chính vì những nguyên nhân đó, trang Web này được lập ra nhằm hỗ trợ việc giám
										sát nhiệt độ và dự báo chỉ số tia UV. Công cụ có thể xác định được chỉ số nhiệt
										độ và tia UV tại một vị trí cụ thể, từ đó đưa ra những cảnh báo và khuyến nghị
										về sức khỏe cho người sử dụng. Thông qua đó sẽ cho phép người dùng có cái nhìn
										toàn vẹn về tình trạng của thành phố và mỗi người sẽ có ý thức hơn trong việc
										bảo vệ thành phố của mình.</h3>
								</article>
							</div>
						</div>
					</div>
				</li>
				<li><img src="images/demo/slides/03.png" alt="">
					<div class="txtoverlay">
						<div class="centralise">
							<div class="verticalwrap">
								<article>
									<h3 class = "txtbanner">Có thể nói,
										việc ứng dụng các tính năng của smartphone để tạo ta một ứng dụng thông minh để
										giám sát và dự báo nhiệt độ cho thấy sự nỗ lực trong việc khắc phục hậu quả của
										biến đổi khí hậu đồng thời là sự hòa mình của của sinh viên vào cuộc cách mạng
										4.0 góp phần xây dựng một thành phố văn minh, hiện đại, hài hòa.</h3>
								</article>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- ################################################################################################ -->
	</div>


	
			<div id="googleMap" style="width:100%0%;height:100%;float: right;">	</div>


	<form>
		<div>
			<div>
				<input type="hidden" name="temp" id="temp" />
			</div>
			<div>
				<input type="hidden" name="uv" id="uv" />
			</div>
			<p id="location">
				<br>
				<input type="hidden" name="lat" id="lat" />
				<input type="hidden" name="long" id="long" />
			</p>
		</div>
	</form>

	<script>

		var marker;
		var map;
		var apiKey = "362e23c1a9ba1a8624fc77deeb3919c6";
		var url = "https://api.forecast.io/forecast/";
		var UV;
		var temperature;
		var myCenter;
		var warning;
		function Submit() {
			var temp = document.getElementById("temp").value;
			var uv = document.getElementById("uv").value;
			var lat = document.getElementById("lat").value;
			var long = document.getElementById("long").value;
			$.ajax({
				method: "POST",
				url: 'process.php',
				data: {
					temp: temp,
					uv: uv,
					lat: lat,
					long: long
				},
				cache: false,

			})
		}
		function UV_warning(uv) {
			switch (uv) {
				case 0:
				case 1:
				case 2: return '<div style="color: green";>' + '<strong>Chỉ số UV THẤP (0-2): NGUY HIỂM THẤP.' +
					'<br>Bạn vẫn có thể an toàn khi ở ngoài trời.</strong>' + '</div>';
				case 3:
				case 4:
				case 5: return '<div style="color: #FFCC00">' + '<strong>Chỉ số UV TRUNG BÌNH (3-5): RỦI RO VỪA PHẢI.' +
					'<br>Bạn nên sử dụng kem chống nắng, kính râm, che chắn cơ thể.' +
					'<br>Tránh tiếp xúc với ánh nắng vào giữa trưa.</strong>' + '</div>';
				case 6:
				case 7: return '<div style="color: orange">' + '<strong>Chỉ số UV CAO (6-7): NGUY CƠ CAO.' +
					'<br>Bạn nên sử dụng kem chống nắng (SPF>15+), kính râm, che chắn cơ thể và tìm kiếm bóng râm.' +
					'<br>Giảm thời gian tiếp xúc ánh nắng trong khoảng 11h-16h.</strong>' + ' </div>';
				case 8:
				case 9:
				case 10: return '<div style="color: red">' + '<strong>Chỉ số UV RẤT CAO (8-10): NGUY CƠ RẤT CAO.' +
					'<br>Bạn nên sử dụng kem chống nắng (SPF>30), kính râm, che chắn cơ thể, chăm sóc da để tránh cháy nắng.' +
					'<br>Không nên đứng dưới nắng quá lâu.</strong>' + '</div>';
				default: return '<div style="color: purple">' + '<strong>Chỉ số UV CỰC CAO (11+): NGUY CƠ CỰC CAO.' +
					'<br>Bạn nên sử dụng kem chống nắng (SPF>30+), kính râm, che chắn cơ thể.' +
					'<br>Tránh tiếp xúc trực tiếp ánh nắng trong khoảng 11h-16h.' +
					'<br>Không đứng dưới nắng quá lâu.</strong>' + '</div>';
			}
		}

		function myMap() {
			var styledMapType = new google.maps.StyledMapType(
            [
              {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
              {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
              {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
              {
                featureType: 'administrative',
                elementType: 'geometry.stroke',
                stylers: [{color: '#c9b2a6'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'geometry.stroke',
                stylers: [{color: '#dcd2be'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'labels.text.fill',
                stylers: [{color: '#ae9e90'}]
              },
              {
                featureType: 'landscape.natural',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#93817c'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'geometry.fill',
                stylers: [{color: '#a5b076'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#447530'}]
              },
              {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#f5f1e6'}]
              },
              {
                featureType: 'road.arterial',
                elementType: 'geometry',
                stylers: [{color: '#fdfcf8'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#f8c967'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#e9bc62'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry',
                stylers: [{color: '#e98d58'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry.stroke',
                stylers: [{color: '#db8555'}]
              },
              {
                featureType: 'road.local',
                elementType: 'labels.text.fill',
                stylers: [{color: '#806b63'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.fill',
                stylers: [{color: '#8f7d77'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.stroke',
                stylers: [{color: '#ebe3cd'}]
              },
              {
                featureType: 'transit.station',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'water',
                elementType: 'geometry.fill',
                stylers: [{color: '#b9d3c2'}]
              },
              {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#92998d'}]
              }
            ],
            {name: 'Styled Map'});





			map = new google.maps.Map(document.getElementById("googleMap"), {
				zoom: 9,
				center: new google.maps.LatLng(10.852637390237529, 106.64873547874913),
				disableDefaultUI: true,
				mapTypeControlOptions: {
           			 mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                    'styled_map']
          }
			});
			map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
        map.setOptions({draggable: false}); //block move 
        
			infoWindow = new google.maps.InfoWindow;

			if (navigator.geolocation) {
				var options = {
					enableHighAccuracy: true,
					timeout: 60000,
					maximumAge: 600000
				};
				navigator.geolocation.getCurrentPosition(showPositionSuccess, showPositionError, options);
			} else {
				handleLocationError(false, infoWindow, map.getCenter());

			}

			function showPositionSuccess(position) {

				var url = "https://api.forecast.io/forecast/";
				var url_location = "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=";
				navigator.geolocation.getCurrentPosition(success, error);

				function success(position) {
					lat = position.coords.latitude;
					long = position.coords.longitude;

					var myCenter = new google.maps.LatLng(lat, long);

					marker = new google.maps.Marker({
						animation: google.maps.Animation.BOUNCE, // annimation nhảy cho marker
						icon: 'http://www.codeshare.co.uk/images/blue-pin.png', // set icon marker
						position: myCenter,
					});

					marker.setMap(map);

					temperature = 0;
					UV = 0;

					$.getJSON(url + apiKey + "/" + position.coords.latitude + "," + position.coords.longitude + "?callback=?",
						function (data) {
							temperature = Math.round((data.currently.temperature - 32) * 5 / 9);
							UV = data.currently.uvIndex;
							warning = UV_warning(UV);
							$.getJSON(url_location + position.coords.latitude + "&lon=" + position.coords.longitude,
								function (data) {

									var infowindow = new google.maps.InfoWindow({
										content:
											'<b> VỊ TRÍ </b>: ' + data.display_name +
											'<br><b> NHIỆT ĐỘ </b>: ' + temperature + ' &#186C' +
											'<br><b> UV </b>: ' + UV +
											'<div style="color: red">' +
											'<b> CẢNH BÁO: </b></div>' + warning

									});
									Submit();
									infowindow.open(map, marker);
								



								});
							document.getElementById("temp").value = Math.round((data.currently.temperature - 32) * 5 / 9);
							document.getElementById("uv").value = data.currently.uvIndex;
							document.getElementById("lat").value = myCenter.lat();
							document.getElementById("long").value = myCenter.lng();

						});



					infoWindow.setPosition(myCenter);
					map.setCenter(myCenter);
				}

				function error() {
					handleLocationError(true, infoWindow, map.getCenter());
				}


			}
			function showPositionError(error) {
				switch (error.code) {
					case error.PERMISSION_DENIED:
						$("#location").html("User denied the request for Geolocation.");
						break;
					case error.POSITION_UNAVAILABLE:
						$("#location").html("Location information is unavailable.");
						break;
					case error.TIMEOUT:
						$("#location").html("The request to get user location timed out.");
						break;
					case error.UNKNOWN_ERROR:
						$("#location").html("An unknown error occurred.");
						break;
				}
			}


            map.addListener('click',function(event){
            			placeMarker(map,event.latLng);
            });



			function placeMarker(map, location) {


				var url_location = "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=";
				$.getJSON(url + apiKey + "/" + location.lat() + "," + location.lng() + "?callback=?",
					function (data) {
						temperature = Math.round((data.currently.temperature - 32) * 5 / 9);
						UV = data.currently.uvIndex;
						warning = UV_warning(UV);
						$.getJSON(url_location + location.lat() + "&lon=" + location.lng(),
							function (data) {
								if (marker && marker.setMap) {
									marker.setMap(null);
								}

								marker = new google.maps.Marker({
									position: location,
									icon: 'http://www.codeshare.co.uk/images/blue-pin.png', // set icon marker
									map: map
								});
								var infowindow = new google.maps.InfoWindow({
									content:
										'<b> VỊ TRÍ </b>: ' + data.display_name +
										'<br><b> NHIỆT ĐỘ </b>: ' + temperature + ' &#186C' +
										'<br><b> UV </b>: ' + UV +
										'<div style="color: red">' +
										'<b> CẢNH BÁO: </b></div>' + warning
								});
                               
								infowindow.open(map, marker);

							});
						document.getElementById("temp").value = Math.round((data.currently.temperature - 32) * 5 / 9);
						document.getElementById("uv").value = data.currently.uvIndex;
						document.getElementById("lat").value = location.lat();
						document.getElementById("long").value = location.lng();
						Submit();
					});




			}

		}
		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(browserHasGeolocation ?
				'Error: The Geolocation service failed.' :
				'Error: Your browser doesn\'t support geolocation.');
			infoWindow.open(map);
		}

	</script>

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false" type="text/javascript"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxiMCNZdVey9QnH7vQFgpXBEL0VP7cCQA&callback=myMap"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="layout/scripts/jquery.min.js"></script>
	<script src="layout/scripts/jquery.backtotop.js"></script>
	<script src="layout/scripts/jquery.mobilemenu.js"></script>
	<script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>
<style>@media only screen and (max-width: 605px) {
		.txtbanner{
			text-align: center;
			margin-right: 40px;
			margin-left: 40px;
			font-size: 6px ;
  		  color: white; 
   		 font-family: 'Times New Roman', Times, serif; 
   			 padding-bottom: 1.5em;
		}
		.title{
			font-size: 5px;
			padding: 0px;
			margin: 0px;
            text-align: center;
            font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
            color: #e0dfdc;
            background-color: #333;
            letter-spacing: .1em;
            text-shadow: 0 0px 0 #fff, 0 0px 0 #2e2e2e, 0 1px 0 #2c2c2c, 0 1px 0 #2a2a2a, 0 2px 0 #282828, 0 2px 0 #262626, 0 2px 0 #242424, 0 2px 0 #222, 0 3px 0 #202020, 0 3px 0 #1e1e1e, 0 3px 0 #1c1c1c, 0 3px 0 #1a1a1a, 0 4px 0 #181818, 0 4px 0 #161616, 0 5px 0 #141414, 0 5px 0 #121212, 0px 6px 0 rgba(0, 0, 0, 0.9);
    		}
    	.XA{
			font-size: 4px;
			text-align: center;
			margin: 0px;
			height: 5px;
			padding: 0px;
			width: 100%;
			line-height: 0em;
		}
		.UV{
		
			margin-left: 0px;
			padding-bottom: 50px;
			width: 130px;
		}
}</style>
<footer>
    	<div  class="UV"><img src="images/demo/slides/img_uv1.png"></div>
</footer>

</html>