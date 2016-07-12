<?php

/***********************************************************************************
  
The "Time Ago" Function for the Timeline
  
************************************************************************************/
    
function time_ago($date) {
    
    // Timestamp of date/time.
    $time_og = strtotime($date);
    
    // Units of time.
    $units= array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    
    // Time intervals.
    $intervals= array("60","60","24","7","4.35","12","10");
    
    // Current timestamp.
    $now = time();
    
    // Calculate difference in seconds.
    $difference = $now - $time_og;
    
    // Calculate and format.
    for($j = 0; $difference >= $intervals[$j] && $j < count($intervals)-1; $j++) {
    	$difference /= $intervals[$j];
    }
    $difference = round($difference);
    
    // Add 's' if greater than 1 'minute', 'year', etc.
    if($difference != 1) {
    	$units[$j].= "s";
    }  
     
    // Final formatting '1 day ago'.
    $ago = "$difference ".$units[$j]." ago";
    
    // Echo result.
    echo $ago;
} 

/***********************************************************************************
  
The "Get Content" Function for the Timeline
  
************************************************************************************/

function get_content() {
    
    // Set the content directory.
    $content_dir = '././content/';
    
    // Read all available content files.
    if($handle = opendir($content_dir)) {
        $files = array();
        $filetimes = array();
        while (false !== ($entry = readdir($handle))) {
            if(substr(strrchr($entry,'.'),1)==ltrim('.txt', '.')) {
                
                // Post meta.
                $fcontents = file($content_dir.$entry);
                $time = strtotime($fcontents[2]);
                $name = str_replace(".txt", '', $entry);
                
                // Post content.
                $title = str_replace("\n", '', $fcontents[0]);
                $date = str_replace("\n", '', $fcontents[2]);
                $text = str_replace("\n", '', $fcontents[4]);
                $link_title = str_replace("\n", '', $fcontents[6]);
                $link = str_replace("\n", '', $fcontents[7]);
                
                // The content array.
                $files[] = array(                    
                    'time' => $time, 
                    'name' => $name, 
                    'title' => $title,
                    'date' => $date,
                    'text' => $text,
                    'link_title' => $link_title,
                    'link' => $link
                );
                
                // Sort by time.
                $filetimes[] = $time;
            }
        }
        array_multisort($filetimes, SORT_DESC, $files);
        return $files;
    } else {
        return false;
    }
}

$posts = get_content();
if($posts) {
    ob_start();
    $content = '';
    foreach($posts as $post) {
        
        // Get the post type.
        $post_type = strtok($post['name'], '-');
        
        // Generate video images.
        if($post_type == 'youtube' || $post_type == 'vimeo') {
            
            // Get the video ID.
            $video_id = str_replace($post_type . '-', '', $post['name']);
            
            // Generate post images.    
            if(!is_readable('./content/' . $post['name'] . '.jpg')) {
                
                // YouTube post images.
                if($post_type == 'youtube') {
                    $thumbnail = file_get_contents('https://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg');
                }
                
                // Vimeo post images.
                if($post_type == 'vimeo') {
                    $the_video_meta = json_decode(file_get_contents('https://vimeo.com/api/oembed.json?url=https%3A%2F%2Fvimeo.com%2F' . $video_id));
                    $thumbnail = file_get_contents($the_video_meta->thumbnail_url);
                }
                
                // Save the post image.
                file_put_contents('./content/' . $post['name'] . '.jpg', $thumbnail);
            }
        }
        
        // Does this post have an image?
        if(is_readable('./content/' . $post['name'] . '.jpg')) {
            $post_image = 'content/' . $post['name'] . '.jpg';
        } else {
            unset($post_image);
        }
        
        // Does this post have a background image?
        if(is_readable('./content/' . $post['name'] . '-background.jpg')) {
            $background_image = 'content/' . $post['name'] . '-background.jpg';
        } else {
            unset($background_image);
        }
        
        ?>
        <?php if($background_image) { ?>
        <article class="row background <?php echo($post_type); ?>">
            <div class="background" style="background-image: url('<?php echo($background_image); ?>');">
            </div>
        <?php } else { ?>
        <article class="row <?php echo($post_type); ?>">
        <?php } ?>
            <div class="content">
                <div class="copy">
                    <span class="type <?php echo($post_type); ?>"></span>
                    <span class="date"><?php time_ago($post['date']); ?></span>

                    <?php if($post_type == 'youtube' || $post_type == 'vimeo') { ?>
                    <a class="video play" href="#video" data-video-type="<?php echo($post_type); ?>" data-video-id="<?php echo($video_id); ?>">
                        <img src="<?php echo($post_image); ?>" />
                    </a>
                    <?php } elseif($post_image) { ?>
                    <a class="photo view" href="#photo" data-post-image="<?php echo($post_image); ?>">
                        <img src="<?php echo($post_image); ?>" />
                    </a>
                    <?php } ?>
                    
                    <?php if($post_type != 'quote') { ?>
                    <h2><?php echo($post['title']); ?></h2>
                    <p><?php echo($post['text']); ?></p>
                    <?php } else { ?>
                    <blockquote>
                        <h2><?php echo($post['text']); ?></h2>
                        <p>— <?php echo($post['title']); ?></p>
                    </blockquote>
                    <?php } ?>
                    
                    <?php if($post['link_title']) { ?>
                    <a class="link" href="<?php echo($post['link']); ?>" target="_blank"><?php echo($post['link_title']); ?></a>
                    <?php } ?>
                </div>
            </div>
        </article>
        <?php
    }
    echo $content;
    $content = ob_get_contents();
    ob_end_clean();
}