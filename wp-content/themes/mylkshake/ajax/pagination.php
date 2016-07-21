<?php
include('../../../../wp-config.php');
?>
<?php
$i=0;
$count=9;

$offSet=$_POST['page_value'];
$offSet = ( $offSet - 1 ) * $count; 

$args = array ( 'post_type' => 'post','ORDER' => 'DESC','showposts'=>$count,'offset'=>$offSet  );
  $loop = new WP_Query( $args );
  if($loop->have_posts()):
  ?>
  <?php
  while ( $loop->have_posts() ) : $loop->the_post();
				if($i==4){
			?>
			 <?php
                                   function get_numerics ($str)
                       {
                       preg_match_all('/\d+/', $str, $matches);
                       return $matches[0];
                       }
						$my_query = new WP_Query('page_id=8');
						$j=1;
						while ($my_query->have_posts()) : $my_query->the_post();
					     $one1 = get_the_content(); ?>
                               <?php
                                           $arr1=get_numerics($one1);
                                            $small_image_url1 = wp_get_attachment_image_src($arr1[$j], 'insta');
                                           ?>
			<div class="col-xs-6 col-lg-4 animated wow fadeInUp">
        <div class="insta-block">
           <div class="advert-box">
            <img src="<?php echo $small_image_url1[0]; ?>" alt="image"/>    
            </div> <!--img-box-->
          <div class="border-block"> 
            <a href="<?php the_field('url',$arr1[$j]);?>"><?php the_field('text',$arr1[$j]);?></a> 
          </div>       
        </div> <!--article-block-->
      </div> <!--col-md-4--> 
			   <?php 
			   $j++;
			   endwhile; 
			   wp_reset_query(); ?>
			<?php 
			
				} else{
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
            <h3><?php the_title(); ?></h3>   
         
           <div class="poted-date"><?php the_time('d M Y');?></div>  
          </div> <!--top-heading Close-->
         <div class="img-box">
          <?php 
			if ( has_post_thumbnail() ) { ?>
			<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'blog' ); ?>
                        <img src="<?php echo $src[0];?>" alt="IMAGE">
			<?php 
			}
			else {
				?>
				<img src="http://i.imgur.com/rShAkDn.png">
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
		<?php endif; ?>