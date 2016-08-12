<?php
/*
  Template Name: Blog-Tv
 */
 ?>
 <?php  get_header('blogtv'); ?>
 
 <div class="blogtv2 animated wow fadeInDown">
  <div class="tv-page-wrapper blog-video-tv">
    <div class="bottom-thumbs-wrap">
      <div class="thumbs-slider">
	  <?php
      $args = array( 'posts_per_page' => -1, 'order' => '', 'post_type' => 'post', 'post_status' => 'publish');
            
            $my_query = null;
            $my_query = new WP_Query($args);
            
        
            if( $my_query->have_posts() ) {
                while ($my_query->have_posts()) : $my_query->the_post(); 
                
                $link = get_field('video_link');

              if (strpos($link, 'youtube') > 0) 
              {
                 
                $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1])){ $video_id = explode("/v/", $link); }// For videos like http://www.youtube.com/watch/v/..

                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];
                //https://www.googleapis.com/youtube/v3/videos?id=7lCDEYXw3mM&key=YOUR_API_KEY&part=snippet,contentDetails,statistics,status
                $api = "https://www.googleapis.com/youtube/v3/videos?id=".$video_id."&key=AIzaSyDS3-2p4XKps18w9ulX6oVJACIUv-0xydY%20&part=snippet,contentDetails,statistics,status";
                $json_output = file_get_contents($api);
                $json = json_decode($json_output, true);

                $thumbnail;
                $items = $json['items'];
                foreach ($items as $val) {
					         $title = $val['snippet']['title'];
                  $thumbnail = $val['snippet']['thumbnails']['medium']['url'];
                  }
              }

              elseif (strpos($link, 'vimeo') > 0) {
              
                $video_id = explode(".com/", $link); // For videos like http://www.youtube.com/watch?v=...
                
                if (empty($video_id[1])){ $video_id = explode("/v/", $link); }// For videos like http://www.youtube.com/watch/v/..

                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];

                $api = "http://vimeo.com/api/v2/video/".$video_id.".json";
                $hash = json_decode(file_get_contents($api));

                //$hash = json_decode(file_get_contents("http://vimeo.com/api/v2/video/113057859.json"));
                $title = $hash[0]->title;
                $thumbnail = $hash[0]->thumbnail_large;
                   
              }
                ?>
        <div class="item">
          <div class="vd-thumb">
            <div class="playing-overlay">
			<div class="playing-overlay"><h4>Playing <span class="dots-pk">...</span></h4></div>
            </div>
            <img src="<?php echo $thumbnail; ?>" class="img"/>
            <div class="hover-overlay">
			<div class="post-<?php echo $post->ID;?>">
				<input type="hidden" name="id" class="p_id" value="<?php echo $post->ID;?>">
			<?php 
                  $category_detail = get_the_category(); 
  				        ?>
						
             <h3><span><?php echo $category_detail[0]->cat_name; ?></span> <?php echo $title; ?></h3>
				</div>
              
            </div>
          </div>
        </div>
       
      <?php
              endwhile;
              }
            wp_reset_query();  // Restore global post data stomped by the_post().
              ?> 
   
   
      </div>
    </div>
    <div id="page_content_wrapper">
      <div class="main-slider owl-carousel">
	  <?php

          $args = array( 'posts_per_page' => -1, 'order' => 'DESC', 'post_type' => 'post', 'post_status' => 'publish');
          
          $my_query = null;
          $my_query = new WP_Query($args);
          
          
          if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post(); 

              //$link = "http://www.youtube.com/watch?v=oHg5SJYRHA0&lololo";
              $link = get_field('video_link');

              if (strpos($link, 'youtube') > 0) 
              {
                  $you = "youtube";
                  
                $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1])){ $video_id = explode("/v/", $link); }// For videos like http://www.youtube.com/watch/v/..

                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];

              //https://www.googleapis.com/youtube/v3/videos?id=7lCDEYXw3mM&key=YOUR_API_KEY&part=snippet,contentDetails,statistics,status
            //$api = "https://www.googleapis.com/youtube/v3/videos?id=-LoUzw5Dyc4&key=AIzaSyDS3-2p4XKps18w9ulX6oVJACIUv-0xydY%20&part=snippet,contentDetails,statistics,status";
            $api = "https://www.googleapis.com/youtube/v3/videos?id=".$video_id."&key=AIzaSyDS3-2p4XKps18w9ulX6oVJACIUv-0xydY%20&part=snippet,contentDetails,statistics,status";
            $json_output = file_get_contents($api);
            $json = json_decode($json_output, true);

            $title;
            $description;
            $view_count;
            $duration;

            $items = $json['items'];
            foreach ($items as $val) {
              $title = $val['snippet']['title'];
              $description = $val['snippet']['description'];
              $view_count = $val['statistics']['viewCount'];
              $duration = $val['contentDetails']['duration'];
            }
            $str = $duration;
            $from1 = "PT";
            $to1 = "M";
            
              $sub1 = substr($str, strpos($str,$from1)+strlen($from1),strlen($str));
              $minute = substr($sub1,0,strpos($sub1,$to1));

              $from2 = "M";
              $to2 = "S";
            
              $sub2 = substr($str, strpos($str,$from2)+strlen($from2),strlen($str));
              $second = substr($sub2,0,strpos($sub2,$to2));
              }

            elseif (strpos($link, 'vimeo') > 0) {
                $you = "vimeo";
                $video_id = explode(".com/", $link); // For videos like http://www.youtube.com/watch?v=...
                
                if (empty($video_id[1])){ $video_id = explode("/v/", $link); }// For videos like http://www.youtube.com/watch/v/..

                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];

                $api = "http://vimeo.com/api/v2/video/".$video_id.".json";
                $hash = json_decode(file_get_contents($api));
                 $title = $hash[0]->title;
                    $description = str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash[0]->description);
                    //'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, $hash[0]->description),
                    //'thumbnail'         => $hash[0]->thumbnail_large,
                    //'video'             => "https://vimeo.com/" . $hash[0]->id,
                    //'embed_video'       => "https://player.vimeo.com/video/" . $hash[0]->id
                    $view_count = $hash[0]->stats_number_of_plays;
                    $duration = $hash[0]->duration;
                    $minute1 = $duration/60;
                    $minute = round($minute1);
                    $second = $duration%60;
            } 
                    ?>

        <div class="item-video" id="video_<?php echo $post->ID;?>"><a class="owl-video" href="<?php echo the_field('video_link'); ?>"></a> 
		</div>
         <?php
                endwhile;
            }
            wp_reset_query();  // Restore global post data stomped by the_post().
            ?> 
      </div>
    </div>
    <div id="social-share">
      <div class="botom-social">
	  <?php

          $args = array( 'posts_per_page' => -1, 'order' => 'DESC', 'post_type' => 'post', 'post_status' => 'publish');
          
          $my_query = null;
          $my_query = new WP_Query($args);
          
          
          if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post(); 

              //$link = "http://www.youtube.com/watch?v=oHg5SJYRHA0&lololo";
              $link = get_field('video_link');

              if (strpos($link, 'youtube') > 0) 
              {
                  $you = "youtube";
                  
                $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1])){ $video_id = explode("/v/", $link); }// For videos like http://www.youtube.com/watch/v/..

                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];

              //https://www.googleapis.com/youtube/v3/videos?id=7lCDEYXw3mM&key=YOUR_API_KEY&part=snippet,contentDetails,statistics,status
            //$api = "https://www.googleapis.com/youtube/v3/videos?id=-LoUzw5Dyc4&key=AIzaSyDS3-2p4XKps18w9ulX6oVJACIUv-0xydY%20&part=snippet,contentDetails,statistics,status";
            $api = "https://www.googleapis.com/youtube/v3/videos?id=".$video_id."&key=AIzaSyDS3-2p4XKps18w9ulX6oVJACIUv-0xydY%20&part=snippet,contentDetails,statistics,status";
            $json_output = file_get_contents($api);
            $json = json_decode($json_output, true);

            $title;
            $description;
            $view_count;
            $duration;

            $items = $json['items'];
            foreach ($items as $val) {
              $title = $val['snippet']['title'];
              $description = $val['snippet']['description'];
              $view_count = $val['statistics']['viewCount'];
              $duration = $val['contentDetails']['duration'];
            }
            $str = $duration;
            $from1 = "PT";
            $to1 = "M";
            
              $sub1 = substr($str, strpos($str,$from1)+strlen($from1),strlen($str));
              $minute = substr($sub1,0,strpos($sub1,$to1));

              $from2 = "M";
              $to2 = "S";
            
              $sub2 = substr($str, strpos($str,$from2)+strlen($from2),strlen($str));
              $second = substr($sub2,0,strpos($sub2,$to2));
              }

            elseif (strpos($link, 'vimeo') > 0) {
                $you = "vimeo";
                $video_id = explode(".com/", $link); // For videos like http://www.youtube.com/watch?v=...
                
                if (empty($video_id[1])){ $video_id = explode("/v/", $link); }// For videos like http://www.youtube.com/watch/v/..

                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];

                $api = "http://vimeo.com/api/v2/video/".$video_id.".json";
                $hash = json_decode(file_get_contents($api));
                 $title = $hash[0]->title;
                    $description = str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash[0]->description);
                    //'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, $hash[0]->description),
                    //'thumbnail'         => $hash[0]->thumbnail_large,
                    //'video'             => "https://vimeo.com/" . $hash[0]->id,
                    //'embed_video'       => "https://player.vimeo.com/video/" . $hash[0]->id
                    $view_count = $hash[0]->stats_number_of_plays;
                    $duration = $hash[0]->duration;
                    $minute1 = $duration/60;
                    $minute = round($minute1);
                    $second = $duration%60;
            } 
                    ?>
        <div class="owl-item">
          <div class="social-item">
            <ul>
			
              <li><a href="https://plus.google.com/share?url=<?php echo $link; ?>" target="_blank"><i aria-hidden="true" class="fa fa-google"></i></a></li>
              <li><a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $link; ?>&title=<?php echo $title; ?>" title="Share on Facebook"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
              <li><a target="_blank" href="http://twitter.com/home?status=<?php echo $title; ?>+<?php echo $link; ?>" title="Share on Twitter"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
              <li><a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $link; ?>&description=<?php echo $title; ?>" title="Share on Pinterest"><i aria-hidden="true" class="fa fa-pinterest-p"></i></a></li>
            </ul>
          </div>
          <div class="leave-comment">
            <ul>
              <li>comments (<?php $comments_count = wp_count_comments($post->ID); echo $comments_count->approved; ?>) -</li>
              <li><a href="#respond" class="animated">leave a comment</a></li>
            </ul>
          </div>
        </div>
        
		 <?php
                endwhile;
            }
            wp_reset_query();  // Restore global post data stomped by the_post().
            ?> 
      </div>
    </div>
  </div>
  <!--video-carousel-close--> 
