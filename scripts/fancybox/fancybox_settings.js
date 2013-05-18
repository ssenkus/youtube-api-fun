
		$(document).ready(function() {
			$(".fancybox")
				.attr('rel', 'gallery')
				.fancybox({
					openEffect: 'elastic',
					closeEffect: 'elastic',
					nextEffect: 'fade',
					prevEffect: 'fade',
					padding: 15,
					margin: 20, // Increase left/right margin
					helpers:  {
						thumbs: {
							width: 50,
							height: 50
						},
						media: {},
						title: {
							type: 'inside' 
						},
						overlay: {
								closeClick : true,  // if true, fancyBox will be closed when user clicks on the overlay
								speedOut   : 1000,   // duration of fadeOut animation
								showEarly  : false,  // indicates if should be opened immediately or wait until the content is ready
								locked     : true   // if true, the content will be locked into overlay
							},
					}
				});

		});