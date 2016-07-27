<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
global $post;
while ( have_posts() ) : the_post();
?>

<div class="article-banner art-in animated wow fadeInUp">
 <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'about' ); ?>
    <img src="<?php echo $src[0];?>" alt="ABOUT" />
  
   <div class="sneakers">  
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
			<?php the_content();?>
            
           <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'blog-inner' ); ?>
    <img src="<?php echo $src[0];?>" alt="ABOUT" />
            
           <?php the_content(); ?>
            <div class="credit-man">
              <p>By <strong><?php the_author(); ?> </strong></p>
              <p>Photographed by <?php the_field('photographed_by',$post->ID); ?>.</p>
            </div> <!--credit-man-->
            
           
   </div>
 </div> <!--article banner Close-->
 
 
 <div class="social-network animated wow fadeInUp">
  <div class="row">
   <div class="col-xs-12 col-md-7"> 
      <p><span>in</span> :  <?php $categories = get_the_category($post->ID);foreach( $categories as $category ) {?><?php  echo $category->slug;?>,<?php }?></p>
   
      <p><span>Tags</span> : <?php $tag = wp_get_post_tags($post->ID); foreach( $tag as $tag ) {?><?php  echo $tag->name;?>,<?php }?></p>
     </div>
     <div class="col-xs-12 col-md-5 text-right">
        <ul>
         <li><a href="https://plus.google.com/share?url=<?php the_permalink($post->ID);?>" target="_blank"><i aria-hidden="true" class="fa fa-google"></i></a></li>
              <li><a target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink($post->ID);?>&title=<?php the_title(); ?>" title="Share on Facebook" target="_blank"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
              <li><a target="_blank" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink($post->ID);?>" title="Share on Twitter" target="_blank"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
              <li><a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink($post->ID); ?>&description=<?php the_title(); ?>" title="Share on Pinterest" target="_blank"><i aria-hidden="true" class="fa fa-pinterest-p"></i></a></li>
        </ul>
     </div>
   </div>
 </div><!--social-network-->
 
 <div class="sneakers margin animated wow fadeInUp">
    <h3>you might also be interested in...</h3>
  <div class="row">
  <?php
		$category=get_the_category($post->ID);
		query_posts(array(
			'post_type'      => 'post', // You can add a custom post type if you like
			'posts_per_page' => 3,
			'tax_query' => array(
                   array(
                       'taxonomy' => 'category',
                       'field' => 'slug',
                       'terms' => array($category[0]->name),
                   )
               )  
			
		));
				if ( have_posts() ) : 
				// print_r($post);?>
				<?php while ( have_posts() ) : the_post(); ?>
     <div class="col-xs-12 col-md-4">
         <div class="interst-block">
            <div class="img-box">
               <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'blog-small' ); ?>
			 <a href="<?php the_permalink();?>" class="link-m"><img src="<?php echo $src[0];?>" alt="ABOUT" /></a>
            </div>
           	<div class="cont-box">
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
              
              <a href="<?php the_permalink();?>"><h4><?php the_title(); ?></h4></a>
              <p><?php the_time('d M Y');?> by <span><?php the_author(); ?></span></p>    
            </div> 
         </div>    
     </div>  <!--col-xs-12-->
     <?php endwhile; ?>
	 <?php endif; 
					wp_reset_query();
					?>


  </div> <!--row-->  
 </div> <!--sneakers margin-->
  
  
  <?php 
 if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
 ?>
 <?php endwhile; ?>
<?php get_footer(); ?>
