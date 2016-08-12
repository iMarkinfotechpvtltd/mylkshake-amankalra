// JavaScript Document

jQuery(document).ready(function(){
	jQuery('.search-box i').click(function(){
		jQuery('.search-box-full').addClass('expand');
		jQuery('body').addClass('fixed-wrap');
		jQuery('.search-form .form-control').focus();
		
	 });
	jQuery(".close-button, .search-box-full").click(function(){
      jQuery('.search-box-full').removeClass('expand');
	  jQuery('body').removeClass('fixed-wrap');

     });
	 
	jQuery( ".search-form" ).click(function( event ) {
       event.stopPropagation();
  // Do something
     }); 
	 
	 
	 
	  var $big = jQuery(".main-slider"),
	    $bottom = jQuery(".botom-social"),
        $thumb = jQuery(".thumbs-slider"),
        flag = false;
	//slider Main video
    $big.owlCarousel({
        items: 1,
        margin: 0,
		nav: true,
		touchDrag: false,
       mouseDrag: false,
		navText:["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
        dots: false
    }).on('changed.owl.carousel', function(e) {
        if (!flag) {//
           flag = true;
           // $thumb.trigger('to.owl.carousel', [e.item.index, 300, true]);
          $bottom.trigger('to.owl.carousel', [e.item.index, 300, true]);
           flag = false;
       }
    });
	

	//slider thumbnails
    $bottom.owlCarousel({
        margin:0,
        items: 1,
        nav:false,
		touchDrag: false,
        mouseDrag: false, 
        dots: false,
		responsive : {
	1400 : {
        items: 1
    }
}});

	//slider thumbnails
    $thumb.owlCarousel({
        margin: 26,
        items: 7,
		touchDrag: false,
        mouseDrag: false,
        nav: true,
		navText:["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
        dots: false,
		responsive : {
    // breakpoint from 0 up
    0 : {
        items: 1
    },
    // breakpoint from 480 up
    480 : {
       items: 2
    },
    // breakpoint from 768 up
    768 : {
        items: 3
    },
	1000 : {
        items: 4
    },
	1200 : {
        items: 5
    },
	1400 : {
        items: 7
    }
}


   // }).on('click', '.owl-item', function() {
        //$big.trigger('to.owl.carousel', [jQuery(this).index(), 300, true]);
   // }).on('changed.owl.carousel', function(e) {//
      //  if (!flag) {
          //  flag = true;
           // $big.trigger('to.owl.carousel', [e.item.index, 300, true]);
           // flag = false;
      //  }
  });
  
  
  jQuery('.new-carousel').owlCarousel({
    loop:false,
    margin:0,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        480:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
});
  
/*****************************Sticky-nav*******************/  
  
  // var stickyNavTop = jQuery('.magazine-nav').offset().top;
 
// var stickyNav = function(){
// var scrollTop = jQuery(window).scrollTop();
      
// if (scrollTop > stickyNavTop) { 
   // jQuery('.magazine-nav').addClass('sticky');
   // jQuery('body').addClass('sticky_hdr');
// } else {
    // jQuery('.magazine-nav').removeClass('sticky'); 
	 // jQuery('body').removeClass('sticky_hdr');
// }
// };
 
// stickyNav();
 
// jQuery(window).scroll(function() {
    // stickyNav();
// });
  
	 
	 
	 
 });
 
 
 
 
  wow = new WOW(
                      {
                      boxClass:     'wow',      // default
                      animateClass: 'animated', // default
                      offset:       0,          // default
                      mobile:       false,       // default
                      live:         true        // default
                    }
                    )
                    wow.init();