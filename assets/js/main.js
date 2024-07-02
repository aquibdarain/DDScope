// JavaScript Document
jQuery(function($) {'use strict',


	//Animated WOW JS
	new WOW().init();
	

    //Animate JS
	$('.animate').scrolla({
		mobile: false,
		once: false
	});

	// Header Fixed
	$(window).scroll(function(){
	      if ($(this).scrollTop() > 0) {
	          $('.header').addClass('fixed');
	      } else {
	          $('.header').removeClass('fixed');
	      }
	  });
		
	
	
	//Fancybox Popup
	$(document).ready(function() {
		$('.fancybox').fancybox({
			wrapCSS    : 'fancybox-custom',
			closeClick : true,
			openEffect : 'none',
			helpers : {
				title : {
					type : 'inside'
				},
				overlay : {
					css : {
						'background' : 'rgba(238,238,238,0.85)'
					}
				}
			}
		});
		
		
		/*for closing inside not outside*/

		 $(".various").fancybox({
		  closeClick  : false, // prevents closing when clicking INSIDE fancybox 
		  openEffect  : 'none',
		  closeEffect : 'none',
		  helpers   : { 
		   overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox 
		  }
		 })


		/*for full screen*/
			$('a.fullsize').fancybox({
			autoDimensions: false,
			helpers : {
            	media: true 
        	},
	        width: "100%",
	        height: 870,
	        autoSize: false,
	        scrolling: false
				});

		
		});


				
	
	// Owl Slider
	 $(document).ready(function(){ 
    $('#slider01').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:3000,
    margin:10,
    dots:true,
    autoplayTimeout: 8500,
  navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    smartSpeed: 450,
    nav:false,
    animateOut: 'fadeOut',
    responsive:{
        0:{
            items:1
        },
        
    }
})

    jQuery(document).ready(function($) {
            "use strict";
   $('#slidebrand').owlCarousel({
    loop:true,
    autoplay:false,
    autoplayTimeout:3000,
    margin:10,
    dots:true,
    autoplayTimeout: 8500,
    smartSpeed: 450,
    nav:false,
    responsive:{
         0:{
            items:1
        },
        576:{
            items:2
        },
        768:{
            items:3
        },
        991:{
            items:5
        },
        1200:{
            items:5
        }
        
        
    }
})
 });
  

 });
	
	
	
});