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
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
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
		  <img id="header-image" src="images/ec-header.png" style="width: 400px; height: 150px; position: absolute; top: 100px; left: 200px; display:none;" />
          <div class="nav-collapse collapse">

				<ul class="nav pull-right">
					<li class="active"><a href="#"><i class="icon-large icon-facebook-sign"></i></a></li>
					<li><a href="#about"><i class="icon-large icon-twitter-sign"></i></a></li>
				</ul>
				

            <ul class="nav">
              <li class="active"><a style="color:#d00;" href="#"><i class="icon-large icon-home"></i> Home</a></li>
              <li><a href="#about"><i style="color:#d60;" class="icon-large icon-question-sign"></i>&nbsp;About</a></li>
              <li><a href="#music"><i style="color:#dd0;" class="icon-large icon-music"></i>&nbsp;Music</a></li>
			  <li><a href="#videos"><i style="color:#0d0;" class="icon-large icon-facetime-video"></i>&nbsp;Videos</a></li>
			  <li><a href="#tour"><i style="color:#0d6;" class="icon-large icon-globe"></i>&nbsp;Tour</a></li>
			  <li><a href="#contact"><i style="color:#00d;" class="icon-camera-retro icon-large"></i>&nbsp;Photos</a></li>
			  
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
          <div class="well sidebar-nav" >
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/Q4L4s3pn1OE">Link</a></li>
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
							if (strlen($vidTitles[$x]) > 50) {
								$vidTitles[$x] = substr($vidTitles[$x],0,50).'...';
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
		
	  		 <div class="row-fluid" style="height: 46px;">
		 </div>
		 
		 
    <div class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<div class="nav-collapse collapse">
<!-- Begin MailChimp Signup Form -->

			<div id="mc_embed_signup" class="pull-right">
			<form action="http://eastcackalacky.us6.list-manage2.com/subscribe/post?u=fb4d8bcc6752f48697a5ff69d&amp;id=5a5f3c51d4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<label for="mce-EMAIL">Subscribe to our newsletter!</label>
				<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
			<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
			</form>
			</div>

<!--End mc_embed_signup-->
            <ul class="nav">
				<li><a href="mailto:eastcackalacky@gmail.com" class="navbar-link"><i class="icon-large icon-envelope-alt"></i>&nbsp;Mail</a></li>
				<li><a href="#contact"><i class="icon-large icon-money"></i>&nbsp;Donate</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<script type="text/javascript">

	
	</script>

	</body>
</html>