</div>
<!--blogtv2 Close-->
<div class="ajax">
<?php 
$args = array( 'posts_per_page' => 1, 'order' => 'DESC', 'post_type' => 'post', 'post_status' => 'publish');

          $my_query = new WP_Query($args);

            while ($my_query->have_posts()) : $my_query->the_post(); 
			?>
<div class="sneakers animated wow fadeInDown">
  <ul>
 	 <?php
$categories = get_the_category($post->ID);
foreach( $categories as $category ) {
?>
<li><?php  echo $category->slug;?></li>
<?php    
}

?>
  </ul>
  <h2><?php the_title(); ?></h2>
  <p class="time-date"><?php the_time('d M Y');?></p>
  <?php echo content('100'); ?>
  <div class="credit-man">
    <p>By <strong><?php the_author(); ?></strong></p>
    <p>Photographed by <?php the_field('photographed_by',$post->ID); ?>.</p>
  </div>
  <!--credit-man--> 
  
</div>
<div class="social-network  wow fadeInUp animated">
  <div class="row">
    <div class="col-xs-12 col-md-7">
      <p><span>in</span> :  <?php $categories = get_the_category($post->ID);foreach( $categories as $category ) {?><?php  echo $category->slug;?>,<?php }?></p>
      <p><span>Tags</span> : <?php $tag = wp_get_post_tags($post->ID); foreach( $tag as $tag ) {?><?php  echo $tag->name;?>,<?php }?></p>
    </div>
    <div class="col-xs-12 col-md-5 text-right">
      <ul>
        <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank"><i aria-hidden="true" class="fa fa-google"></i></a></li>
              <li><a target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" title="Share on Facebook"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
              <li><a target="_blank" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" title="Share on Twitter" ><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
              <li><a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>" title="Share on Pinterest" ><i aria-hidden="true" class="fa fa-pinterest-p"></i></a></li>
      </ul>
    </div>
  </div>
