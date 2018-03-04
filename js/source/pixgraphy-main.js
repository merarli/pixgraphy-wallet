jQuery(window).load(function(){
		
	  // Delay show just to simulate a real page load
	  window.setInterval(showclass, 10);
	  
	  function showclass() {
	  	jQuery('.top-header').show();
	  }
  
});

jQuery( function() {
	    // Slider Height
	    jQuery(document).ready(function() {
		  function setHeight() {
		    windowHeight = jQuery(window).innerHeight();
		    jQuery('.image-slider').css('height', windowHeight);
		  };
		  setHeight();
		  
		  jQuery(window).resize(function() {
		    setHeight();
		  });
		});

		   var jQuerymuse = jQuery("#page div");
			var jQuerysld = jQuery("body");

			if (jQuerymuse.hasClass("main-slider")) {
			       jQuerysld.addClass("sld-plus");
			}
		
		// Search toggle.
		jQuery(function(){
		  var jQuerysearchlink = jQuery('#search-toggle');
		  var jQuerysearchbox  = jQuery('#search-box');
		  
		  jQuery('#search-toggle').on('click', function(){
		    
		    if(jQuery(this).attr('id') == 'search-toggle') {
		      if(!jQuerysearchbox.is(":visible")) { 
		        // if invisible we switch the icon to appear collapsable
		        jQuerysearchlink.removeClass('header-search').addClass('header-search-x');
		      } else {
		        // if visible we switch the icon to appear as a toggle
		        jQuerysearchlink.removeClass('header-search-x').addClass('header-search');
		      }
		      
		      jQuerysearchbox.slideToggle(300, function(){
		        // callback after search bar animation
		      });
		    }
		  });
		});

		// Menu toggle for below 768 screens.
		( function() {
			var togglenav = jQuery( '.main-navigation' ), button, menu;
			if ( ! togglenav ) {
				return;
			}

			button = togglenav.find( '.menu-toggle' );
			if ( ! button ) {
				return;
			}
			
			menu = togglenav.find( '.menu' );
			if ( ! menu || ! menu.children().length ) {
				button.hide();
				return;
			}

			jQuery( '.menu-toggle' ).on( 'click', function() {
				jQuery(this).toggleClass("on");
				togglenav.toggleClass( 'toggled-on' );
			} );
		} )();

		// Go to top button.
		jQuery(document).ready(function(){

		// Hide Go to top icon.
		jQuery(".go-to-top").hide();

		  jQuery(window).scroll(function(){

		    var windowScroll = jQuery(window).scrollTop();
		    if(windowScroll > 900)
		    {
		      jQuery('.go-to-top').fadeIn();
		    }
		    else
		    {
		      jQuery('.go-to-top').fadeOut();
		    }
		  });

		  // scroll to Top on click
		  jQuery('.go-to-top').click(function(){
		    jQuery('html,header,body').animate({
		    	scrollTop: 0
			}, 700);
			return false;
		  });

		});

} );