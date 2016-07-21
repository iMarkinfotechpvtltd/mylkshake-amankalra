<?php
include('../../../../wp-config.php');
?>
<?php 
global $post;
global $withcomments; $withcomments = true;
$id=$_POST['id'];
?>
<?php 
$my_postid = $id;
$content_post = get_post($my_postid);

			?>
<div class="sneakers animated wow fadeInDown">
  <ul>
 	 <?php
$categories = get_the_category($id);
foreach( $categories as $category ) {
?>
<li><?php  echo $category->slug;?></li>
<?php    
}

?>
  </ul>
  <h2><?php echo $content_post->post_title; ?></h2>
  <p class="time-date"><?php echo get_the_time('d M Y', $id); ?></p>
  <p><?php echo $content_post->post_content; ?></p>
  <div class="credit-man">
    <p>By <strong><?php $user=$content_post->post_author; echo $user_nickname = get_the_author_meta('nickname',$user);?></strong></p>
    <p>Photographed by <?php the_field('photographed_by',$id); ?>.</p>
  </div>
  <!--credit-man--> 
  
</div>
<div class="social-network  wow fadeInUp animated">
  <div class="row">
    <div class="col-xs-12 col-md-7">
      <p><span>in</span> :  <?php $categories = get_the_category($id);foreach( $categories as $category ) {?><?php  echo $category->slug;?>,<?php }?></p>
      <p><span>Tags</span> : <?php $tag = wp_get_post_tags($id); foreach( $tag as $tag ) {?><?php  echo $tag->name;?>,<?php }?></p>
    </div>
    <div class="col-xs-12 col-md-5 text-right">
      <ul>
        <li><a href="https://plus.google.com/share?url=https://simplesharebuttons.com" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
          <li><a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
</div>
<div class="blog-posting animated wow fadeInUp">
     <div class="blog-headding">
       <p><?php echo $comments_number = get_comments_number($id);?> commentaires</p>
       <h1>Join The Conversation!</h1> 
       
       <div class="commment-art">
          <p>write a <br>
             comment</p>       
       </div> <!--blog-editor-->
     </div> <!--blog-headding Vlose-->
	<div class="blog-wrap">
   <div class="bloging">

 <ul>
    <?php    
        //Gather comments for a specific page/post 
        $comments = get_comments(array(
            'post_id' => $id,
            'status' => 'approve' //Change this to the type of comments to be displayed
        ));

        //Display the list of comments
        wp_list_comments(array(
            'per_page' => 10, //Allow comment pagination
            'reverse_top_level' => false //Show the latest comments at the top of the list
        ), $comments);

    ?>
</ul>

    
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

	<?php
		comment_form( $args,$id );
		
	?>


