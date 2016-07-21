<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="blog-posting animated wow fadeInUp">
     <div class="blog-headding">
       <p><?php echo $comments_number = get_comments_number();?> commentaires</p>
       <h1>Join The Conversation!</h1> 
       
       <div class="commment-art">
          <p>write a <br>
             comment</p>       
       </div> <!--blog-editor-->
     </div> <!--blog-headding Vlose-->
	<div class="blog-wrap">
   <div class="bloging">
    <?php if ( have_comments() ) : ?>
		<ul>
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ul><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>
    
   </div> <!--bloging-->
  </div> <!--blog-wrap-->  
	

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentysixteen' ); ?></p>
	<?php endif; ?>
	 
   
	
	<?php $args = array(
	'fields' => apply_filters(
		'comment_form_default_fields', array(
			'author' =>' <div class="col-xs-12 col-md-6"><span>Name*</span>' . '<input id="author" class="form-control" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
				'</div>'
				,
			'email'  => '<div class="col-xs-12 col-md-6"><span>E-mail*<small>(You address stays secret with us)</small></span>' . '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' />'  .'</div>',
				
			'url'    => '<div class="col-xs-12 col-md-6"><span>website</span>' .
			 '<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
	           '</div>'
		)
	),
	'comment_field' => '<div class="col-xs-12"><span>Comment*</span>' .
		'<textarea id="comment" class="form-control" name="comment"  cols="45" rows="8" aria-required="true"></textarea>' .
		'</div> ',
    'title_reply' => '',
	'label_submit' => __( 'SAVE' ),
);

?>
<!--row-->
<!--comments-form-->
	<?php
		comment_form( $args );
		
	?>

</div><!-- .comments-area -->
