<?php
include('../../../../wp-config.php');
?>
<?php
$count=6;
$cat=$_POST['name'];
$offSet=$_POST['page_value'];
$offSet = ( $offSet - 1 ) * $count; 

		$category_query_args = array(
			'cat' => $cat,
			'posts_per_page'=>6,
			'post_type' => 'post',
			'showposts'=>$count,
			'offset'=>$offSet
				);

$category_query = new WP_Query( $category_query_args );
if($category_query->have_posts()):
?> 
<?php
		while ( $category_query->have_posts() ) : $category_query->the_post();
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
     <?php echo content('20'); ?>        
           <a class="btn btn-default btn-more" href="<?php the_permalink(); ?>">Read more</a>
          
         </div> <!--article-contnet-box Close-->  
       
        </div> <!--article-block-->
      </div> <!--col-md-4--> 
	  <?php
		endwhile;
		wp_reset_query();
		?>
		<?php endif; ?>