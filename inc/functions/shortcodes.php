<?php

/**
 * Custom Shortcodes
 *
 * TODO: add support for tinyMCE buttons, clean up.
 *
 * @author     Travis Arnold
 * @since      version 0.1
 */

// Featured Youtube Video
function youtube_feed_shortcode($atts) {
    // Defaults:
    extract(shortcode_atts(array(
            'user' => 'revivaltv', // youtube user
            'limit' => 1, // maximum number of videos
            'height' => '100%', // video height
            'width' => '100%' // video width
        ), $atts));
    $data = @json_decode(file_get_contents('http://gdata.youtube.com/feeds/api/users/'.$user.'/uploads?alt=json'), TRUE);
    $counter = 0;
    $content = '<div class="video-container">';
    foreach($data['feed']['entry'] as $vid)
    {
        $url = $vid['media$group']['media$content'][0]['url'];
        $title = $vid['title']['$t'];
        $ycontent = $vid['content']['$t'];
        $content.= '<object width="'.$width.'" height="'.$height.'">'.
            '<param name="movie" value="'.$url.'"></param>'.
            '<param name="allowFullScreen" value="true"></param>'.
            '<param name="allowscriptaccess" value="always"></param>'.
            '<embed src="'.$url.'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="'.$width.'" height="'.$height.'"></embed></object>'."\n";
        $counter++;
        if($counter == $limit)
        {
            break;
        }
    }
    $content .= '</div>';
    return $content;
}
add_shortcode('youtubefeed', 'youtube_feed_shortcode');

// Latest Youtube Video
function latest_youtube($user, $limit = 1) {
	$feedURL = 'http://gdata.youtube.com/feeds/api/users/'.$user.'/uploads?max-results='.$limit;
	$sxml = simplexml_load_file($feedURL);
	$i=0;
	foreach ($sxml->entry as $entry) {
		$media = $entry->children('media', true);
		$url = (string)$media->group->player->attributes()->url;
		$thumbnail = (string)$media->group->thumbnail[0]->attributes()->url;
		$e  = '<div id="video-wrap">';
		$e .= '<video controls="" width="640" height="360">';
		$e .= '<source src="'.$url.'" type="video/youtube" />';
		$e .= '</video>';
		$e .= '</div>';    
	}
	$i++;
	return $e;
}

// Video Shortcode
function video_shortcode($atts) {
 
	extract(shortcode_atts(array(
	    'url' => '',
	    'format' => 'mp4',
	), $atts));

	echo '<video controls="" width="640" height="360">';
	echo '<source src="'.$url.'" type="video/'.$format.'" />';
	echo '</video>';
}
add_shortcode('video', 'video_shortcode');

// Audio Shortcode
function audio_shortcode($atts) {

	extract(shortcode_atts(array(
	    'url' => ''
	), $atts));

	echo '<audio controls="" preload="none" width="640" height="30" src="'.$url.'"></audio>';
}
add_shortcode('audio', 'audio_shortcode');