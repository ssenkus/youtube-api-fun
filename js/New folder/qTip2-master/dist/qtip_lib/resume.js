			$(document).ready(function() {
				// Match all <A/> links with a title tag and use it as the content (default).
				$('a[title]').qtip({
					position: {
						my: 'left top',  // Position my top left...
						at: 'top right', // at the bottom right of...
						target: $('div.portfolio_list')
		
					},
					style: {
					classes: 'qtip-blue qtip-shadow',
					width: 550, // Override default CSS width to the map width
					height: 230
					
					}
				});
							
					
				/* IPInfoDB API Key - Use your own please not mine!!! */
				var apikey = '3d26e08735f33e0cbc88e9841d51e1062f33f84aa77de3c27be83601891fa2c9';
				$('#address').each(function() {
				// Grab the IP from the elements inner text
					var ip = '71.193.202.188'; //$(this).text();
					// Setup the tooltip
					$(this).qtip({
						content: {
						text: 'Loading data...',
						ajax: {
							url: 'http://api.ipinfodb.com/v2/ip_query.php?callback=?', // IPInfoDB URL
							type: 'GET',
							dataType: 'jsonp', // The API uses jsonp...
							data: {
								ip: ip, // The IP to geolocate
								key: apikey, // The API Key (again, use your own not mine please!!!)
								timezone: false, // Not really needed I guess(?)
								output: 'json' // We'll request the output in JSON format
							},
						
							success: function(json) {
								var api = this, container, latlong, options, map, marker;
	 
								// Setup the map container and append it to the tooltip
								container = $('<div style="width:290px; height:240px;" />')
								.appendTo(api.elements.content.empty());
	 
								// Setup coordinates and create map object
								latlong = new google.maps.LatLng(45.510882,-122.6815); //json.Latitude, json.Longitude);
								api.map = new google.maps.Map(container[0], {
									zoom: 14,
									center: latlong,
									mapTypeId: google.maps.MapTypeId.ROADMAP
								});
	 
								// Setup location marker
								marker = new google.maps.Marker({
									position: latlong,
									map: api.map,
									clickable: true,
	 
									// The title of the marker will be in the format: <city> <region> <country>
									title: ['Steven Senkus', '1834 SW 5th Ave.', 'Apt #309','Portland, OR 97201'].join('\n')
								});
	 
								// Update tooltip position
								api.reposition();
							}
						}
						},
						position: {
							my: 'left center',
							at: 'right middle',
							target: $('#header')
						},
						show: 'click', // Show it on click
						hide: {
							delay: 1000,
							fixed: true // We'll let the user interact with it
						},
						style: {
							classes: 'qtip-dark qtip-shadow qtip-googlemap',
							width: 290 // Override default CSS width to the map width
						}
					});
				});
			});
	