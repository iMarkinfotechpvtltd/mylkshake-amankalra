<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="container">
	

			<div class="page-error-404">
				<header>
					<h1>404</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>We're sorry, the page you have looked for does not exist in our content! <br>
Perhaps you would like to go to our <a class="home-link" href="<?php echo site_url(); ?>">homepage</a></p>

			
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

	



	</div><!-- .content-area -->

<?php get_footer(); ?>
