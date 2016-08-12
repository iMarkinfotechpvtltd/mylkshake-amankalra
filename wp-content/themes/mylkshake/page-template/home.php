 <?php
/*
 Template Name: Home Template
 */
?>
 <?php get_header(); ?>
 <div class="article-banner animated wow fadeInUp">
 <?php 
			$args = array('post_type' => 'post','posts_per_page'=>1,'meta_key' => '_is_ns_featured_post', 'meta_value' => 'yes');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<?php 
			if ( has_post_thumbnail() ) { ?>
			<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'home' ); ?>
                       <a href="<?php the_permalink();?>" class="link-m">  <img src="<?php echo $src[0];?>" alt="IMAGE"></a>
			<?php 
			}
			else {
				?>
				 <a href="<?php the_permalink();?>" class="link-m"><img src="http://i.imgur.com/8mmUmxM.jpg"></a>
				<?php 
			}
			?>
   <div class="sneakers text-left">  
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
     <a href="<?php the_permalink();?>"><h2><?php the_title(); ?></h2></a>
       <p class="time-date"><?php the_time('d M Y');?></p>
     <?php echo content('50'); ?>
            
            <a class="btn btn-default btn-red-more" href="<?php the_permalink(); ?>">Read more</a>  
   </div>
 </div> <!--article banner Close-->
 <?php endwhile;
			wp_reset_query();?>
<div class="whats-new-section">
  <div class="container-fluid" id="blog-ajax">
  <div class="btn btn-default btn-what-new">What's New?</div>
    <div class="article-section"> 
		 <?php 
		 $i=0;
			$args = array('post_type' => 'post','posts_per_page'=>9,'order' => 'DESC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
				if($i==4){
			?>
			 <?php
                                   function get_numerics ($str)
                       {
                       preg_match_all('/\d+/', $str, $matches);
                       return $matches[0];
                       }
					   while ( have_posts() ) : the_post();
					     $one1 = get_the_content(); ?>
                               <?php
                                           $arr1=get_numerics($one1);
                                            $small_image_url1 = wp_get_attachment_image_src($arr1[0], 'insta');
                                           ?>
                                   


			<div class="col-xs-6 col-lg-4 animated wow fadeInUp">
        <div class="insta-block">
           <div class="advert-box">
           <a href="<?php the_field('url',$arr1[0]);?>" class="link-m">  <img src="<?php echo $small_image_url1[0]; ?>" alt="image"/>  </a> 
            </div> <!--img-box-->    
        </div> <!--article-block-->
      </div> <!--col-md-4--> 
	  
			   <?php endwhile; 
			   wp_reset_query(); ?>
			<?php 
			
				}else{ 
					 $meta = get_post_meta( $post->ID,'_is_ns_featured_post',true );
				
					
					 if ( $meta=="" ){

					
			?>
      <div class="col-xs-6 col-lg-4 animated wow fadeInUp">
        <div class="article-block">
           <div class="top-heading">   
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
            <a href="<?php the_permalink();?>"><h3><?php if (strlen($post->post_title) > 20) {
echo substr(the_title($before = '', $after = '', FALSE), 0, 20) . '...'; } else {
the_title();
} ?></h3></a>   
         
           <div class="poted-date"><?php the_time('d M Y');?></div>  
          </div> <!--top-heading Close-->
         <div class="img-box">
          <?php 
			if ( has_post_thumbnail() ) { ?>
			<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'blog' ); ?>
                       <a href="<?php the_permalink();?>" class="link-m">  <img src="<?php echo $src[0];?>" alt="IMAGE"></a>
			<?php 
			}
			else {
				?>
				 <a href="<?php the_permalink();?>" class="link-m"><img src="http://i.imgur.com/rShAkDn.png"></a>
				<?php 
			}
			?>        
         </div> <!--img-box-->
         
         <div class="article-contnet-box">
      <?php echo content('30'); ?>   
           <a class="btn btn-default btn-more" href="<?php the_permalink();?>">Read more</a>
          
         </div> <!--article-contnet-box Close-->  
       
        </div> <!--article-block-->
      </div> <!--col-md-4--> 
	   <?php
				}
				}
				$i++;
	   endwhile;
			wp_reset_query();?>
	  
  
    </div> <!--article-section Close-->
	<?php if($i>=8){ ?>
   <input type="hidden" name="page" class="pagination" value="1">
       <a class="btn btn-default btn-load-more blog-see-more" href="javascript:void(0);" id="see">load more articles...</a>
	<?php } ?>
	 <div id="loading" style="display: none"  align="center"> 
               <img src="http://i.imgur.com/fAj1wi5.gif" id="loading_image">
                                   </div>
            </div> 
  </div> <!--containe-fluid-->
</div> <!--whats-new-section--> 

<div class="latest-videosection animated wow fadeInUp"> 
  <div class="row">
  <?php 						
		$image_id=get_post_meta(8,"mylkshake_tv_left_image",true);	
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
	<?php 						
		$image_id=get_post_meta(8,"mylkshake_tv_right_image",true);	
		$thumb = wp_get_attachment_image_src($image_id, 'tv-text' ); 
	?>
    <div class="col-xs-12 col-md-4 text-center">
      <img src="<?php echo $thumb['0'];?>" alt="TEXT" />
		<?php the_field('mylkshake_tv_content',8);?>

     <a class="btn btn-default btn-watch-live" href="<?php echo get_permalink(16);?>">go to mylkshake tv</a>
    </div> <!--col-md-4-->
  </div> <!--row-->
   
</div> <!--latest-video-section-->

<script>

jQuery(document).ready(function(){

	jQuery(".blog-see-more").each(function(){

		jQuery(this).click(function(){

			var class_section = jQuery(this).siblings(".pagination").val();
			var name = jQuery(".container-fluid").attr("id");
			var page_value=parseInt(class_section)+1;
			jQuery("#loading").show();
			// alert(class_section);
			//alert(page_value);
			// alert(name);
			jQuery.ajax({

			type: "POST",

			url:"<?php bloginfo('template_url'); ?>/ajax/pagination.php",

			data:{page_value:page_value},

			success:function(resp) 

			{
				jQuery("#loading").hide();
					// alert(resp);
					if(resp!="")
					{
						
						// jQuery('.result').empty().html(resp);
						jQuery(resp).insertAfter(".article-section>.col-xs-6:last").fadeIn('slow');
						jQuery(".pagination").val(page_value);

					}
					else if(resp=="")
					{
						jQuery(".blog-see-more").hide();
					}
			} 

			});

		});

	});

});

</script>
<?php get_footer();?>
