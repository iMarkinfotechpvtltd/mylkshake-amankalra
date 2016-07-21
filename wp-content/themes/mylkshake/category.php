<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 

?>

<div class="whats-new-section">
  <div class="container-fluid">
     
     <div class="categeries-headding animated wow fadeInUp">
       <p>category</p>
      <h2><?php $slug=single_cat_title(); ?></h2>
       
     </div> <!--categeries-headding-->
     
    <div class="article-section">  
	
		<?php 
		$i=0;
		$cur_cat_id = get_cat_id( single_cat_title("",false) );
		$category_query_args = array(
			'cat' => $cur_cat_id,
			'posts_per_page'=>6
				);

$category_query = new WP_Query( $category_query_args );
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
	  $i++;
		endwhile;
		wp_reset_query();
		?>
 
       <?php if($i>=6){ ?>
    </div> <!--article-section Close-->
		<input type="hidden" name="cat" class="cat" value="<?php echo $cur_cat_id;?>">
		<input type="hidden" name="page" class="pagination" value="1">
		 <a class="blog-see-more btn btn-default btn-load-more" href="javascript:void(0);">load more articles...</a>
	   <?php } ?>
		 <div id="loading" style="display: none"  align="center"> 
               <img src="http://i.imgur.com/fAj1wi5.gif" id="loading_image">
                                   </div>
            </div> 
  </div> <!--containe-fluid-->
</div> <!--whats-new-section--> 


<script>

jQuery(document).ready(function(){

	jQuery(".blog-see-more").each(function(){

		jQuery(this).click(function(){

			var class_section = jQuery(".pagination").val();
			var name = jQuery(".cat").val();
			var page_value=parseInt(class_section)+1;
				jQuery("#loading").show();
			// alert(class_section);
			// alert(page_value);
			// alert(name);
			jQuery.ajax({

			type: "POST",

			url:"<?php bloginfo('template_url'); ?>/ajax/catinner.php",

			data:{
					page_value:page_value,
					name:name
				 },

			success:function(resp) 

			{
				jQuery("#loading").hide();
					// alert(abc);
					if(resp!="")
					{
						
						// jQuery('.result').empty().html(resp);
						jQuery(resp).insertAfter(".article-section>.col-xs-6:last").fadeIn('slow');
						jQuery(".pagination").val(page_value);

					}
					else{
						jQuery(".blog-see-more").hide();
					}
			} 

			});

		});

	});

});

</script>
<?php get_footer(); ?>
