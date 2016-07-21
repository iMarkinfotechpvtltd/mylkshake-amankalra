<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

</div>  <!--this div has been start from header file-->


<div class="mylkshake">
  <h2 class="animated wow fadeInUp">#mylkshake</h2>
   <p>See You On Instagram?</p>
 <div class="row-fluid animated wow fadeInUp">
 <?php echo do_shortcode('[instagram-feed]'); ?>

 </div>  <!--row-fluid-->
</div> <!--mylkshake Close-->

  <!--footer START-->
  
<div class="footer animated wow fadeInUp">
  <div class="row">
    <div class="col-md-4">
      <div class="footer-logo">
       <a href="<?php echo site_url(); ?>"><img src="<?php echo get_option_tree('footer_logo');?>" alt="LOGO" /></a>
      </div>
       <?php echo get_option_tree('footer_content');?>
    </div> <!--col-md-4-->
    <div class="col-md-5">
     <div class="footer-block">
       <h4>A propos</h4> 
        <ul> 
           <?php

		$defaults = array(
		'theme_location'  => '',
		'menu'            => 'Top_header',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '%3$s',
		'depth'           => 0,
		'walker'          => ''
		);

		wp_nav_menu( $defaults );

		?> 
        </ul>
      </div>
      <div class="footer-block">
       <h4>Social Links</h4> 
        <ul> 
          <li><a href="<?php echo get_option_tree('facebook');?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
          <li><a href="<?php echo get_option_tree('instagram');?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a></li>
          <li><a href="<?php echo get_option_tree('twitter');?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a></li>
          <li><a href="<?php echo get_option_tree('pinterest');?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i>Pinterest</a></li>
          <li><a href="<?php echo get_option_tree('you_tube');?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i>Youtube</a></li>
        </ul>
      </div>
    </div> <!--col-md-4-->
    <div class="col-md-3 newsletter">
       <h4>Newsletter</h4>
       <p>Soyez les premiers à connaitre les dernières tendances</p>
      <?php echo do_shortcode('[mc4wp_form id="113"]');?>
    </div> <!--col-md-4-->    
  </div> <!--row-->
  
  <div class="copy-right">
    <p>Crédits © <?php echo date('Y');?> Mylkshake . All rights reserved. Site by Mylkshake. <span class="branding">Developed By: <a target="_blank" href="http://www.imarkinfotech.com">iMark <span class="ib">I</span>nfotech</a></span></p>
  </div>
</div> <!--footer close-->

<?php wp_footer(); ?>

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/my-script.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script> 
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/wow.min.js"></script>


       <script type="text/javascript">
jQuery(function() {
  jQuery('a.animated').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

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



</body>
</html>
