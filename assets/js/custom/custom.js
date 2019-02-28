/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	

	/*
	*
	*	Responsive iFrames
	*
	------------------------------------*/
	var $all_oembed_videos = $("iframe[src*='youtube']");
	
	$all_oembed_videos.each(function() {
	
		$(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
 	
 	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

	$(document).on("click","#toggleMenu",function(){
		$(this).toggleClass('open');
		$('.mobile-navigation').toggleClass('open');
	});

	/*
	*
	*	Smooth Scroll to Anchor
	*
	------------------------------------*/
	$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000, function() {
	          // Callback after animation
	          // Must change focus!
	          var $target = $(target);
	          $target.focus();
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            $target.focus(); // Set focus again
	          };
	        });
	      }
	    }
	});

	var scrollTop = $(".scrollTop");
    $(window).scroll(function() {
        var topPos = $(this).scrollTop();
        // if user scrolls down - show scroll to top button
        if (topPos > 100) {
          $(scrollTop).css({
            "opacity":1,
            "z-index":3000
          });
        } else {
          $(scrollTop).css({
            "opacity":0,
            "z-index":"-999"
          });
        }
    });

    $(scrollTop).click(function() {
        $('html, body').animate({
          scrollTop: 0
        }, 800);
        return false;
    });


    $('.popupInfo').on("click",function(e){
    	e.preventDefault();
		var post_id = $(this).attr('data-id');
		$.ajax({
			url : frontajax.ajaxurl,
			type : 'post',
			dataType : "json",
			data : {
				action : 'get_staff_details',
				post_id : post_id
			},
			beforeSend:function(){
				$(".ml-loader-wrap").show();
			},
			success : function( response ) {
				if(response.content) {
					var content = response.content;
					$('body').prepend(content);
					$('body').addClass('modal-open');
					$(".ml-loader-wrap").hide();
				} 
			}
		});
	});

	$(document).on("click","#popOverlay,.closePopUp",function(e){
		e.preventDefault();
		$(".popup_wrapper").fadeOut("normal",function(){
			$(this).remove();
		});
		$('body').removeClass('modal-open');
	});

});// END #####################################    END