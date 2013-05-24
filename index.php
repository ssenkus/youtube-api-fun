<?php
	require_once('youtube_channel_links.php');
	require_once('functions.php');

	$youtube = new ChannelFeed('mochilera1urbana');

	// get all video URLs, strip off video IDs, then rewrite URL
	$vidURLs = $youtube->getURLs();
	$vidTitles = $youtube->getTitles();
	$vidContents = $youtube->getContents();
	$vidIDs = array_map("getYouTubeID",$vidURLs);
	$base_url = 'http://www.youtube.com/embed/';
	
	foreach ($vidIDs as & $vidID) {
		$vidID = $base_url . $vidID;
	}

	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>East Cackalacky Video Feed</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- <link rel="stylesheet" type="text/css" href="styles/style.css" /> -->
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
		
		<script type="text/javascript" src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>bootstrap/js/bootstrap.min.js"></script>
		<link href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">		
		<link href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>styles/bs-extend.css" rel="stylesheet" media="screen">				
	</head>
	<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">East Cackalacky</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <a href="mailto:eastcackalacky@gmail.com" class="navbar-link">@</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
    <div style="height: 1px; clear: both;"></div>
	
    <div class="container-fluid">
      <div class="row-fluid">
	  
	  
	  		 <div class="row-fluid" style="height: 46px;">
		 </div>
	  
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">

				<?php
				
					outputYoutubeBlock($base_url, $vidIDs,$vidTitles,$vidContents);
					
					
					function outputYoutubeBlock($base_url, $vidIDs,$vidTitles,$vidContents) {

					
					
						for ($x = 0; $x < (count($vidIDs)); $x++) {
							if ($x % 4 == 0) {
								 echo '<div class="row-fluid">';
							}
							
							
							if (strlen($vidContents[$x]) > 200) {
								$vidContents[$x] = substr($vidContents[$x],0,200).'...';
							}
							
							echo '<div class="span3">';
							echo '<a class="fancybox fancybox.iframe" href="' . $vidIDs[$x] . '" rel="group">' . 
								 '<img src="http://img.youtube.com/vi/'. str_replace($base_url, "", $vidIDs[$x]) .'/0.jpg" />' .
								 '</a><h3>'. $vidTitles[$x] . '</h3><p>'.$vidContents[$x].'</p>';
							echo '</div>';
						
							if ($x % 4 == 3 || $x == ((count($vidIDs))-1)) {
								echo '</div><div class="divider"></div>';
							}
						}
					
					}
					
					
					

				?>
            
            </div><!--/span-->
        </div><!--/row-->
      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.fluid-container-->
		
		
    <div class="navbar navbar-inverse navbar-fixed-bottom">
	
	
	
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<script type="text/javascript">
		$('.span3').css('height','200px');
	
	</script>
	
	
	</body>
</html>