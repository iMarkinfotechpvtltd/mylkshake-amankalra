<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<?php wp_head(); ?>
<!-- Bootstrap -->
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/fav.png" type="image/x-icon">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animate.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/carousel-style.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
jQuery(document).ready(function()
{
	jQuery('<div class="mob-menu-logo"><a href="<?php echo site_url(); ?>" class="bar-logo"><img alt="LOGO" src="<?php echo site_url(); ?>/wp-content/uploads/2016/06/TEMPORARY-LOGO-BLACK.png"></a></div>').insertBefore('#responsive-menu');
	
	
	jQuery('<div class="mobile-top-navi"><ul><li><a href="<?php echo site_url(); ?>">Magazine</a></li><li><a href="<?php echo site_url(); ?>/blog-tv">TV</a></li><li><a href="#">Studio</a></li><li><a href="#">Shop</a></li></ul></div>').insertAfter('#responsive-menu');
	
	jQuery('<div class="col-md-3 social-logo"><h4>Follow US</h4><ul><li><a href="<?php echo get_option_tree('facebook');?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><li><a href="<?php echo get_option_tree('pinterest');?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li><li><a href="<?php echo get_option_tree('behance');?>" target="_blank"><i aria-hidden="true" class="fa fa-behance"></i></a></li> <li><a href="<?php echo get_option_tree('twitter');?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><li><a href="<?php echo get_option_tree('vimeo');?>" target="_blank"><i aria-hidden="true" class="fa fa-vimeo"></i></a></li></ul></div>').insertAfter('.mobile-top-navi'); 
	
jQuery("#responsive-menu-wrapper").find('.mobile-top-navi, .social-logo').wrapAll('<div class="mobile-menu-footer">');	
	
	
	/*jQuery('<div class="col-md-3 social-logo"><ul><li><a href="https://en-gb.facebook.com/login/" target="_blank"><i aria-hidden="true" class="fa fa-facebook"></i></a></li><li><a href="https://in.pinterest.com/login/" target="_blank"><i aria-hidden="true" class="fa fa-pinterest-p"></i></a></li><li><a href="https://www.behance.net/gallery/10145215/Login-Page" target="_blank"><i aria-hidden="true" class="fa fa-behance"></i></a></li><li><a href="https://twitter.com/login" target="_blank"><i aria-hidden="true" class="fa fa-twitter"></i></a></li> <li><a href="https://vimeo.com/log_in" target="_blank"><i aria-hidden="true" class="fa fa-vimeo"></i></a></li></ul></div>').insertAfter('.mobile-top-navi');*/
	
}); 
</script>
</head>

<body>
<div class="top-bar animated wow fadeInDown">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1 text-center"> <a class="bar-logo" href="<?php echo site_url(); ?>">
	  <img src="<?php echo get_option_tree('header_logo');?>" alt="LOGO" />
	  </a> </div>
      <div class="col-md-8 top-menu-bar">
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
      <!--top-menu-bar close-->
      
      <div class="col-md-3 social-logo">
        <ul>
          <li><a target="_blank" href="<?php echo get_option_tree('facebook');?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a target="_blank" href="<?php echo get_option_tree('pinterest');?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            <li><a target="_blank" href="<?php echo get_option_tree('behance');?>"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
            <li><a target="_blank" href="<?php echo get_option_tree('twitter');?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a target="_blank" href="<?php echo get_option_tree('vimeo');?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      <!--social-logo--> 
    </div>
    <!--row Close--> 
  </div>
  <!--container-fluid--> 
</div>
<!--top-bar close-->

<div class="top-middle tv-logo animated wow fadeInUp"> 
  <a class="logo" href="<?php echo site_url();?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logBLOG-TV.png" alt="Mylkshake" /></a> 
  
   
         <div class="search-box mlyshaketv">
				    	<i class="fa fa-search fa-rotate-90" aria-hidden="true"></i>
           
         </div> <!--search-box-->  
</div>
<!--top-middle-->

<div class="search-box-full">
    <div class="close-button"></div>
      <form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    
                        <input type="text" class="form-control" placeholder="Enter Keyword" name="s" id="s" value="<?php echo get_search_query(); ?>">
                           <p>Press Enter / Return to Search</p>
                        <input type="submit" class="btn btn-default" value="Search">
                    </form>
</div>

<!--whole=page wrap--->

<div class="main-content">