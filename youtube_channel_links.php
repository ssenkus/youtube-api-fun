<?php 
  class ChannelFeed {
    function __construct( $username ) {
        $this->username=$username;
        $this->feedUrl=$url='http://gdata.youtube.com/feeds/api/users/'.$username.'/uploads';
        $this->feed=simplexml_load_file($url);
    }

    public function getURLs() { 
        $vidArray = array();

        foreach($this->feed->entry as $video) {
            $vidURL = (string)$video->link['href'];
            $vidArray[] = $vidURL;
        }

        return $vidArray;
	}
	
	public function getTitles() { 
        $titleArray = array();

        foreach($this->feed->entry as $video) {
			$vidTitle = (string)$video->title;
            $titleArray[] = $vidTitle;
        }

        return $titleArray;
	}
	
	public function getContents() { 
        $contentArray = array();

        foreach($this->feed->entry as $video) {
			$vidContent = (string)$video->content;
            $contentArray[] = $vidContent;
        }

        return $contentArray;
	}
  }

function getYouTubeID($vidURL) {

    $ytvIDlen = 11; // This is the length of YouTube's video IDs

    // The ID string starts after "v=", which is usually right after 
    // "youtube.com/watch?" in the URL
    $idStarts = strpos($vidURL, "?v=");

    // In case the "v=" is NOT right after the "?" (not likely, but I like to keep my 
    // bases covered), it will be after an "&":
    if($idStarts === FALSE)
        $idStarts = strpos($vidURL, "&v=");

    // If still FALSE, URL doesn't have a vid ID
    if($idStarts === FALSE)
        die("YouTube video ID not found. Please double-check your URL.");

    // Offset the start location to match the beginning of the ID string
    $idStarts +=3;

    // Get the ID string and return it
    $ytvID = substr($vidURL, $idStarts, $ytvIDlen);    

    return $ytvID;   
}
?>