</div>

  <?php 
 if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
 ?>
<?php 
endwhile;
wp_reset_query(); ?>
</div>

<div class="sneakers margin  wow fadeInUp">
  <h3>you might also be interested in...</h3>
  <div class="row">
   <div class="new-carousel">
    <?php

          $args = array( 'posts_per_page' => -1, 'order' => 'DESC', 'post_type' => 'post', 'post_status' => 'publish');
          
          $my_query = null;
          $my_query = new WP_Query($args);
          
          
          if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post(); 

              //$link = "http://www.youtube.com/watch?v=oHg5SJYRHA0&lololo";
              $link = get_field('video_link');

              if (strpos($link, 'youtube') > 0) 
              {
                  $you = "youtube";
                  
                $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1])){ $video_id = explode("/v/", $link); }// For videos like http://www.youtube.com/watch/v/..

                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];

              //https://www.googleapis.com/youtube/v3/videos?id=7lCDEYXw3mM&key=YOUR_API_KEY&part=snippet,contentDetails,statistics,status
            //$api = "https://www.googleapis.com/youtube/v3/videos?id=-LoUzw5Dyc4&key=AIzaSyDS3-2p4XKps18w9ulX6oVJACIUv-0xydY%20&part=snippet,contentDetails,statistics,status";
            $api = "https://www.googleapis.com/youtube/v3/videos?id=".$video_id."&key=AIzaSyDS3-2p4XKps18w9ulX6oVJACIUv-0xydY%20&part=snippet,contentDetails,statistics,status";
            $json_output = file_get_contents($api);
            $json = json_decode($json_output, true);

            $title;
            $description;
            $view_count;
            $duration;

            $items = $json['items'];
            foreach ($items as $val) {
              $title = $val['snippet']['title'];
              $description = $val['snippet']['description'];
              $view_count = $val['statistics']['viewCount'];
              $duration = $val['contentDetails']['duration'];
            }
            $str = $duration;
            $from1 = "PT";
            $to1 = "M";
            
              $sub1 = substr($str, strpos($str,$from1)+strlen($from1),strlen($str));
              $minute = substr($sub1,0,strpos($sub1,$to1));

              $from2 = "M";
              $to2 = "S";
            
              $sub2 = substr($str, strpos($str,$from2)+strlen($from2),strlen($str));
              $second = substr($sub2,0,strpos($sub2,$to2));
              }

            elseif (strpos($link, 'vimeo') > 0) {
                $you = "vimeo";
                $video_id = explode(".com/", $link); // For videos like http://www.youtube.com/watch?v=...
                
                if (empty($video_id[1])){ $video_id = explode("/v/", $link); }// For videos like http://www.youtube.com/watch/v/..

                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];

                $api = "http://vimeo.com/api/v2/video/".$video_id.".json";
                $hash = json_decode(file_get_contents($api));
                 $title = $hash[0]->title;
                    $description = str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash[0]->description);
                    //'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, $hash[0]->description),
                    //'thumbnail'         => $hash[0]->thumbnail_large,
                    //'video'             => "https://vimeo.com/" . $hash[0]->id,
                    //'embed_video'       => "https://player.vimeo.com/video/" . $hash[0]->id
                    $view_count = $hash[0]->stats_number_of_plays;
                    $duration = $hash[0]->duration;
                    $minute1 = $duration/60;
                    $minute = round($minute1);
                    $second = $duration%60;
            } 
                    ?>
                    
                    
                
    <div class="col-xs-12">
      <div class="interst-block">
        <div class="img-box"><a class="owl-video" href="<?php echo the_field('video_link'); ?>"></a>
             <!--<a href="play-button"><i aria-hidden="true" class="fa fa-play-circle"></i></a>-->
          </div>
        <div class="cont-box">
          <ul>
            <?php
				$categories = get_the_category($my_query->ID);
				foreach( $categories as $category ) {
				?>
				<li><?php  echo $category->slug;?></li>
				<?php    
				}

				?>
          </ul>
          <h4><?php the_title(); ?></h4>
          <p><?php the_time('d M Y');?> by <span><?php the_author(); ?></span></p>
        </div>
      </div>
    </div>
    <!--col-xs-12-->
    <?php
                endwhile;
            }
            wp_reset_query();  // Restore global post data stomped by the_post().
  ?>
  </div>
  </div>
  <!--row--> 
