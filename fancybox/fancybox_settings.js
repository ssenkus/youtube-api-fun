
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
        thumbs : {
            width: 50,
            height: 50
        }
    }
				});

		});