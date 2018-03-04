jQuery(document).ready(function($) {
	
	
	//Masonry Posts
	$blocks = $("#post_masonry");

	$blocks.imagesLoaded(function(){
		$blocks.masonry({
			itemSelector: '.post-container, #infinite-handle'
		});

		$(".post-container").fadeIn();
	});
	
	$(document).ready( function() { setTimeout( function() { $blocks.masonry(); }, 500); });

	$(window).resize(function () {
		$blocks.masonry();
	});


		// Posts reloads when Jetpack Infinite scroll
	$( document.body ).on( 'post-load', function () {

		var $container = $('#post_masonry');
		$container.masonry( 'reloadItems' );
		
		$blocks.imagesLoaded(function(){
			$blocks.masonry({
				itemSelector: '.post-container'
			});
	
			$(".post-container").fadeIn();
		});

	});

});