</div>


<!--<div class="container-fluid text-center"> <div class="btn btn-default btn-what-new">Follows Us?</div>
  <div class="social-block">
    <div class="col-xs-12 col-md-4">
      <div class="block-media">
	  <?php 						
		// $image_id=get_post_meta(16,"facebook_image",true);	
		// $thumb = wp_get_attachment_image_src($image_id, 'social' );
		// if($thumb==""){ 
	?>
			<img src="http://i.imgur.com/rShAkDn.png">
	<?php 
		// }else{
	?>	
     <img src="<?php //echo $thumb['0'];?>" alt="Facebook" /> 
		<?php //} ?>
	 
	  <a class="btn btn-default btn-social" href="<?php //the_field("facebook_link",16); ?>"><?php //the_field("facebbok_text",16); ?></a>
	  </div>

    </div>
    
    <div class="col-xs-12 col-md-4">
      <div class="block-media"> 
	  <?php 						
		// $image_id=get_post_meta(16,"pinterest_image",true);	
		// $thumb = wp_get_attachment_image_src($image_id, 'social' );
		// if($thumb==""){ 
	?>
			<img src="http://i.imgur.com/rShAkDn.png">
	<?php 
		//}else{
	?>	
     <img src="<?php// echo $thumb['0'];?>" alt="Pinterest" /> 
		<?php// } ?> 
	  <a class="btn btn-default btn-social" href="<?php //the_field("pinterest_link",16); ?>"><?php //the_field("pinterest_text",16); ?></a> 
	  </div>

    </div>

    
    <div class="col-xs-12 col-md-4">
      <div class="block-media"> 
	  <?php 						
		// $image_id=get_post_meta(16,"instagram_image",true);	
		// $thumb = wp_get_attachment_image_src($image_id, 'social' );
		// if($thumb==""){ 
	?>
			<img src="http://i.imgur.com/rShAkDn.png">
	<?php 
		// }else{
	?>	
     <img src="<?php //echo $thumb['0'];?>" alt="Instagram" /> 
		<?php //} ?> 
	  <a class="btn btn-default btn-social" href="<?php //the_field("instagram_link",16); ?>"><?php //the_field("instagram_text",16); ?></a> 
	  </div>
    </div>

    
  </div> 
  
