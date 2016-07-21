<?php
/*
  Template Name: Blog About
 */
 ?>
 <?php  get_header(); ?>
 <div class="article-banner art-in animated wow fadeInUp">
 <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'about' ); ?>
    <img src="<?php echo $src[0];?>" alt="ABOUT" />
  
   <div class="sneakers">  
  <!--   <ul>
       <li>sneakers</li>
       <li>design</li>
       <li>fashion</li>
     </ul>-->
     <?php 
		while ( have_posts() ) : the_post(); 
			echo content('200');
		endwhile; wp_reset_query(); ?>
   </div>
 </div> <!--article banner Close-->
 
 <div class="container-fluid text-center">
   <a class="btn btn-default btn-what-new">Follows Us?</a>
   
  <div class="social-block">
    <div class="col-xs-12 col-md-4">
       <div class="block-media">
	   <?php 						
		$image_id=get_post_meta(12,"facebook_image",true);	
		$thumb = wp_get_attachment_image_src($image_id, 'social' );
		if($thumb==""){ 
	?>
			<img src="http://i.imgur.com/rShAkDn.png">
	<?php 
		}else{
	?>	
        <img src="<?php echo $thumb['0'];?>" alt="TV" />        

		 <?php } ?>
          <a class="btn btn-default btn-social" href="<?php the_field('facebook_link',12); ?>">Facebook</a>
       </div> <!--block-mediaclose-->
    </div> <!--col-xs-12 col-md-4 Close-->  
    
     <div class="col-xs-12 col-md-4">
       <div class="block-media">
        <?php 						
		$image_id=get_post_meta(12,"pinterest_image",true);	
		$thumb = wp_get_attachment_image_src($image_id, 'social' );
		if($thumb==""){ 
	?>
			<img src="http://i.imgur.com/rShAkDn.png">
	<?php 
		}else{
	?>	
        <img src="<?php echo $thumb['0'];?>" alt="TV" />        

		 <?php } ?>
          <a class="btn btn-default btn-social" href="<?php the_field('pinterest_link',12); ?>">PINTEREST</a>
       </div> <!--block-mediaclose-->
    </div> <!--col-xs-12 col-md-4 Close-->  
    
     <div class="col-xs-12 col-md-4">
       <div class="block-media">
         <?php 						
		$image_id=get_post_meta(12,"instagram_image",true);	
		$thumb = wp_get_attachment_image_src($image_id, 'social' );
		if($thumb==""){ 
	?>
			<img src="http://i.imgur.com/rShAkDn.png">
	<?php 
		}else{
	?>	
        <img src="<?php echo $thumb['0'];?>" alt="TV" />        

		 <?php } ?>
          <a class="btn btn-default btn-social" href="<?php the_field('instagram_link',12); ?>">INSTAGRAM</a>
       </div> <!--block-mediaclose-->
    </div> <!--col-xs-12 col-md-4 Close-->  
      
  </div> <!--social-block-->
  
 </div>

 
  

 
<div class="latest-videosection animated wow fadeInUp"> 
  <div class="row">
    <div class="col-xs-12 col-md-8">
       <?php 						
		$image_id=get_post_meta(12,"mylkshake_tv_left_image",true);	
		$thumb = wp_get_attachment_image_src($image_id, 'tv' );
		if($thumb==""){ 
	?>
			<img src="http://i.imgur.com/rShAkDn.png">
	<?php 
		}else{
	?>	
    <div class="col-xs-12 col-md-8">
        <img src="<?php echo $thumb['0'];?>" alt="TV" />        
    </div>
		<?php } ?>       
    </div>
    <div class="col-xs-12 col-md-4 text-center">
      <?php 						
		$image_id=get_post_meta(12,"mylkshake_tv_right_image",true);	
		$thumb = wp_get_attachment_image_src($image_id, 'tv' );
		if($thumb==""){ 
	?>
			<img src="http://i.imgur.com/rShAkDn.png">
	<?php 
		}else{
	?>	
    <div class="col-xs-12 col-md-8">
        <img src="<?php echo $thumb['0'];?>" alt="TV" />        
    </div>
		<?php } ?>
     <?php the_field('mylkshake_tv_content',12);?>

     <a class="btn btn-default btn-watch-live" href="<?php echo get_permalink(16);?>">go to mylkshake tv</a>
    </div> <!--col-md-4-->
  </div> <!--row-->
   
</div> <!--latest-video-section-->
  <?php get_footer(); ?>