<?php
	require_once('youtube_channel_links.php');
	require_once('functions.php');

	$youtube = new ChannelFeed('mochilera1urbana');
	$vids = $youtube->showFullFeed();
	$vidIDs = array_map("getYouTubeID",$vids);
	$base_url = 'http://www.youtube.com/embed/';
	
	foreach ($vidIDs as & $vidID) {
		$vidID = $base_url . $vidID;
	}

	$yt_vid = array_random($vidIDs);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Steven Senkus - Front-End Portfolio (HTML, JS, CSS)</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<!-- Add jQuery library -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

		<!-- Add mousewheel plugin (this is optional) -->
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

		<!-- Add fancyBox -->
		<link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>

		<!-- Optionally add helpers - button, thumbnail and/or media -->
		<link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

		<link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald" />
		
		<link rel="stylesheet" type="text/css" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/fancybox_styles.css" />
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>scripts/fancybox/fancybox_settings.js"></script>

	</head>
	<body>
		<div id="wrapper">
			<div class="vidList">
				<?php
					for ($x = 0; $x < (count($vidIDs)/2); $x++) {
						echo '<div class="vidBox">';
						echo '<a class="fancybox fancybox.iframe" href="' . $vidIDs[$x] . '" rel="group"><img src="http://img.youtube.com/vi/'. str_replace($base_url, "", $vidIDs[$x]) .'/1.jpg" />Vid-'. $x . '</a>';
						echo '</div>';
					}
				?>
			</div>
			<div class="vidList">
				<?php
					
					for ($x = (ceil(count($vidIDs)/2)); $x < (count($vidIDs)); $x++) {
						echo '<div class="vidBox">';
						echo '<a class="fancybox fancybox.iframe" href="' . $vidIDs[$x] . '" rel="group"><img src="http://img.youtube.com/vi/'. str_replace($base_url, "", $vidIDs[$x]) .'/1.jpg" />Vid-'. $x . '</a>';
						echo '</div>';
					}
				?>
			</div>	
			<div style="height:1px; clear:both;"></div>
		</div>
	</body>
</html>