</div>-->
<script>
 jQuery(document).ready(function(){

jQuery(".hover-overlay>div").each(function(){

		jQuery(this).click(function(){
			
			var id = jQuery(this).attr("class");
			var arr = id.split('-');
			var id = arr[1];
			jQuery.ajax({

			type: "POST",

			url:"<?php bloginfo('template_url'); ?>/ajax/tv.php",

			data:{
					id:id
				 },

			success:function(resp) 

			{
				// jQuery("#loading").hide();
					// alert(resp);
					if(resp!="")
					{
						
						jQuery('.ajax').empty().html(resp);
						// jQuery(resp).insertAfter(".article-section:last").fadeIn('slow');
						// jQuery(".pagination").val(page_value);

					}
					// else{
						// jQuery(".blog-see-more").hide();
					// }
			} 

			});

		 });
});


});
/****************************Section_Arrow********************************/
 jQuery(document).ready(function(){
setTimeout(function(){
	jQuery(".fa-angle-right:last").click(function(){
			var indexxx = jQuery(".owl-stage-outer:eq(1)>.owl-stage>.active");
			var index_fin = jQuery(".owl-stage-outer:eq(1)>.owl-stage>.owl-item").index( indexxx );
			// alert(index_fin);
			var id =jQuery(".owl-stage-outer:eq(1)>.owl-stage>.active").next(".owl-item").find(".item-video").attr("id");
			var arr = id.split('video_');
			var id = arr[1];
			jQuery.ajax({

			type: "POST",

			url:"<?php bloginfo('template_url'); ?>/ajax/tv.php",

			data:{
					id:id
				 },

			success:function(resp) 

			{
					if(resp!="")
					{
						jQuery('.ajax').empty().html(resp);
					}
			} 

			});

		 });
}, 3000);
		


});
 jQuery(document).ready(function(){
setTimeout(function(){
	jQuery(".fa-angle-left:last").click(function(){
			var indexxx = jQuery(".owl-stage-outer:eq(1)>.owl-stage>.active");
			var index_fin = jQuery(".owl-stage-outer:eq(1)>.owl-stage>.owl-item").index( indexxx );
			// alert(index_fin);
			var id =jQuery(".owl-stage-outer:eq(1)>.owl-stage>.active").prev(".owl-item").find(".item-video").attr("id");
			var arr = id.split('video_');
			var id = arr[1];
			jQuery.ajax({

			type: "POST",

			url:"<?php bloginfo('template_url'); ?>/ajax/tv.php",

			data:{
					id:id
				 },

			success:function(resp) 

			{
					if(resp!="")
					{
						jQuery('.ajax').empty().html(resp);
					}
			} 

			});

		 });
}, 3000);
		


});
/****************************Section_Arrow********************************/
 </script>
 <script>
 jQuery(".disable-owl-swipe").on("touchstart mousedown", function(e) {
    // Prevent carousel swipe
    e.stopPropagation();
})
 </script>
 <script>
jQuery(document).ready(function(){
		jQuery(".submit").click(function(e){
			
			var name=jQuery("#author").val();
		var email= jQuery("#email").val();
		// var website= jQuery("#url").val();
		var comment=jQuery("#comment").val();
		if(name==""){
			jQuery("#author").addClass("error");
			e.preventDefault();
		}
		if(email==""){
			jQuery("#email").addClass("error");
			e.preventDefault();
		}
		// if(website==""){
			// jQuery("#url").addClass("error");
			// e.preventDefault();
		// }
		if(comment==""){
			jQuery("#comment").addClass("error");
			e.preventDefault();
		}
		});
});

</script>
<script>
jQuery(document).ready(function(){
jQuery(".fn>a").removeAttr("href");
jQuery(".comment-metadata>a").removeAttr("href");
jQuery(".comment-metadata>a>time").removeAttr("datetime");

});
</script>
  <?php get_footer(); ?>